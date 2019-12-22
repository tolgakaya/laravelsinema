<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 02/11/2016
 * Time: 20:16
 */

namespace App\Http\Controllers\Admin;

use App\Models\Filim;
use App\Models\Salon;
use App\Models\Sean;
use Faker\Provider\cs_CZ\DateTime;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class SeansController extends Controller
{
    function index($salon_id=null,$movie_id=null)
    {
        $tarih = date('Y-m-d');
        $model=Sean::where([['bitis_tarihi', '>', $tarih]]);
        if(!is_null($salon_id))
        {
            $model=Sean::where([['bitis_tarihi', '>', $tarih],['seans.salon_id','=',$salon_id]]);
        }
        if(!is_null($movie_id))
        {
            $model=Sean::where([['bitis_tarihi', '>', $tarih],['movie_id','=',$movie_id]]);
        }
        $seanslar = $model
            ->orderBy('seans.movie_id', 'asc')
            ->join('salons', 'seans.salon_id', '=', 'salons.salon_id')
            ->join('filims', 'seans.movie_id', '=', 'filims.movie_id')
            ->paginate(5);
        //return $seanslar;
        return view('admin.seans.list')->with('seanslar', $seanslar);
    }

    public function create()
    {
        $salonlar = Salon::all();
        $filimler = Filim::where('gosterimde', true)
            ->orWhere('gelecek', true)
            ->get();
        return view('admin.seans.create')->with(['salonlar' => $salonlar, 'filimler' => $filimler]);
    }

    public function store(Request $request)
    {


        $kontrol = array(
            'salon_id' => 'required|digits_between:0,1000',
            'movie_id' => 'required|digits_between:0,100000',
            'bitis_tarihi' => 'required|date',
            'saat' => 'required',
            'standart_fiyat' => 'required|numeric',
            'hafta_sonu_fiyati' => 'required|numeric',
        );
        $this->validate($request, $kontrol);

        $gelen_tarih = Input::get('bitis_tarihi');
        $tarih = new \DateTime($gelen_tarih);
        $tarih = $tarih->format('Y-m-d');
        $gelenler = array(

            'salon_id' => Input::get('salon_id'),
            'movie_id' => Input::get('movie_id'),
            'bitis_tarihi' => $tarih,
            'saat' => Input::get('saat'),
            'standart_fiyat' => Input::get('standart_fiyat'),
            'hafta_sonu_fiyati' => Input::get('hafta_sonu_fiyati'),
            'fix_fiyat' => Input::get('fix_fiyat') ? 1 : 0,
        );

        //aynı saatte aynı salonda başka seans var mı kontrol etmemiz gerek
        $bugun = date('Y-m-d');
        $seans = Sean::where([['salon_id', '=', Input::get('salon_id')], ['saat', '=',
            Input::get('saat')], ['bitis_tarihi', '>', $bugun]])->first();

        if (!is_null($seans)) {
            return \Redirect::route('seanscreate')->with('error', 'Bu salonda bu saatte seans tanımlanmış');
        }

        //return $gelenler;

        Sean::create($gelenler);

        return \Redirect::route('adminseanslist')->with('mesaj', 'Yeni seans kaydı yapıldı');

    }

    public function show($seans_id)
    {
        $salonlar = Salon::all();
        $filimler = Filim::where('gosterimde', true)
            ->orWhere('gelecek', true)
            ->get();
        $seans = Sean::find($seans_id);
        if (is_null($seans)) {
            return \Redirect::route('adminseanslist')->with('mesaj', ['Seans bulunamadı']);
        }

        return view('admin.seans.update')->with(['seans' => $seans, 'salonlar' => $salonlar, 'filimler' => $filimler]);
    }

    public function update(Request $request, $seans_id)
    {

        $kontrol = array(
            'salon_id' => 'required|digits_between:0,1000',
            'movie_id' => 'required|digits_between:0,100000',
            'bitis_tarihi' => 'required|date',
            'saat' => 'required',
            'standart_fiyat' => 'required|numeric',
            'hafta_sonu_fiyati' => 'required|numeric',
        );

        $this->validate($request, $kontrol);
        $seans = Sean::find($seans_id);
        if (is_null($seans)) {
            return \Redirect::route('adminseanslist')->with('mesaj', ['Seans bulunamadı']);
        }

        $gelen_tarih = Input::get('bitis_tarihi');
        $tarih = new \DateTime($gelen_tarih);
        $tarih = $tarih->format('Y-m-d');

        $gelenler = array(

            'salon_id' => Input::get('salon_id'),
            'movie_id' => Input::get('movie_id'),
            'bitis_tarihi' => $tarih,
            'saat' => Input::get('saat'),
            'standart_fiyat' => Input::get('standart_fiyat'),
            'hafta_sonu_fiyati'=> Input::get('hafta_sonu_fiyati'),
            'fix_fiyat' => Input::get('fix_fiyat') ? 1 : 0,
        );

        //aynı saatte aynı salonda başka seans var mı kontrol etmemiz gerek
        $bugun = date('Y-m-d');
        $seans_kontrol = Sean::where([['salon_id', '=', Input::get('salon_id')], ['saat', '=',
            Input::get('saat')], ['bitis_tarihi', '>', $bugun], ['seans_id', '<>', $seans_id]])->first();

        if (!is_null($seans_kontrol)) {
            return \Redirect::route('seansupdate',['seans_id'=>$seans_id])->withErrors(['message' => 'Bu salonda bu saatte seans tanımlanmış']);
        }

        $seans->update($gelenler);

        return \Redirect::route('adminseanslist')->with('mesaj', ['Salon bilgisi güncellendi']);
    }


}