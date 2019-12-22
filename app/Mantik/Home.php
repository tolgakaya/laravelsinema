<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 29/10/2016
 * Time: 21:57
 */

namespace App\Mantik;

use App\Models\Filim;
use App\Models\Slide;


class Home
{
    public $slidelar;
    public $filimler;
    //filim bilgileri özeti
    //ve poster
    function __construct()
    {
        $this->getFilimler();
        $this->getSlide();
    }

    private function getSlide()
    {
        $slidelar = Slide::all();
        $resim_base = "/medias/slides/";
        foreach ($slidelar as $s) {
            $slide = new SlideViewModel();
            $adi = $resim_base . $s->adi;
            $baslik = $s->baslik;
            $altbaslik = $s->altbaslik;
            // altbaşlığı bölecez
            $kelimeler = explode(" ", $altbaslik);
            $t = array();
            foreach ($kelimeler as $f) {
                if (!empty($f)) {
                    $t[] = $f;
                }
            }
            $adet = count($t);
            if ($adet == 5) {
                $t[3] = $t[3] . " " . $t[4];
                $t[4] = "";
            } elseif ($adet == 6) {
                $t[0] = $t[0] . " " . $t[1];
                $t[1] = $t[2] . " " . $t[3];
                $t[2] = $t[4];
                $t[3] = $t[5];
                $t[4] = "";
                $t[5] = "";
            } elseif ($adet == 7) {
                $t[0] = $t[0] . " " . $t[1];
                $t[1] = $t[2] . " " . $t[3];
                $t[2] = $t[4] . " " . $t[5];
                $t[3] = $t[6];
                $t[4] = "";
                $t[5] = "";
                $t[6] = "";
            } elseif ($adet == 8) {
                $t[0] = $t[0] . " " . $t[1];
                $t[1] = $t[2] . " " . $t[3];
                $t[2] = $t[4] . " " . $t[5];
                $t[3] = $t[6] . " " . $t[7];
                $t[4] = "";
                $t[5] = "";
                $t[6] = "";
                $t[7] = "";
            } elseif ($adet == 9) {
                $t[0] = $t[0] . " " . $t[1];
                $t[1] = $t[2] . " " . $t[3];
                $t[2] = $t[4] . " " . $t[5];
                $t[3] = $t[6] . " " . $t[7] . " " . $t[8];
                $t[4] = "";
                $t[5] = "";
                $t[6] = "";
                $t[7] = "";
                $t[8] = "";
            }
            $altlar = array();
            foreach ($t as $a) {
                if (!empty(trim($a))) {
                    $altlar[] = trim($a);
                }
            }
            $buton = $s->buton;
            $yazi = $s->yazi;
            $slide->altlar = $altlar;
            $slide->alt_baslik = $altbaslik;
            $slide->baslik = $baslik;
            $slide->buton = $buton;
            $slide->resim = $adi;
            $slide->yazi = $yazi;
            //$s->movie_id = $satir['movie_id'];
            $this->slidelar[] = $slide;
        }
    }

    private function getFilimler()
    {
        $filimler = Filim::where('gosterimde', true)
            ->orWhere('gelecek', true)
            ->take(6)
            ->get();
        foreach ($filimler as $i) {
            $tarih = date("Y-m-d");
            $m = new Movie($i->movie_id, $tarih);
            $m->adi = $i->adi;
            $m->kategori = $i->kategori;
            $m->oyuncular = $i->oyuncular;
            $m->suresi = $i->suresi;
            $m->yonetmen = $i->yonetmen;
            $galeri = $i->galeri;
            $poster = "/medias/movie/$i->movie_id-poster-poster-";
            foreach ($galeri as $g) {
                if ($g->sayfa == 'poster') {
                    $poster = $poster . $g->adi . "." . $g->uzanti;
                    $m->poster = $poster;
                }
            }

            $this->filimler[] = $m;

        }
    }

}