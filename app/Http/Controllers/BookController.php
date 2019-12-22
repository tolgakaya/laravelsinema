<?php

namespace App\Http\Controllers;

//use app\Mantik\BookSession;
use Illuminate\Http\Request;

use App\Http\Requests;
use \App\Mantik;
use Illuminate\Support\Facades\Input;
use App\Mantik\BookInfoViewModel;
use App\Mantik\OdemeIslemleri;
use App\Mantik\BiletKes;

class BookController extends Controller
{
    function one($movie_id)
    {
        $tarih = date('Y-m-d');
        // $i=new Mantik\Movie(1,$tarih);
        $booking = new Mantik\Booking($movie_id, $tarih);

        $tema = 'book1';
        return view('book1', ['bookinfo' => $booking, 'tema' => $tema]);
    }

    function seanscek($movie_id, $tarih)
    {
        //$bil = Mantik\BookSession::bilet_oturumu();

        $s = new Mantik\Booking($movie_id, $tarih);

        return $s->seans_dondur();

    }

    function two()
    {
        //birinci basamaktan gelen verileri alıp
        //book2 yi gösteriyoruz
        $movie = Input::get('choosen-movie');
        $tarih = Input::get('choosen-date');
        // keys[$i]-$seans_info-$saat
        // salon-seans_id-saat
        $salon_seans_info_saat = Input::get('choosen-time');
        $tarih = Input::get('choosen-date');
        //tarihi çevirelim
        $date = new \DateTime($tarih);
        $tarih = $date->format("Y-m-d");
        $filim_adi = Input::get('filim_adi');

        // book1'dan gönderiliyor
        if (!empty($movie) && !empty($tarih) && !empty($salon_seans_info_saat) && !empty($filim_adi)) {

            $bilet = Mantik\BookSession::bilet_oturumu();

            $bilet->filim_adi = $filim_adi;

            $seans_bilgileri = explode("-", $salon_seans_info_saat);
            $temizler = array();
            foreach ($seans_bilgileri as $n) {
                if (!empty(trim($n))) {
                    $temizler[] = $n;
                }
            }
            $salon_id = $temizler[0];
            $bilet->salon = $temizler[0];

            $bilet->saat = $temizler[2];

            $seans_info = $temizler[1];


            $info_array = explode("|", $seans_info);
            // buradaki seans_info=seans_id-fix_fiyat_standart_fiyat
            $seans_id = $info_array[0];
            $fix_fiyat = $info_array[1];
            $standart_fiyat = $info_array[2];
            $hafta_sonu_fiyati= $info_array[3];
            $bilet->fix_fiyat = $fix_fiyat;
            $bilet->standart_fiyat = $standart_fiyat;
            $bilet->hafta_sonu_fiyati=$hafta_sonu_fiyati;
            $bilet->seans_id = $seans_id;
            $bilet->movie_id = $movie;
            $bilet->seans_tarihi = $tarih;
            $_SESSION['bilet'] = $bilet;
        } else {

            echo 'Lütfen filim, seans ve tarih seçiniz.';
        }

        //$tarih = date('Y-m-d');

        $sp = new Mantik\SalonPlani($seans_id, $tarih, $salon_id);

        $tema = 'book2';
        return view('book2', ['plan' => $sp, 'tema' => $tema]);


    }

    function three()
    {
        $koltuk_cok = Input::get('choosen-sits');
        $bilet = Mantik\BookSession::bilet_oturumu();
        if (!empty($koltuk_cok)) {


            $koltuk_array = explode(",", $koltuk_cok);
            $temizler = array();
            foreach ($koltuk_array as $k) {
                if (!empty(trim($k))) {
                    $temizler[] = $k;
                }
            }
            $yarisi = array();
            $sayi = count($temizler);
            for ($i = 0; $i < $sayi / 2; $i++) {
                $yarisi[] = $temizler[$i];
            }

            $koltuklar = implode(",", $yarisi);
            $bilet->koltuk_sayisi = count($yarisi);
            $bilet->koltuklar = $koltuklar;

            $fiyat = new Mantik\Fiyat($bilet, -11);
            $bilet = $fiyat->tutar_hesapla();

            $_SESSION['bilet'] = $bilet;
        }

        $grup = new Mantik\Grup();
        $liste = $grup->Liste();
        $tema = 'book3';
        return view('book3', ['bilet' => $bilet, 'gruplar' => $liste, 'tema' => $tema]);

    }

    private function dummy()
    {
        $dummy_bilet = new Mantik\BookInfoViewModel();
        $dummy_bilet->biletleme_tarihi = date('Y-m-d');
        $dummy_bilet->filim_adi = 'filim';
        $dummy_bilet->fix_fiyat = 1;
        $dummy_bilet->fiyat_grubu = 1;
        $dummy_bilet->koltuk_sayisi = 2;
        $dummy_bilet->koltuklar = 'A1,A2';
        $dummy_bilet->movie_id = 1;
        $dummy_bilet->net_fiyat = 20;
        $dummy_bilet->saat = '22:30';
        $dummy_bilet->seans_id = 1;
        $dummy_bilet->seans_tarihi = date('2016-10-30');
        $dummy_bilet->standart_fiyat = 20;
        $dummy_bilet->toplam_tutar = 40;
        $dummy_bilet->musteri_adi = 'Natali Chabanova';
        $dummy_bilet->musteri_mail = 'natali@ukr.net';
        $dummy_bilet->musteri_telefon = '03265464';
        $dummy_bilet->rezervasyon_bilet = 'bilet';
        $dummy_bilet->odeme_sekli = 'kart';
        $dummy_bilet->odeme_kodu = 'YKK';
        return $dummy_bilet;
    }

    function bilet(Request $request)
    {
        $this->validate($request, [
            'tahsilat_turu' => 'required|max:255',
            'musteri_email' => 'required|max:255',
            'musteri_telefonu' => 'required|max:255',
            'musteri_adi' => 'required|max:255',
        ]);

        $tahsilat_turu = $request->input('tahsilat_turu');
        $musteri_adi = $request->input('musteri_adi');
        $musteri_telefonu = $request->input('musteri_telefonu');
        $musteri_mail = $request->input('musteri_email');
        $rezervasyon_bilet=$request->input('rezervasyon_bilet');
        //$info=$this->dummy();
        $info = Mantik\BookSession::bilet_oturumu();
        $info->musteri_telefon = $musteri_telefonu;
        $info->musteri_adi = $musteri_adi;
        $info->musteri_mail = $musteri_mail;
        $info->rezervasyon_bilet=$rezervasyon_bilet;
        $info->odeme_sekli=$tahsilat_turu;
        $info->odeme_kodu="test";
        $string=str_random(6);
        $info->bilet_no=$string;
        $info->barkod=$string;
        //bilet numarası ve barkod oluşturup infoya atılacak.
        $tahsilat = OdemeIslemleri\TahsilatGenerator::Get($tahsilat_turu);
        $tahsilat->handleTahsilat("", "", "");
        $islem = new BiletKes($tahsilat, $info);
        $islem->doUpdate($tahsilat);

        return view('bookson',['bilet'=>$info,'tema'=>'bookson']);
    }

    function fiyat($grup_id)
    {   //fiyat gruplarına göre toplam tutar hesaplıyoruz AJAX
        $bil = Mantik\BookSession::bilet_oturumu();

        $fiyat = new Mantik\Fiyat($bil, $grup_id);
        $bilet = $fiyat->tutar_hesapla();
        $_SESSION['bilet'] = $bilet;

        return "<h1> Toplam tutar: $bilet->toplam_tutar </h1>";

    }
}
