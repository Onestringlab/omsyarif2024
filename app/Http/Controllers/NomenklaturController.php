<?php

namespace App\Http\Controllers;

use App\Models\Nomenklatur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NomenklaturController extends Controller
{

    public function index()
    {
        $rows = Nomenklatur::where('kode_satker', Auth::user()->satker)->first();
        if (is_null($rows)) {
            return view('nomenklaturs/nomenklaturform', ['action' => 'insert']);
        } else {
            return view('nomenklaturs/nomenklaturlist', ['row' => $rows]);
        }
    }

    public function create()
    {
        return view('nomenklaturs/nomenklaturform', ['action' => 'insert']);
    }

    public function store(Request $request)
    {
        $nomenklatur = new Nomenklatur;
        $nomenklatur->kode_satker = Auth::user()->satker;
        $nomenklatur->p1 = $request->p1;
        $nomenklatur->p2 = $request->p2;
        $nomenklatur->p3 = $request->p3;
        $nomenklatur->p4 = $request->p4;
        $nomenklatur->p5 = $request->p5;
        $nomenklatur->p6 = $request->p6;
        $nomenklatur->p7 = $request->p7;
        $nomenklatur->p8 = $request->p8;
        $nomenklatur->p9 = $request->p9;
        $nomenklatur->p10 = $request->p10;
        $nomenklatur->p11 = $request->p11;
        $nomenklatur->p12 = $request->p12;
        $nomenklatur->p13 = $request->p13;
        $nomenklatur->p14 = $request->p14;
        $nomenklatur->p15 = $request->p15;
        $nomenklatur->save();
        return redirect('/nomenklatur');
    }

    public function show($id)
    {
        $nomenklatur = Nomenklatur::find($id);
        return view('nomenklaturs/nomenklaturform', ['row' => $nomenklatur, 'action' => 'detail']);
    }

    public function edit($id)
    {
        $nomenklatur = Nomenklatur::find($id);
        return view('nomenklaturs/nomenklaturform', ['row' => $nomenklatur, 'action' => 'update']);
    }

    public function update(Request $request)
    {
        $nomenklatur = Nomenklatur::find($request->id);
        $nomenklatur->kode_satker = Auth::user()->satker;
        $nomenklatur->p1 = $request->p1;
        $nomenklatur->p2 = $request->p2;
        $nomenklatur->p3 = $request->p3;
        $nomenklatur->p4 = $request->p4;
        $nomenklatur->p5 = $request->p5;
        $nomenklatur->p6 = $request->p6;
        $nomenklatur->p7 = $request->p7;
        $nomenklatur->p8 = $request->p8;
        $nomenklatur->p9 = $request->p9;
        $nomenklatur->p10 = $request->p10;
        $nomenklatur->p11 = $request->p11;
        $nomenklatur->p12 = $request->p12;
        $nomenklatur->p13 = $request->p13;
        $nomenklatur->p14 = $request->p14;
        $nomenklatur->p15 = $request->p15;
        $nomenklatur->save();
        return redirect('/nomenklatur');
    }

    public function delete($idnomenklatur)
    {
        $nomenklatur = Nomenklatur::find($idnomenklatur);
        return view('nomenklaturs/nomenklaturform', ['row' => $nomenklatur, 'action' => 'delete']);
    }

    public function destroy($id)
    {
        $nomenklatur = Nomenklatur::find($id);
        $nomenklatur->delete();
        return redirect('/nomenklatur');
    }
}
