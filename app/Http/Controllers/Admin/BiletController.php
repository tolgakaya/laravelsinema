<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 02/11/2016
 * Time: 20:16
 */

namespace App\Http\Controllers\Admin;

use App\Models\Bilet;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class BiletController extends Controller
{
    /*
     * seansagöre biletleri listele
     * filme göre biletlerilistele
     * tarihe göre biletleri listele
     *
     */
    function index($tarih = null)
    {
        //bütün biletler
        if ($tarih == null) {
            $biletler = Bilet::paginate(10);

        } else {
            $tarih = new \DateTime($tarih);
            $tarih = $tarih->format('Y-m-d');
            $biletler = Bilet::where(['seans_tarihi' => $tarih])->paginate(10);
        }

        return view('admin.bilets.list')->with(['biletler' => $biletler]);
    }

    function seans($seans_id, $tarih=null)
    {
        //seansın o tarihteki bilet listesi

        if ($tarih == null) {
            $tarih = new \DateTime();
        }
        else{
            $tarih = new \DateTime($tarih);
        }
        $tarih = $tarih->format('Y-m-d');

        $biletler = Bilet::where(['seans_id' => $seans_id, 'seans_tarihi' => $tarih])->paginate(10);

        return view('admin.bilets.list')->with(['biletler' => $biletler, 'seans_id' => $seans_id, 'tarih'=>$tarih]);
    }

    function ara(Request $request)
    {
        $seans=$request->get('seans_id');
        $tarih=$request->get('tarih');
        if ($seans=='')
        {
            return \Redirect::route('biletlist',['tarih'=>$tarih]);
        }
        else
        {
            return \Redirect::route('biletseans',['seans_id'=>$seans,'tarih'=>$tarih]);
        }
    }


    function delete($bilet_id)
    {
        $gelenler = array(

            'iptal' => 1,
        );

        $bilet = Bilet::find($bilet_id);
        if (is_null($bilet)) {
            return \Redirect::route('biletlist')->with('mesaj', ['Bilet bulunamadı']);
        }

        $bilet->update($gelenler);

        return \Redirect::route('biletlist')->with('mesaj', ['Bilet silindi']);
    }


    public function show($bilet_id)
    {

        $bilet = Bilet::find($bilet_id);
        if (is_null($bilet)) {
            return \Redirect::route('biletlist')->with('mesaj', ['Bilet bulunamadı']);
        }

        return view('admin.bilets.show', compact('bilet'));
    }


}