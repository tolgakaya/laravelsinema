<?php
/**
 * Created by PhpStorm.
 * User: WIN8
 * Date: 31/10/2016
 * Time: 22:53
 */

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Filim;


class FilimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $ifilim;

    function __construct()
    {

    }

    public function index($kisit = null)
    {
        if ($kisit !== null) {
            $filimler = Filim::where($kisit, true)->paginate(5);
        } else {
            $filimler = Filim::paginate(5);
        }

        // return $filimler;
        return view('admin.filims.list')->with('filimler', $filimler);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

        $this->validate($request, [
            'arama_terimi' => 'required|max:255',

        ]);
        $arama_terimi = $request->get('arama_terimi');

        $filimler = Filim::where('adi', 'LIKE', '%' . $arama_terimi . '%')
            ->orWhere('oyuncular', 'LIKE', '%' . $arama_terimi . '%')
            ->paginate(5);

        return view('admin.filims.list', ['filimler' => $filimler]);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kontrol = array(
            'adi' => 'required|max:255',
            'yonetmen' => 'required|max:255',
            'oyuncular' => 'required|max:255',
            'konu' => 'required|max:255',
            'ulke' => 'required|max:255',
            'yas_siniri' => 'required|max:255',
            'yil' => 'required|max:255',
            'kategori' => 'required|max:255',
            'suresi' => 'required|max:255',

        );
        /*$validator=\Validator::make(Input::all(),$kontrol);
        if ($validator->fails())
        {
            return redirect(route('adminfilimcreate'))->withInput();
        }*/
        $this->validate($request, $kontrol);
        $gelenler = $request->except('gelgors');
        $gelgors = $request->get('gelgors');
        $gosterimde = 0;
        $gelecek = 0;
        if ($gelgors == 'gelecek') {
            $gelecek = 1;
        } elseif ($gelgors == 'gosterimde') {
            $gosterimde = 1;
        }
        $a=array('gosterimde'=>$gosterimde, 'gelecek'=>$gelecek);
        $gelenler = array_merge($gelenler,$a);
        Filim::create($gelenler);

        return \Redirect::route('adminfilimliste')->with('mesaj', 'Yeni filim kaydı yapıldı');

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($movie_id)
    {

        $filim=Filim::find($movie_id);
        if (is_null($filim))
        {
            return \Redirect::route('adminfilimliste')->with('mesaj',['Filim bulunamadı']);
        }

        return view('admin.filims.update',compact('filim'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $movie_id)
    {

        $kontrol = array(

            'adi' => 'required|max:255',
            'yonetmen' => 'required|max:255',
            'oyuncular' => 'required|max:255',
            'konu' => 'required|max:255',
            'ulke' => 'required|max:255',
            'yas_siniri' => 'required|max:255',
            'yil' => 'required|max:255',
            'kategori' => 'required|max:255',
            'suresi' => 'required|max:255',

        );
        /*$validator=\Validator::make(Input::all(),$kontrol);
        if ($validator->fails())
        {
            return redirect(route('adminfilimcreate'))->withInput();
        }*/
        $this->validate($request, $kontrol);
        $filim=Filim::find($movie_id);
        if (is_null($filim))
        {
            return \Redirect::route('adminfilimliste')->with('mesaj',['Filim bulunamadı']);
        }
        $gelenler = $request->except('gelgors');
        $gelgors = $request->get('gelgors');
        $gosterimde = 0;
        $gelecek = 0;
        if ($gelgors == 'gelecek') {
            $gelecek = 1;
        } elseif ($gelgors == 'gosterimde') {
            $gosterimde = 1;
        }
        $a=array('gosterimde'=>$gosterimde, 'gelecek'=>$gelecek);
        $gelenler = array_merge($gelenler,$a);
        $filim->update($gelenler);

        return \Redirect::route('adminfilimliste')->with('mesaj',['Filim güncellendi']);
    }



}