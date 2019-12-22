<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 27/10/2016
 * Time: 12:04
 */

namespace App\Mantik;

use App\Models\Filim;
use App\Models\Galeri;
use App\Models\Sean;

class Booking
{
    public $movie_id;
    private $tarih;
    public $filim_adi;

    function __construct($movie_id, $tarih)
    {
        //tarih hep türkçe geliyor onu değiştirek
        $tarih = new \DateTime($tarih);
        $tarih = $tarih->format("Y-m-d");

        $this->movie_id = $movie_id;
        $this->tarih = $tarih;
        $this->filim_adi = $this->adi();
    }

    public function adi()
    {
        $n = Filim::find($this->movie_id)->value('adi');
        return $n;
    }

    private function seans_cek()
    {
        // bunu bookingde sayfa ilk yüklenirken kullanıyorum
        $seanslar = array();
        //burada dizi olarak döndürüyorum ama bunu viewmodele çevirip bu viewmodeli koleksiyonolarak döndürecem sonra

        $koleksiyon = Sean::where([['movie_id', '=', $this->movie_id],
            ['bitis_tarihi', '>', $this->tarih]
        ])
            ->orderBy('saat', 'asc')
            ->get();
        foreach ($koleksiyon as $k) {
            $seans_id = $k->seans_id;
            $salon_id = $k->salon_id;
            $standart_fiyat = $k->standart_fiyat;
            $hafta_sonu_fiyati=$k->hafta_sonu_fiyati;
            $fix_fiyat = $k->fix_fiyat;
            $saat = $k->saat;
            $saat = date('H:i', strtotime($saat));
            $index = $seans_id . "|" . $fix_fiyat . "|" . $standart_fiyat .'|'. $hafta_sonu_fiyati;
            $seanslar[$salon_id][$index] = $saat;
        }
        return $seanslar;

    }


    public function seans_dondur()
    {
        $seanslar = $this->seans_cek();

        $keys = array_keys($seanslar); // buradaki key salonid
        $str = '';
        for ($i = 0; $i < count($seanslar); $i++) {
            // salonu yazdır
            $str .= "<div class='time-select__group'>";
            $str .= "<div class=\"col-sm-4\">";
            $str .= "<p class=\"time-select__place\">$keys[$i]</p></div>";
            $str .= "<ul class=\"col-sm-8 items-wrap\">";

            foreach ($seanslar[$keys[$i]] as $seans_info => $saat) {
                $str .= "<li class=\"time-select__item\" data-time='$keys[$i]-$seans_info-$saat'>$saat</li>";
            }
            $str .= "</ul></div>";

        }
        return $str;
    }
}