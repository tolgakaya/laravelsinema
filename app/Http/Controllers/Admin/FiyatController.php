<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 02/11/2016
 * Time: 20:16
 */

namespace App\Http\Controllers\Admin;


use App\Models\fiyat_grup;
use App\Models\Sean;
use App\Models\Seans_Fiyat;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;


class FiyatController extends Controller
{


    public function filim($movie_id)
    {

        $seanslar = Sean::where('movie_id', $movie_id)->with('seans_fiyat')->get();
        if (!is_null($seanslar->first())) {


            $gruplari = fiyat_grup::pluck('grup_id');
            //var_dump($gruplari);
            $gruplar = fiyat_grup::all()->toArray();
            $gruplar = collect($gruplar);
            //$filtered=$gruplar->where('grup_id',2)->first()['grup_adi'];


            $grupidler = collect($gruplari);
            $fiyatsizlar = array();
            foreach ($seanslar as $m) {
                $seanstakiler = array();

                foreach ($m->seans_fiyat as $f) {
                    $fiyat = $f->toArray();
                    $seanstakiler[] = $fiyat['grup_id'];
                    //$seanstakiler = $f->pluck('grup_id');
                }
                //var_dump($seanstakiler);
                $fiyatsizlar[$m->seans_id] = $grupidler->diff($seanstakiler);

            }

            // return $fiyatsizlar;
            //var_dump($fiyatsizlar);

            /* $gruplar_ = fiyat_grup::with(['Seans_Fiyat' => function ($query) use ($movie_id) {
                 return $query->with(['Sean' => function ($query) use ( $movie_id) {
                     return $query->where('movie_id', '=', $movie_id);
                 }]);
             }])->get()->toArray();*/

            return view('admin.seans_fiyats.filim')->with(['seanslar' => $seanslar, 'gruplar' => $gruplar, 'fiyatsizlar' => $fiyatsizlar, 'movie_id' => $movie_id]);
        }

        return \Redirect::route('seanscreate')->with('mesaj', ['Önce filim için seans tanımlayın']);
    }


    public function kaydet(Request $request, $movie_id)
    {
        $gelen = $request->all();

        //var_dump($gelen);

        $seans_sayisi = $request->get('adet');
//$gelen[$i]{"grup_id"][alan_adi]
        //burara i seans sırası |seansın gruplarının kümesi
        //buradaki grupların kümesini de grupların id listesini veritabanında çekerekkullanacaz

        $gruplar = fiyat_grup::pluck('grup_id');
        for ($i = 0; $i < $seans_sayisi; $i++) {

            $seans_id = $gelen[$i]['seans_id'];
            foreach ($gruplar as $grup) {
                $fiyat_id = -1;
                if (array_key_exists('fiyat_id', $gelen[$i][$grup])) {
                    //fiyatid olduğuna göre güncelleme yapılacak
                    $fiyat_id = $gelen[$i][$grup]['fiyat_id'];

                }

                $standart_fiyat = $gelen[$i][$grup]['standart_fiyat'];
                $hafta_sonu_fiyati = $gelen[$i][$grup]['hafta_sonu_fiyati'];
                $iskonto_orani = $gelen[$i][$grup]['iskonto_orani'];
                $sabit_fiyat = $gelen[$i][$grup]['sabit_fiyat'];
                $bilet_adedi = $gelen[$i][$grup]['bilet_adedi'];
                $gelen_tarih = $gelen[$i][$grup]['gecerlilik_tarihi'];
                $tarih = new \DateTime($gelen_tarih);
                $gecerlilik_tarihi = $tarih->format('Y-m-d');

                $gelenler = array(
                    'seans_id' => $seans_id,
                    'grup_id' => $grup,
                    'standart_fiyat' => $standart_fiyat,
                    'hafta_sonu_fiyati' => $hafta_sonu_fiyati,
                    'iskonto_orani' => $iskonto_orani,
                    'sabit_fiyat' => $sabit_fiyat,
                    'bilet_adedi' => $bilet_adedi,
                    'gecerlilik_tarihi' => $gecerlilik_tarihi,
                    'iptal' => 0,

                );
                //var_dump($gelenler);
                //burada her fiyat için tek bir indirim grubu uygulanması için javascriptleseçim yaptır.
                $kontrol = array(
                    'standart_fiyat' => 'required|numeric',
                    'hafta_sonu_fiyati' => 'required|numeric',
                    'iskonto_orani' => 'required|numeric',
                    'sabit_fiyat' => 'required|numeric',
                    'bilet_adedi' => 'required|numeric',
                    'gecerlilik_tarihi' => 'required|date',

                );

                $validator = \Validator::make($gelenler, $kontrol);


                if ($validator->fails()) {

                    return \Redirect::route('filimfiyatshow', array('movie_id' => $movie_id))
                        ->withErrors($validator)
                        ->withInput();
                }

                if ($fiyat_id > 0) {
                    //fiyat güncelleyecez
                    $fiyat = Seans_Fiyat::find($fiyat_id);
                    if (is_null($fiyat)) {
                        return \Redirect::route('filimfiyatshow', array('movie_id' => $movie_id))
                            ->withErrors($validator)
                            ->withInput();
                    }
                    $fiyat->update($gelenler);

                } else {
                    //yeni fiyat ekleyecez
                    Seans_Fiyat::create($gelenler);
                }

            }
        }

        return \Redirect::route('adminfilimliste')->with('mesaj', ['Fiyatlar bilgisi güncellendi']);

    }

    public function show($seans_id)
    {
        //seans_id'de fiyat varsa onu döndüreceğiz update view-btün gruplar için
        //fiyat yoksa boş döndüreceğiz create view bütün gruplar için
        //önce grupları gönderelim her seans göre fiyat input bloku oluşturalım

        //seans için fiyat tanımlanmış gruplarla birlikte fiyatlar
        /*$gruplar = fiyat_grup::whereHas('Seans_Fiyat', function ($query) use ($seans_id) {
            $query->where('seans_id', '=', $seans_id);
        })->with('Seans_Fiyat')->get();*/

        //var_dump($gruplar->toArray());

        $gruplar_ = fiyat_grup::with(['Seans_Fiyat' => function ($query) use ($seans_id) {
            $query->where('seans_id', '=', $seans_id);
        }])->get()->toArray();

        // return view('deneme')->with('gruplar',$gruplar_);
        //return $gruplar;
        //seans için fiyat tanımlanmamış gruplar
        /* = fiyat_grup::whereDoesntHave('Seans_Fiyat', function ($query) use ($seans_id) {
            $query->where('seans_id', '=', $seans_id);

        })->get()->toArray();*/


        return view('admin.seans_fiyats.update')->with(['gruplar' => $gruplar_, 'seans_id' => $seans_id]);
    }

    public function update(Request $request, $seans_id)
    {
        $gelen = $request->all();
        $grup_sayisi = $request->get('adet');
//$gelen["$i"]{"grup_id"][alan_adi]
        //burara i seans sırası |seansın gruplarının kümesi
        //buradaki grupların kümesini de grupların id listesini veritabanında çekerekkullanacaz


        for ($i = 0; $i < $grup_sayisi; $i++) {
            $fiyat_id = -1;
            $grup_id = $gelen["$i"]['grup_id'];
            if (array_key_exists('fiyat_id', $gelen["$i"])) {
                //fiyatid olduğuna göre güncelleme yapılacak
                $fiyat_id = $gelen["$i"]['fiyat_id'];

            }
            $hafta_sonu_fiyati = $gelen["$i"]['hafta_sonu_fiyati'];
            $standart_fiyat = $gelen["$i"]['standart_fiyat'];
            $iskonto_orani = $gelen["$i"]['iskonto_orani'];
            $sabit_fiyat = $gelen["$i"]['sabit_fiyat'];
            $bilet_adedi = $gelen["$i"]['bilet_adedi'];
            $gelen_tarih = $gelen["$i"]['gecerlilik_tarihi'];
            $tarih = new \DateTime($gelen_tarih);
            $gecerlilik_tarihi = $tarih->format('Y-m-d');

            $gelenler = array(
                'seans_id' => $seans_id,
                'grup_id' => $grup_id,
                'standart_fiyat' => $standart_fiyat,
                'hafta_sonu_fiyati' => $hafta_sonu_fiyati,
                'iskonto_orani' => $iskonto_orani,
                'sabit_fiyat' => $sabit_fiyat,
                'bilet_adedi' => $bilet_adedi,
                'gecerlilik_tarihi' => $gecerlilik_tarihi,
                'iptal' => 0,

            );
            //burada her fiyat için tek bir indirim grubu uygulanması için javascriptleseçim yaptır.
            $kontrol = array(
                'hafta_sonu_fiyati' => 'required|numeric',
                'standart_fiyat' => 'required|numeric',
                'iskonto_orani' => 'required|numeric',
                'sabit_fiyat' => 'required|numeric',
                'bilet_adedi' => 'required|numeric',
                'gecerlilik_tarihi' => 'required|date',

            );

            $validator = \Validator::make($gelenler, $kontrol);


            if ($validator->fails()) {

                return \Redirect::route('tekseansfiyatshow', array('seans_id' => $seans_id))
                    ->withErrors($validator)
                    ->withInput();
            }

            if ($fiyat_id > 0) {
                //fiyat güncelleyecez
                $fiyat = Seans_Fiyat::find($fiyat_id);
                if (is_null($fiyat)) {
                    return \Redirect::route('tekseansfiyatshow', array('seans_id' => $seans_id))
                        ->withErrors($validator)
                        ->withInput();
                }
                $fiyat->update($gelenler);

            } else {
                //yeni fiyat ekleyecez
                Seans_Fiyat::create($gelenler);
            }

        }

        return \Redirect::route('adminseanslist')->with('mesaj', ['Salon bilgisi güncellendi']);
    }

    public function sil($fiyat_id)
    {
        if ($fiyat_id) {
            $fiyat = Seans_Fiyat::find($fiyat_id);
            if (is_null($fiyat)) {
                return \Redirect::route('adminfilimliste')->with('mesaj', ['Fiyat bulunamadı']);
            }
            $fiyat->delete();
            return \Redirect::route('adminfilimliste')->with('mesaj', ['Fiyat silindi']);
        }
    }

    public function toplushow($movie_id)
    {


        $gruplar_ = fiyat_grup::all()->toArray();

        return view('admin.seans_fiyats.toplu')->with(['gruplar' => $gruplar_, 'movie_id' => $movie_id]);
    }

    public function tekfiyatlandir(Request $request, $movie_id)
    {
        //tek filmin bütünseanslarını toplu fiyatlandırma için kullanılır
        $gelen = $request->all();

        $grup_sayisi = $request->get('adet');
//$gelen["$i"]{"grup_id"][alan_adi]
        //burara i seans sırası |seansın gruplarının kümesi
        //buradaki grupların kümesini de grupların id listesini veritabanında çekerekkullanacaz
        $seanslar = Sean::where('movie_id', $movie_id)->pluck('seans_id');

        foreach ($seanslar as $seans) {


            for ($i = 0; $i < $grup_sayisi; $i++) {

                $grup_id = $gelen["$i"]['grup_id'];

                $hafta_sonu_fiyati = $gelen["$i"]['hafta_sonu_fiyati'];
                $standart_fiyat = $gelen["$i"]['standart_fiyat'];
                $iskonto_orani = $gelen["$i"]['iskonto_orani'];
                $sabit_fiyat = $gelen["$i"]['sabit_fiyat'];
                $bilet_adedi = $gelen["$i"]['bilet_adedi'];
                $gelen_tarih = $gelen["$i"]['gecerlilik_tarihi'];
                $tarih = new \DateTime($gelen_tarih);
                $gecerlilik_tarihi = $tarih->format('Y-m-d');

                $gelenler = array(
                    'seans_id' => $seans,
                    'grup_id' => $grup_id,
                    'standart_fiyat' => $standart_fiyat,
                    'hafta_sonu_fiyati' => $hafta_sonu_fiyati,
                    'iskonto_orani' => $iskonto_orani,
                    'sabit_fiyat' => $sabit_fiyat,
                    'bilet_adedi' => $bilet_adedi,
                    'gecerlilik_tarihi' => $gecerlilik_tarihi,
                    'iptal' => 0,

                );
                //burada her fiyat için tek bir indirim grubu uygulanması için javascriptleseçim yaptır.
                $kontrol = array(
                    'hafta_sonu_fiyati' => 'required|numeric',
                    'standart_fiyat' => 'required|numeric',
                    'iskonto_orani' => 'required|numeric',
                    'sabit_fiyat' => 'required|numeric',
                    'bilet_adedi' => 'required|numeric',
                    'gecerlilik_tarihi' => 'required|date',

                );

                $validator = \Validator::make($gelenler, $kontrol);


                if ($validator->fails()) {

                    return \Redirect::route('toplufiyatlandir', array('movie_id' => $movie_id))
                        ->withErrors($validator)
                        ->withInput();
                }

                $fiyat = Seans_Fiyat::where(['seans_id' => $seans, 'grup_id' => $grup_id])->first();
                if (is_null($fiyat)) {

                    //yeni fiyat ekleyecez
                    Seans_Fiyat::create($gelenler);

                } else {

                    $fiyat->update($gelenler);
                }

            }
        }
        return \Redirect::route('adminseanslist')->with('mesaj', ['Salon bilgisi güncellendi']);
    }


}