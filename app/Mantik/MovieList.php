<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 24/10/2016
 * Time: 10:08
 */

namespace App\Mantik;


use App\Models\Filim;

class MovieList
{

    private $tarih;
    public $filimler = array();
    public $adet;

    function __construct($tarih, $pageNumber,$perPage)
    {
        $this->tarih = $tarih;
        $this->liste($perPage, $pageNumber);
    }

    private function liste($perPage, $pageNumber)
    {
        $adet = Filim::where('gosterimde', true)
            ->orWhere('gelecek', true)
            ->count();
        $this->adet=$adet;

        $filimler = Filim::where('gosterimde', true)
            ->orWhere('gelecek', true)
            ->orderBy('movie_id', 'asc')
            ->skip(($pageNumber - 1) * $perPage)->take($perPage)
            ->get();

        foreach ($filimler as $i) {
            $m = new Movie($i->movie_id, $this->tarih);
            $m->get();
            $this->filimler[] = $m;
        }
    }
}