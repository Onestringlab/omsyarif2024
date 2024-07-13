<?php

namespace App\Http\Controllers;

use App\Models\Satker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $satker = Satker::where('kode', Auth::user()->satker)->first();
        if($satker!=null){
            $satuankerja = $satker->nama;
        }
        else{
            $satuankerja = "SLIP.web.id";
        }
        return view('home', ['satuankerja' => $satuankerja]);
    }

    public function unggahgaji()
    {
        return view('slipgaji.unggahgaji');
    }

    public function slipku()
    {
        return view('slipgaji.slipku');
    }
}
