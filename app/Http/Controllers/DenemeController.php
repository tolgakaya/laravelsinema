<?php

namespace App\Http\Controllers;

//use App\Filim;
//use App\test;
use App\Mantik\BookInfoViewModel;
use App\Mantik\OdemeIslemleri;
use App\Mantik\BiletKes;

class DenemeController extends Controller
{
    function index()
    {
        //$tahsilat = new OdemeIslemleri\Tahsilat();
        //buradaki tahsilat yönteminin sınıfı ayarlardan çekilecek
        $tahsilat = OdemeIslemleri\TahsilatGenerator::Get('KartTahsilat');
        $tahsilat->handleTahsilat("", "", "");
        $info=new BookInfoViewModel();
        $monitor = new BiletKes($tahsilat,$info);
       return $monitor->doUpdate($tahsilat);
    }
}
