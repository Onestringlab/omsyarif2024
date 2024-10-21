<?php

namespace App\Http\Controllers;

use App\Models\Months;
use App\Models\Potongan;
use App\Models\Satker;
use App\Models\Nomenklatur;
use App\Imports\PotongansImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class PotonganController extends Controller
{

    public function index()
    {
        $rows = Potongan::all();
        return view('potongans/potonganslist', ['rows' => $rows]);
    }

    public function create($month_id)
    {
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        $nkt = Nomenklatur::where('kode_satker', Auth::user()->satker)->first();
        return view('potongans/potongansform', ['action' => 'insert', 'month_id' => $month->id, 'nkt' => $nkt]);
    }

    public function store(Request $request)
    {
        $potongans = new Potongan;
        $potongans->month_id = $request->month_id;
        $potongans->nip = $request->nip;
        $potongans->nama = $request->nama;
        $potongans->p1 = $request->p1;
        $potongans->p2 = $request->p2;
        $potongans->p3 = $request->p3;
        $potongans->p4 = $request->p4;
        $potongans->p5 = $request->p5;
        $potongans->p6 = $request->p6;
        $potongans->p7 = $request->p7;
        $potongans->p8 = $request->p8;
        $potongans->p9 = $request->p9;
        $potongans->p10 = $request->p10;
        $potongans->p11 = $request->p11;
        $potongans->p12 = $request->p12;
        $potongans->p13 = $request->p13;
        $potongans->p14 = $request->p14;
        $potongans->p15 = $request->p15;
        $potongans->jumlah = $request->jumlah;
        $potongans->save();
        return redirect('/potongans/data/' . $potongans->month_id);
    }

    public function show($month_id, $id)
    {
        $potongans = Potongan::find($id);
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        $nkt = Nomenklatur::where('kode_satker', Auth::user()->satker)->first();
        return view('potongans/potongansform', ['row' => $potongans, 'action' => 'detail', 'month_id' => $month->id, 'nkt' => $nkt]);
    }

    public function edit($month_id, $id)
    {
        $potongans = Potongan::find($id);
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        $nkt = Nomenklatur::where('kode_satker', Auth::user()->satker)->first();
        return view('potongans/potongansform', ['row' => $potongans, 'action' => 'update', 'month_id' => $month->id, 'nkt' => $nkt]);
    }

    public function update(Request $request)
    {
        $potongans = Potongan::find($request->id);
        $potongans->month_id = $request->month_id;
        $potongans->nip = $request->nip;
        $potongans->nama = $request->nama;
        $potongans->p1 = $request->p1;
        $potongans->p2 = $request->p2;
        $potongans->p3 = $request->p3;
        $potongans->p4 = $request->p4;
        $potongans->p5 = $request->p5;
        $potongans->p6 = $request->p6;
        $potongans->p7 = $request->p7;
        $potongans->p8 = $request->p8;
        $potongans->p9 = $request->p9;
        $potongans->p10 = $request->p10;
        $potongans->p11 = $request->p11;
        $potongans->p12 = $request->p12;
        $potongans->p13 = $request->p13;
        $potongans->p14 = $request->p14;
        $potongans->p15 = $request->p15;
        $potongans->jumlah = $request->jumlah;
        $potongans->save();
        return redirect('/potongans/data/' . $potongans->month_id);
    }

    public function delete($month_id, $id)
    {
        $potongans = Potongan::find($id);
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        $nkt = Nomenklatur::where('kode_satker', Auth::user()->satker)->first();
        return view('potongans/potongansform', ['row' => $potongans, 'action' => 'delete', 'month_id' => $month->id, 'nkt' => $nkt]);
    }

    public function destroy($id)
    {
        $potongans = Potongan::find($id);
        $potongans->delete();
        return redirect('/potongans/data/' . $potongans->month_id);
    }


    public function data($month_id)
    {
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        $rows = Potongan::where('month_id', $month_id)->orderBy('nama', 'ASC')->get();
        $nkt = Nomenklatur::where('kode_satker', Auth::user()->satker)->first();
        if (is_null($nkt)) {
            return redirect('/nomenklatur');
        }
        return view('potongans/potonganslist', ['rows' => $rows, 'month' => $month]);
    }

    public function potongansslip()
    {
        $nip = Auth::user()->nip;
        $satker = Auth::user()->satker;
        $rows = Potongan::select('potongans.*')
            ->join('months', 'months.id', '=', 'potongans.month_id')
            ->where('months.satker', $satker)
            ->where('nip', $nip)
            ->orderBy('month_id', 'DESC')
            ->get();
        return view('potongans/potongansslip', ['rows' => $rows]);
    }

    public function potongans($id)
    {
        $row = Potongan::where('id', $id)->where('nip', Auth::user()->nip)->first();
        $nkt = Nomenklatur::where('kode_satker', Auth::user()->satker)->first();
        return view('potongans/potongans', ['row' => $row, 'nkt' => $nkt]);
    }

    public function potonganspdf($id)
    {
        $row = Potongan::where('id', $id)->where('nip', Auth::user()->nip)->first();
        $satker = Satker::where('kode', Auth::user()->satker)->first();
        $nkt = Nomenklatur::where('kode_satker', Auth::user()->satker)->first();
        $pdf = PDF::loadview('potongans/potonganspdf', ['row' => $row, 'satker' => $satker, 'nkt' => $nkt])->setPaper('a5');
        return $pdf->stream('potongan_potongan' . generate_uuid_4());
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');
        try {
            Excel::import(new PotongansImport($request->month_id), $file);
        } catch (\Exception $e) {
            $message = 'File yang diunggah tidak cocok!';
            return back()->with(['message' => $message]);
        }
        return redirect('/potongans/data/' . $request->month_id);
    }

    public function remove($month_id)
    {
        Potongan::where('month_id', '=', $month_id)->delete();
        return redirect('/potongans/data/' . $month_id);
    }
}
