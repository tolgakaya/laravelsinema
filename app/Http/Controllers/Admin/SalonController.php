<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 02/11/2016
 * Time: 20:16
 */

namespace App\Http\Controllers\Admin;

use App\Models\Salon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SalonController extends  Controller
{
    function index()
    {
        $salonlar=Salon::paginate(10);

        return view('admin.salons.list')->with('salonlar',$salonlar);
    }
    public function store(Request $request)
    {
        $kontrol = array(
            'salon_adi' => 'required|max:255',
            'aciklama' => 'required|max:255',
        );

        $this->validate($request, $kontrol);
        $gelenler = $request->all();

        Salon::create($gelenler);

        return \Redirect::route('adminsalonlist')->with('mesaj', 'Yeni salon kaydı yapıldı');

    }

    public function show($salon_id)
    {

        $salon=Salon::find($salon_id);
        if (is_null($salon))
        {
            return \Redirect::route('adminsalonlist')->with('mesaj',['Salon bulunamadı']);
        }

        return view('admin.salons.update',compact('salon'));
    }

    public function update(Request $request, $salon_id)
    {

        $kontrol = array(

            'salon_adi' => 'required|max:255',
            'aciklama' => 'required|max:255',

        );

        $this->validate($request, $kontrol);
        $salon=Salon::find($salon_id);
        if (is_null($salon))
        {
            return \Redirect::route('adminsalonlist')->with('mesaj',['Salon bulunamadı']);
        }
        $gelenler = $request->all();
        $salon->update($gelenler);

        return \Redirect::route('adminsalonlist')->with('mesaj',['Salon bilgisi güncellendi']);
    }


}