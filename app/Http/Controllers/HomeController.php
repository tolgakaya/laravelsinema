<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mantik\Home;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ana_sayfe = new Home();

        return view('Home', ['home' => $ana_sayfe, 'tema' => 'home']);
    }


}
