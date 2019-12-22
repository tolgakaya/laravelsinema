<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 28/10/2016
 * Time: 09:47
 */

namespace App\Mantik;


class BookInfoViewModel
{
    public $movie_id;

    public $filim_adi;

    public $bilet_no;

    public $barkod;

    public $seans_id;

    public $saat;

    public $salon;

    public $fix_fiyat;

    public $standart_fiyat;
    public $hafta_sonu_fiyati;

    public $net_fiyat;
    // indirimli yada değiş net birim fiyat
    public $koltuklar;

    public $koltuk_sayisi;

    public $seans_tarihi;

    public $biletleme_tarihi;

    public $musteri_telefon;

    public $musteri_mail;

    public $musteri_adi;

    public $fiyat_grubu;

    public $toplam_tutar;

    public $rezervasyon_bilet;

    public $odeme_sekli;

    public $odeme_kodu; // kredi kartıysa ilgili pos kodu, hesap no ise o hesap no vb.
}