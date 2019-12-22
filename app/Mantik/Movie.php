<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 23/10/2016
 * Time: 23:13
 */

namespace App\Mantik;


use App\Models\Filim;
use App\Models\Galeri;
use App\Models\Sean;
Use App\Models\Media;

class Movie
{
    public $movie_id;
    private $tarih;


    public $adi;

    public $yonetmen;

    public $oyuncular;

    public $konu;

    public $ulke;

    public $yil;

    public $kategori;

    public $yas_siniri;

    public $suresi;

    public $galeri;

    public $seanslar;
    public $poster;

    public function __construct($movie_id, $tarih)
    {
        $this->movie_id = $movie_id;
        $this->tarih = $tarih;

    }

    public function get()
    {
        $this->filim_info();
        $this->seans();
        $this->singleGaleri();


    }

    private function filim_info()
    {
        $n = Filim::find($this->movie_id);
        $this->adi = $n->adi;
        $this->yonetmen = $n->yonetmen;
        $this->oyuncular = $n->oyuncular;
        $this->konu = $n->konu;
        $this->ulke = $n->ulke;
        $this->yil = $n->yil;
        $this->yas_siniri = $n->yas_siniri;
        $this->kategori = $n->kategori;
        $this->suresi = $n->suresi;

    }

    private function seans()
    {
        $seanslar = array();
        //burada dizi olarak döndürüyorum ama bunu viewmodele çevirip bu viewmodeli koleksiyonolarak döndürecem sonra

        $koleksiyon = Sean::where([['movie_id', '=', $this->movie_id],
            ['bitis_tarihi', '>', $this->tarih]
        ])
            ->orderBy('salon_id', 'desc')
            ->get();
        foreach ($koleksiyon as $k) {
            $seans_id = $k->seans_id;
            $salon_id = $k->salon_id;
            $standart_fiyat = $k->standart_fiyat;
            $fix_fiyat = $k->fix_fiyat;
            $saat = $k->saat;
            $saat = date('H:i', strtotime($saat));
            $index = $seans_id . "|" . $fix_fiyat . "|" . $standart_fiyat;
            $seanslar[$salon_id][$index] = $saat;
        }

        // buradaki seans tek sayfa seans�, normalde se�ilen tarihe g�re seanslar �ekilecek
        // $bugun = date("Y-m-d");

        // burada seans_id-fix_fiyat-standart_fiyat olarak index ekliyourz

        $this->seanslar = $seanslar;

    }

    private function singleGaleriEski()
    {
        $galeri = new GaleriViewModel();
        $tek_sayfa_resmi = "/medias/movie/$this->movie_id-single-tek-";
        $poster = "/medias/movie/$this->movie_id-poster-poster-";
        $swiper_resimleri = array();
        $swiper_videolari = array();
        // swiper'da sadece b�y�k resim ad�n� veritaban�na kaydediyoruz
        // ��k�n resmi b�y�k resimden ��kar�yoruz

        $swiper_kalip = "/medias/movie/$this->movie_id-single-swiper-";

        $medyalar = Galeri::where('movie_id', $this->movie_id)->get();
        foreach ($medyalar as $m) {
            $tur = $m->tur;
            $id = $m->galeri_id;
            $sayfa = $m->sayfa;
            $kod = $m->kod;
            $adi = $m->adi;
            $uzanti = $m->uzanti;
            $url = $m->url;
            if ($sayfa == "single" && $kod == "tek") {
                $tek_sayfa_resmi = $tek_sayfa_resmi . $adi . "." . $uzanti;
            }
            if ($sayfa == "single" && $kod == "swiper") {
                // videoda bir de�i�iklik yok yaln�zca video ise link konulacak
                $kucuk_resim = $swiper_kalip . $adi . "." . $uzanti;
                if ($tur == "video") {
                    // buyuk resim yerine video alacaz ama nas�l
                    $video = $url;
                    $swiper_videolari[$kucuk_resim] = $video;
                } else {
                    $buyuk_resim = $swiper_kalip . $adi . "-lg" . "." . $uzanti;
                    $swiper_resimleri[$kucuk_resim] = $buyuk_resim;
                }
            }
            if ($sayfa == "poster" && $kod == "poster") {
                // buras� hem ana sayfada hem listesinde kullanaca��m�z resmi �eker.
                $poster = $poster . $adi . "." . $uzanti;
            }

        }
        $galeri->movie_id = $this->movie_id;
        $galeri->poster = $poster;
        $galeri->swiper_resimleri = $swiper_resimleri;
        $galeri->swiper_videolari = $swiper_videolari;
        // $galeri->tek_sayfa_resmi = $tek_sayfa_resmi;
        $galeri->galeri_id = $id;

        $this->galeri = $galeri;
    }

    private function singleGaleri()
    {
        $galeri = new GaleriViewModel();
        $base = "/medias/movie/";
        $poster = '';
        $tek_sayfa_resmi='';
        $swiper_resimleri = array();
        $swiper_videolari = array();
        // swiper'da sadece b�y�k resim ad�n� veritaban�na kaydediyoruz
        // ��k�n resmi b�y�k resimden ��kar�yoruz

        $medyalar = Media::where('movie_id', $this->movie_id)->get();
        foreach ($medyalar as $m) {

            if ($m->tek == 1) {
                $tek_sayfa_resmi = $base . $m->adi;
            }
            if ($m->video == 1) {
                $kucuk_resim = $base . $m->adi;
                $swiper_videolari[$kucuk_resim] = $m->url;
            }
            if ($m->galeri == 1) {

                $swiper_resimleri[$m->media_id] = $base . $m->adi;

            }
            if ($m->poster == 1) {
                $poster = $base . $m->adi;
            }

        }
        $galeri->movie_id = $this->movie_id;
        $galeri->poster = $poster;
        $galeri->swiper_resimleri = $swiper_resimleri;
        $galeri->swiper_videolari = $swiper_videolari;
        $galeri->tek_sayfa_resmi = $tek_sayfa_resmi;

        $this->galeri = $galeri;
    }

}