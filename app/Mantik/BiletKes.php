<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 30/10/2016
 * Time: 17:36
 */

namespace App\Mantik;

use App\Mantik\OdemeIslemleri;
use  App\Mantik\OdemeIslemleri\ITahsilat;
use  App\Mantik\OdemeIslemleri\abstTahsilatGozleyici;
use App\Models\Bilet;

class BiletKes extends abstTahsilatGozleyici
{
    private $bookInfo;

    function __construct(ITahsilat $tahsilat, BookInfoViewModel $bookInfoViewModel)
    {
        parent::__construct($tahsilat);
        $this->bookInfo = $bookInfoViewModel;
    }

    function doUpdate(ITahsilat $tahsilat)
    {
        //yani ödeme yapıldı callbacki alınınca
        $status = $tahsilat->getStatus();
        if ($status[0] == 'Okey') {

            $bilet = new Bilet();
            $bilet->seans_id = $this->bookInfo->seans_id;
            $bilet->koltuk = $this->bookInfo->koltuklar;
            $bilet->musteri_adi = $this->bookInfo->musteri_adi;
            $bilet->musteri_telefon = $this->bookInfo->musteri_telefon;
            $bilet->musteri_mail = $this->bookInfo->musteri_mail;
            $bilet->fiyat_grubu = $this->bookInfo->fiyat_grubu;
            $bilet->toplam_tutar = $this->bookInfo->toplam_tutar;
            $bilet->rezervasyon_bilet = $this->bookInfo->rezervasyon_bilet;
            $bilet->odeme_sekli = $this->bookInfo->odeme_sekli;
            $bilet->odeme_kodu = $this->bookInfo->odeme_kodu;
            $bilet->seans_tarihi = $this->bookInfo->seans_tarihi;
            $bilet->iptal = 0;
            $bilet->setCreatedAt($this->bookInfo->biletleme_tarihi);
            $bilet->bilet_no=$this->bookInfo->bilet_no;
            $bilet->barkod=$this->bookInfo->barkod;
            $bilet->save();
            //bileti kaydet
            echo "Tahsilat yapıldı bileti kaydet";
        }
    }
}