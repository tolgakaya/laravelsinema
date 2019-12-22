<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 28/10/2016
 * Time: 10:35
 */

namespace App\Mantik;


use App\Models\Seans_Fiyat;
use Faker\Provider\tr_TR\DateTime;

class Fiyat
{
    private $grup_id;

    private $bilet;

    function __construct(BookInfoViewModel $bilet, $grup_id)
    {
        $this->bilet = $bilet;
        $this->grup_id = $grup_id;
        //$this->seans_id = $seans_id;
        //$this->tarih = $tarih;
    }

    function tutar_hesapla()
    {
        $adet = $this->bilet->koltuk_sayisi;

        $fiyat = $this->fiyat_cek();
        $this->bilet->net_fiyat = $fiyat;
        $tutar = $adet * $fiyat;
        $this->bilet->biletleme_tarihi = date("Y-m-d");
        $this->bilet->toplam_tutar = $tutar;
        $this->bilet->fiyat_grubu=$this->grup_id;
        return $this->bilet;
    }

    private function fiyat_cek()
    {
        // burada tek fiyat çekecez-toplam tutar değil

        // seansa bak
        // standart fiyatsa fiyatı al
        // standart fiyat değilse
        // grup_id=-11 ise standart fiyat üzerinden işlem yap

        $date = new \DateTime($this->bilet->seans_tarihi);

        $haftasonu=false;
        if($date->format('w')==6 || $date->format('w')==0)
        {
            $haftasonu=true;
        }

        if ($this->grup_id < 0 || $this->bilet->fix_fiyat == 1) {

            if($haftasonu==true)
            {
                return $this->bilet->hafta_sonu_fiyati;
            }
            else
            {
                return $this->bilet->standart_fiyat;
            }

            //hafta sonu fiyatı
        } elseif ($this->bilet->fix_fiyat == 0) {
            if (!empty($this->grup_id))  {
                // gruba göre fiyatı çek
                    //hafta sonuna göre fiyatı çek


                $date = $date->format("Y-m-d");

                $satir = Seans_Fiyat::where([['grup_id', '=', $this->grup_id], ['seans_id', '=', $this->bilet->seans_id],
                    ['gecerlilik_tarihi', '>', $date]
                ])
                    ->first();

                    $sabit = $satir->sabit_fiyat;
                    $iskonto = $satir->iskonto_orani;
                    $bilet_adedi = $satir->bilet_adedi;
                    $standart_fiyat = $satir->standart_fiyat;
                    if($haftasonu==true)
                    {
                        $standart_fiyat = $satir->hafta_sonu_fiyati;
                    }
                    if ($sabit > 0) {
                        return $sabit;
                    } elseif ($iskonto > 0) {
                        return (1 - $iskonto / 100)*$standart_fiyat;
                    } elseif ($bilet_adedi > 0) {
                        // abonelik işlemleri
                        return $bilet_adedi;
                    }

            }
        }
    }
}