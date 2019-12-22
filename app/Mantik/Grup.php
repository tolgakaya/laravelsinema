<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 29/10/2016
 * Time: 10:43
 */

namespace App\Mantik;

use App\Models;

class Grup
{
 public  function Liste()
 {
     $gruplar=Models\fiyat_grup::all();
     return $gruplar;
 }

}