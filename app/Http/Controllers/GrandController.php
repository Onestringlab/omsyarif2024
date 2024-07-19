<?php

namespace App\Http\Controllers;

use App\Models\Grand;
use App\Models\Months;
use App\Models\Satker;
use Illuminate\Http\Request;
use App\Imports\GrandsImport;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class GrandController extends Controller
{

	public function index()
	{
		$rows = Grand::all();
		return view('grand/grandlist', ['rows' => $rows]);
	}

	public function create($month_id)
	{
    $month = Months::where('id', $month_id)->where('satker',Auth::user()->satker)->first();
		return view('grand/grandform', ['action' => 'insert', 'month_id' => $month->id]);
	}

	public function store(Request $request)
	{
		$grand = new Grand;
		$grand->month_id = $request->month_id;
		$grand->nama = $request->nama;
		$grand->nip = $request->nip;
		$grand->npwp = $request->npwp;
		$grand->panggol = $request->panggol;
		$grand->jabatan = $request->jabatan;
		$grand->grad = $request->grad;
		$grand->maxmedmin = $request->maxmedmin;
		$grand->tunjangan = $request->tunjangan;
		$grand->potabs = $request->potabs;
		$grand->potkim = $request->potkim;
		$grand->jumlahpot = $request->jumlahpot;
		$grand->jumtunjsetpot = $request->jumtunjsetpot;
		$grand->tunjpph = $request->tunjpph;
		$grand->bruto = $request->bruto;
		$grand->potpph = $request->potpph;
		$grand->netto = $request->netto;
		$grand->status = $request->status;
		$grand->alasan = $request->alasan;
		$grand->created_at = $request->created_at;
		$grand->updated_at = $request->updated_at;
		$grand->save();
		return redirect('/grand/data/'.$grand->month_id);
	}

	public function show($month_id, $id)
	{
		$grand = Grand::find($id);
    $month = Months::where('id', $month_id)->where('satker',Auth::user()->satker)->first();
		return view('grand/grandform', ['row' => $grand, 'action' => 'detail', 'month_id' => $month->id]);
	}

	public function edit($month_id, $id)
	{
		$grand = Grand::find($id);
    $month = Months::where('id', $month_id)->where('satker',Auth::user()->satker)->first();
		return view('grand/grandform', ['row' => $grand, 'action' => 'update', 'month_id' => $month->id]);
	}

	public function update(Request $request)
	{
		$grand = Grand::find($request->id);
		$grand->id = $request->id;
		$grand->month_id = $request->month_id;
		$grand->nama = $request->nama;
		$grand->nip = $request->nip;
		$grand->npwp = $request->npwp;
		$grand->panggol = $request->panggol;
		$grand->jabatan = $request->jabatan;
		$grand->grad = $request->grad;
		$grand->maxmedmin = $request->maxmedmin;
		$grand->tunjangan = $request->tunjangan;
		$grand->potabs = $request->potabs;
		$grand->potkim = $request->potkim;
		$grand->jumlahpot = $request->jumlahpot;
		$grand->jumtunjsetpot = $request->jumtunjsetpot;
		$grand->tunjpph = $request->tunjpph;
		$grand->bruto = $request->bruto;
		$grand->potpph = $request->potpph;
		$grand->netto = $request->netto;
		$grand->status = $request->status;
		$grand->alasan = $request->alasan;
		$grand->created_at = $request->created_at;
		$grand->updated_at = $request->updated_at;
		$grand->save();
		return redirect('/grand/data/' . $grand->month_id);
	}

	public function delete($month_id, $id)
	{
		$grand = Grand::find($id);
    $month = Months::where('id', $month_id)->where('satker',Auth::user()->satker)->first();
		return view('grand/grandform', ['row' => $grand, 'action' => 'delete', 'month_id' => $month->id]);
	}

	public function destroy($id)
	{
		$grand = Grand::find($id);
		$grand->delete();
		return redirect('/grand/data/' . $grand->month_id);
	}

	public function data($month_id)
	{
    $month = Months::where('id', $month_id)->where('satker',Auth::user()->satker)->first();
		$rows = Grand::where('month_id', $month_id)->orderBy('nama', 'ASC')->get();
		return view('grand/grandlist', ['rows' => $rows, 'month' => $month]);
	}

	public function import(Request $request)
	{
		$this->validate($request, [
			'file' => 'required|mimes:xls,xlsx',
		]);

		$file = $request->file('file');

		try {
			Excel::import(new GrandsImport($request->month_id), $file);
		} catch (\Exception $e) {
			$message = 'File yang diunggah tidak cocok!';
			return back()->with(['message' => $message]);
		}
		return redirect('/grand/data/' . $request->month_id);
	}

	public function remove($month_id)
	{
		Grand::where('month_id', '=', $month_id)->delete();
		return redirect('/grand/data/' . $month_id);
	}

	// user side 
	public function tungkinlist()
	{
		$nip = Auth::user()->nip;
		$satker = Auth::user()->satker;
		$rows = Grand::select('grands.*')
							->where("nip", $nip)
							->join('months','months.id', '=', 'grands.month_id')
							->where('months.satker',$satker)
							->orderBy('created_at', 'DESC')
							->get();
		return view('grand/tungkinlist', ['rows' => $rows]);
	}

	public function tungkin($id)
	{
		$row = Grand::where("id", $id)->where('nip', Auth::user()->nip)->first();
		return view('grand/tungkin', ['row' => $row]);
	}

	public function tungkinform($id)
	{
		$row = Grand::where("id", $id)->where('nip', Auth::user()->nip)->first();
		return view('grand/tungkinform', ['row' => $row]);
	}

	public function tungkinedit(Request $request)
	{
		$grand = Grand::find($request->id);
		$grand->status = $request->status;
		$grand->alasan = $request->alasan;
		$grand->save();
		return redirect('/tungkinlist');
	}

	public function tungkinpdf($id)
    {
        $row = Grand::where('id', $id)
                ->where('nip', Auth::user()->nip)
                ->first();
        $satker = Satker::where('kode',Auth::user()->satker)->first();
        $pdf = PDF::loadview('grand/tungkinpdf', ['row' => $row, 'satker' => $satker])->setPaper('a5');
        return $pdf->stream('slip_tungkin_' . generate_uuid_4());
    }
}
