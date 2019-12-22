<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 30/10/2016
 * Time: 17:03
 */

namespace App\Mantik\OdemeIslemleri;


interface ITahsilat
{
    public function handleTahsilat($status,$user,$ip);

    public function getStatus();

    public function setStatus($status,$user,$ip);
}