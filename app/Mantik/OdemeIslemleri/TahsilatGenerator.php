<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 30/10/2016
 * Time: 17:22
 */

namespace App\Mantik\OdemeIslemleri;


class TahsilatGenerator
{
    static  function Get($tahsilat_turu)
    {
        $ns="App\\Mantik\\OdemeIslemleri\\";
        $sinif=$ns.$tahsilat_turu.'Tahsilat';
        return new $sinif();
    }
}