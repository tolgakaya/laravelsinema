<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 30/10/2016
 * Time: 13:00
 */

namespace App\Mantik\OdemeIslemleri;


interface IGozlenebilir
{

    function attach(IGozleyen $gozleyen);

    function detach(IGozleyen $gozleyen);

    function notify();
}