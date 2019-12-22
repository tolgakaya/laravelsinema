<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 29/10/2016
 * Time: 11:40
 */

namespace App\Mantik;

use App\Models\Filim;
use Illuminate\Support\Facades\DB;

class MovieSearch
{

    public $filimler = array();
    private $kisit;
    private $arama_terimi;
    private $perPage;
    private $pageNumber;

    public $adet;

    function __construct($kisit, $arama_terimi,$perPage,$pageNumber)
    {
        $this->kisit = $kisit;
        $this->arama_terimi = $arama_terimi;
        $this->perPage=$perPage;
        $this->pageNumber=$pageNumber;
        $this->liste();
    }

    private function str_temizler($str)
    {
        $str = str_replace(',', ' ', $str);
        $str = str_replace('.', ' ', $str);
        $str = str_replace(';', ' ', $str);
        $str = str_replace('+', ' ', $str);
        return $str;
    }

    private function liste()
    {
        $arama_terimi = $this->str_temizler($this->arama_terimi);

        // arama kelimelerini bir arraye at�yoruz
        $arama_kelimeleri = explode(' ', $arama_terimi);

        // arama kelimelerindeki bo� kelimeleri ��kar�yoruz
        $son_arama_kelimeleri = array();
        if (count($arama_kelimeleri) > 0) {
            foreach ($arama_kelimeleri as $akelime) {
                if (!empty($akelime)) {
                    $son_arama_kelimeleri[] = $akelime;
                }
            }
        }

        $where_list = array();
        if (count($son_arama_kelimeleri)) {
            foreach ($son_arama_kelimeleri as $kelime) {
                $where_list[] = " adi LIKE '%$kelime%' OR yonetmen LIKE '%$kelime%' OR oyuncular LIKE '%$kelime%' OR konu LIKE '%$kelime%' ";
            }
        }
        $kesin = '';
        if (!empty($kisit)) {
            if ($kisit == 'gosterimde') {
                $kesin = ' gosterimde=1 ';
            } elseif ($kisit == 'gelecek') {
                $kesin = ' gelecek=1 ';
            } elseif ($kisit == 'eski') {
                $kesin = ' gosterimde=0 AND gelecek=0 ';
            }
        }

        // olu�turdu�umuz where dizisini OR ile birle�tirip tek bir stringle �eviriyoruz.
        $where_clause = implode('OR', $where_list);
        $raw = '';
        if (!empty($where_clause)) {
            if (!empty($kesin)) {
                $raw .= " $kesin AND ($where_clause) ";
            } else {
                $raw .= " $where_clause ";
            }
        }



        $adet=Filim::where(\DB::raw("$raw"))
            ->count();
        $this->adet=$adet;

        $filimler = Filim::where(\DB::raw("$raw"))
            ->skip(($this->pageNumber - 1) * $this->perPage)->take($this->perPage)
            ->get();

        $tarih = date("Y-m-d");
        foreach ($filimler as $i) {
            $m = new Movie($i->movie_id, $tarih);
            $m->get();
            $this->filimler[] = $m;
        }
    }
}