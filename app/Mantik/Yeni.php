<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 23/10/2016
 * Time: 22:47
 */

namespace App\Mantik;
use App\Models;

class Yeni
{
    public  function goster()
    {
       /* $filimler = Filim::where('gosterimde', true)
            ->orWhere('gelecek', true)
            ->get();*/
       $filim=Models\Filim::find(1);
       $g= $filim->galeri;
        return view('welcome')->with('galeri',$g);
    }
}