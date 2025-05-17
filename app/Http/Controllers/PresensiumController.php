<?php

namespace App\Http\Controllers;

use App\Models\Months;
use App\Models\Presensium;
use App\Imports\PresensiumImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PresensiumController extends Controller
{

	public function index()
	{
		$rows = Presensium::all();
		return view('presensium/presensiumlist', ['rows' => $rows]);
	}

	public function create($month_id)
	{
		$month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
		return view('presensium/presensiumform', ['action' => 'insert', 'month_id' => $month->id]);
	}

	public function store(Request $request)
	{
		$presensium = new Presensium;
		$presensium->month_id = $request->month_id;
		$presensium->nama = $request->nama;
		$presensium->nip = $request->nip;
		$presensium->jabatan = $request->jabatan;
		$presensium->vd = $request->vd;
		$presensium->tkd = $request->tkd;
		$presensium->tl1 = $request->tl1;
		$presensium->tl2 = $request->tl2;
		$presensium->tl3 = $request->tl3;
		$presensium->tl4 = $request->tl4;
		$presensium->thm = $request->thm;
		$presensium->vp = $request->vp;
		$presensium->ik = $request->ik;
		$presensium->psw1 = $request->psw1;
		$presensium->psw2 = $request->psw2;
		$presensium->psw3 = $request->psw3;
		$presensium->psw4 = $request->psw4;
		$presensium->thp = $request->thp;
		$presensium->i = $request->i;
		$presensium->dls = $request->dls;
		$presensium->ct = $request->ct;
		$presensium->clt = $request->clt;
		$presensium->cpp = $request->cpp;
		$presensium->ctl = $request->ctl;
		$presensium->tb = $request->tb;
		$presensium->ld = $request->ld;
		$presensium->bmt = $request->bmt;
		$presensium->ib = $request->ib;
		$presensium->tmk = $request->tmk;
		$presensium->cs1 = $request->cs1;
		$presensium->cs14 = $request->cs14;
		$presensium->cm1 = $request->cm1;
		$presensium->cm2 = $request->cm2;
		$presensium->cm3 = $request->cm3;
		$presensium->cm41 = $request->cm41;
		$presensium->cm42 = $request->cm42;
		$presensium->cm43 = $request->cm43;
		$presensium->cap1 = $request->cap1;
		$presensium->cap10 = $request->cap10;
		$presensium->cb1 = $request->cb1;
		$presensium->cb2 = $request->cb2;
		$presensium->cb3 = $request->cb3;
		$presensium->tk = $request->tk;
		$presensium->ptk = $request->ptk;
		$presensium->kum = 0;
		$presensium->kut = 0;
		$presensium->save();
		return redirect('/presensium/data/' . $presensium->month_id);
	}

	public function show($month_id, $id)
	{
		$presensium = Presensium::find($id);
		$month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
		return view('presensium/presensiumform', ['row' => $presensium, 'action' => 'detail', 'month_id' => $month->id]);
	}

	public function edit($month_id, $id)
	{
		$presensium = Presensium::find($id);
		$month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
		return view('presensium/presensiumform', ['row' => $presensium, 'action' => 'update', 'month_id' => $month->id]);
	}

	public function update(Request $request)
	{
		$presensium = Presensium::find($request->id);
		// $presensium->id = $request->id;
		$presensium->month_id = $request->month_id;
		$presensium->nama = $request->nama;
		$presensium->nip = $request->nip;
		$presensium->jabatan = $request->jabatan;
		$presensium->vd = $request->vd;
		$presensium->tkd = $request->tkd;
		$presensium->tl1 = $request->tl1;
		$presensium->tl2 = $request->tl2;
		$presensium->tl3 = $request->tl3;
		$presensium->tl4 = $request->tl4;
		$presensium->thm = $request->thm;
		$presensium->vp = $request->vp;
		$presensium->ik = $request->ik;
		$presensium->psw1 = $request->psw1;
		$presensium->psw2 = $request->psw2;
		$presensium->psw3 = $request->psw3;
		$presensium->psw4 = $request->psw4;
		$presensium->thp = $request->thp;
		$presensium->i = $request->i;
		$presensium->dls = $request->dls;
		$presensium->ct = $request->ct;
		$presensium->clt = $request->clt;
		$presensium->cpp = $request->cpp;
		$presensium->ctl = $request->ctl;
		$presensium->tb = $request->tb;
		$presensium->ld = $request->ld;
		$presensium->bmt = $request->bmt;
		$presensium->ib = $request->ib;
		$presensium->tmk = $request->tmk;
		$presensium->cs1 = $request->cs1;
		$presensium->cs14 = $request->cs14;
		$presensium->cm1 = $request->cm1;
		$presensium->cm2 = $request->cm2;
		$presensium->cm3 = $request->cm3;
		$presensium->cm41 = $request->cm41;
		$presensium->cm42 = $request->cm42;
		$presensium->cm43 = $request->cm43;
		$presensium->cap1 = $request->cap1;
		$presensium->cap10 = $request->cap10;
		$presensium->cb1 = $request->cb1;
		$presensium->cb2 = $request->cb2;
		$presensium->cb3 = $request->cb3;
		$presensium->tk = $request->tk;
		$presensium->ptk = $request->ptk;
		$presensium->kum = 0;
		$presensium->kut = 0;
		$presensium->status = $request->status;
		$presensium->alasan = $request->alasan;
		$presensium->save();
		return redirect('/presensium/data/' . $presensium->month_id);
	}

	public function delete($month_id, $id)
	{
		$presensium = Presensium::find($id);
		$month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
		return view('presensium/presensiumform', ['row' => $presensium, 'action' => 'delete', 'month_id' => $month->id]);
	}

	public function destroy($id)
	{
		$presensium = Presensium::find($id);
		$presensium->delete();
		return redirect('/presensium/data/' . $presensium->month_id);
	}

	public function data($month_id)
	{
		$month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
		$rows = Presensium::where('month_id', $month_id)
			->orderBy('nama', 'ASC')
			->get();
		return view('presensium/presensiumlist', ['rows' => $rows, 'month' => $month]);
	}

	public function import(Request $request)
	{
		$this->validate($request, [
			'file' => 'required|mimes:xls,xlsx',
		]);

		$file = $request->file('file');
		try {
			Excel::import(new PresensiumImport($request->month_id), $file);
		} catch (\Exception $e) {
			$message = 'File yang diunggah tidak cocok!';
			return back()->with(['message' => $message]);
		}
		return redirect('/presensium/data/' . $request->month_id);
	}

	public function remove($month_id)
	{
		Presensium::where('month_id', '=', $month_id)->delete();
		return redirect('/presensium/data/' . $month_id);
	}

	// user side 
	public function presensiumlist()
	{

		$nip = Auth::user()->nip;
		$satker = Auth::user()->satker;
		$rows = Presensium::where("nip", $nip)
			->select('presensium.*')
			->join('months', 'presensium.month_id', 'months.id')
			->where('months.satker', $satker)
			->orderBy('month_id', 'DESC')
			->get();
		return view('presensium/presensilist', ['rows' => $rows]);
	}

	public function presensium($id)
	{
		$row = Presensium::where("id", $id)
			->where('nip', Auth::user()->nip)
			->first();
		return view('presensium/presensi', ['row' => $row]);
	}

	public function presensiumform($id)
	{
		$row = Presensium::where("id", $id)->where('nip', Auth::user()->nip)->first();
		return view('presensium/presensiform', ['row' => $row]);
	}

	public function presensiumedit(Request $request)
	{
		$presensium = Presensium::find($request->id);
		$presensium->status = $request->status;
		$presensium->alasan = $request->alasan;
		$presensium->save();
		return redirect('/presensiumlist');
	}
}
