<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\MessageBag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Mantik;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($page = 1)
    {
        $tarih = date('Y-m-d');
        $perPage=5;
        $i = new Mantik\MovieList($tarih, $page,$perPage);
        $total = $i->adet;

        $sayfa_sayisi = ceil($total / $perPage);

        $tema = 'liste';
        return view('list', ['filimler' => $i->filimler, 'tema' => $tema, 'num_pages' => $sayfa_sayisi, 'current_page' => $page]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request,$page=1)
    {
        $this->validate($request, [
            'arama_terimi' => 'required|max:255',

        ]);
        $arama_terimi = $request->get('arama_terimi');

        $kisit = $request->get('kisit');
        $perPage=5;
        $i = new Mantik\MovieSearch($kisit, $arama_terimi,$perPage,$page);

        $total = $i->adet;

        $sayfa_sayisi = ceil($total / $perPage);
        $tema = 'liste';
        return view('list', ['filimler' => $i->filimler, 'tema' => $tema, 'num_pages' => $sayfa_sayisi, 'current_page' => $page]);


    }



    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($movie_id)
    {

        $tarih = date('Y-m-d');
        // $i=new Mantik\Movie(1,$tarih);
        $i = new Mantik\Movie($movie_id, $tarih);
        $i->get();
        $tema = 'single';
        return view('single', ['movie' => $i, 'tema' => $tema]);
    }


}
