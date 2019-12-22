<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 02/11/2016
 * Time: 20:16
 */

namespace App\Http\Controllers\Admin;

use App\Models\fiyat_grup;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class GrupController extends  Controller
{
    function index()
    {
        $gruplar=fiyat_grup::paginate(10);

        return view('admin.fiyat_grups.list')->with('gruplar',$gruplar);
    }
    public function store(Request $request)
    {
        $kontrol = array(
            'grup_adi' => 'required|max:255',
            'aciklama' => 'required|max:255',
        );

        $this->validate($request, $kontrol);
        $gelenler = $request->all();

        fiyat_grup::create($gelenler);

        return \Redirect::route('admingruplist')->with('mesaj', 'Yeni filim kaydı yapıldı');

    }

    public function show($grup_id)
    {

        $grup=fiyat_grup::find($grup_id);
        if (is_null($grup))
        {
            return \Redirect::route('admingruplist')->with('mesaj',['Filim bulunamadı']);
        }

        return view('admin.fiyat_grups.update',compact('grup'));
    }

    public function update(Request $request, $grup_id)
    {

        $kontrol = array(

            'grup_adi' => 'required|max:255',
            'aciklama' => 'required|max:255',

        );

        $this->validate($request, $kontrol);
        $grup=fiyat_grup::find($grup_id);
        if (is_null($grup))
        {
            return \Redirect::route('admingruplist')->with('mesaj',['Filim bulunamadı']);
        }
        $gelenler = $request->all();
        $grup->update($gelenler);

        return \Redirect::route('admingruplist')->with('mesaj',['Filim güncellendi']);
    }


}