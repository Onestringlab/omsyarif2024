<?php

namespace App\Http\Controllers;

use App\Models\Months;
use App\Models\Presence;
use App\Imports\PresencesImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class PresenceController extends Controller
{

	public function index()
	{
		$rows = Presence::all();
		return view('presence/presencelist', ['rows' => $rows]);
	}

	public function create($month_id)
	{
		$month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
		return view('presence/presenceform', ['action' => 'insert', 'month_id' => $month->id]);
	}

	public function store(Request $request)
	{
		$presence = new Presence;
		$presence->month_id = $request->month_id;
		$presence->nama = $request->nama;
		$presence->nip = $request->nip;
		$presence->jabatan = $request->jabatan;
		$presence->vd = $request->vd;
		$presence->tkd = $request->tkd;
		$presence->tl1 = $request->tl1;
		$presence->tl2 = $request->tl2;
		$presence->tl3 = $request->tl3;
		$presence->tl4 = $request->tl4;
		$presence->thm = $request->thm;
		$presence->vp = $request->vp;
		$presence->ik = $request->ik;
		$presence->psw1 = $request->psw1;
		$presence->psw2 = $request->psw2;
		$presence->psw3 = $request->psw3;
		$presence->psw4 = $request->psw4;
		$presence->thp = $request->thp;
		$presence->i = $request->i;
		$presence->dls = $request->dls;
		$presence->ct = $request->ct;
		$presence->clt = $request->clt;
		$presence->cpp = $request->cpp;
		$presence->ctl = $request->ctl;
		$presence->tb = $request->tb;
		$presence->ld = $request->ld;
		$presence->bmt = $request->bmt;
		$presence->ib = $request->ib;
		$presence->tmk = $request->tmk;
		$presence->cs1 = $request->cs1;
		$presence->cs14 = $request->cs14;
		$presence->cm1 = $request->cm1;
		$presence->cm2 = $request->cm2;
		$presence->cm3 = $request->cm3;
		$presence->cm41 = $request->cm41;
		$presence->cm42 = $request->cm42;
		$presence->cm43 = $request->cm43;
		$presence->cap1 = $request->cap1;
		$presence->cap10 = $request->cap10;
		$presence->cb1 = $request->cb1;
		$presence->cb2 = $request->cb2;
		$presence->cb3 = $request->cb3;
		$presence->tk = $request->tk;
		$presence->ptk = $request->ptk;
		$presence->kum = 0;
		$presence->kut = 0;
		$presence->save();
		return redirect('/presence/data/' . $presence->month_id);
	}

	public function show($month_id, $id)
	{
		$presences = Presence::find($id);
		$month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
		return view('presence/presenceform', ['row' => $presences, 'action' => 'detail', 'month_id' => $month->id]);
	}

	public function edit($month_id, $id)
	{
		$presence = Presence::find($id);
		$month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
		return view('presence/presenceform', ['row' => $presence, 'action' => 'update', 'month_id' => $month->id]);
	}

	public function update(Request $request)
	{
		$presence = Presence::find($request->id);
		// $presence->id = $request->id;
		$presence->month_id = $request->month_id;
		$presence->nama = $request->nama;
		$presence->nip = $request->nip;
		$presence->jabatan = $request->jabatan;
		$presence->vd = $request->vd;
		$presence->tkd = $request->tkd;
		$presence->tl1 = $request->tl1;
		$presence->tl2 = $request->tl2;
		$presence->tl3 = $request->tl3;
		$presence->tl4 = $request->tl4;
		$presence->thm = $request->thm;
		$presence->vp = $request->vp;
		$presence->ik = $request->ik;
		$presence->psw1 = $request->psw1;
		$presence->psw2 = $request->psw2;
		$presence->psw3 = $request->psw3;
		$presence->psw4 = $request->psw4;
		$presence->thp = $request->thp;
		$presence->i = $request->i;
		$presence->dls = $request->dls;
		$presence->ct = $request->ct;
		$presence->clt = $request->clt;
		$presence->cpp = $request->cpp;
		$presence->ctl = $request->ctl;
		$presence->tb = $request->tb;
		$presence->ld = $request->ld;
		$presence->bmt = $request->bmt;
		$presence->ib = $request->ib;
		$presence->tmk = $request->tmk;
		$presence->cs1 = $request->cs1;
		$presence->cs14 = $request->cs14;
		$presence->cm1 = $request->cm1;
		$presence->cm2 = $request->cm2;
		$presence->cm3 = $request->cm3;
		$presence->cm41 = $request->cm41;
		$presence->cm42 = $request->cm42;
		$presence->cm43 = $request->cm43;
		$presence->cap1 = $request->cap1;
		$presence->cap10 = $request->cap10;
		$presence->cb1 = $request->cb1;
		$presence->cb2 = $request->cb2;
		$presence->cb3 = $request->cb3;
		$presence->tk = $request->tk;
		$presence->ptk = $request->ptk;
		$presence->kum = 0;
		$presence->kut = 0;
		$presence->status = $request->status;
		$presence->alasan = $request->alasan;
		$presence->save();
		return redirect('/presence/data/' . $presence->month_id);
	}

	public function delete($month_id, $id)
	{
		$presence = Presence::find($id);
		$month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
		return view('presence/presenceform', ['row' => $presence, 'action' => 'delete', 'month_id' => $month->id]);
	}

	public function destroy($id)
	{
		$presence = Presence::find($id);
		$presence->delete();
		return redirect('/presence/data/' . $presence->month_id);
	}

	public function data($month_id)
	{
		$month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
		$rows = Presence::where('month_id', $month_id)
			->orderBy('nama', 'ASC')
			->get();
		return view('presence/presencelist', ['rows' => $rows, 'month' => $month]);
	}

	public function import(Request $request)
	{
		$this->validate($request, [
			'file' => 'required|mimes:xls,xlsx',
		]);

		$file = $request->file('file');
		try {
			Excel::import(new PresencesImport($request->month_id), $file);
		} catch (\Exception $e) {
			$message = 'File yang diunggah tidak cocok!';
			return back()->with(['message' => $message]);
		}
		return redirect('/presence/data/' . $request->month_id);
	}

	public function remove($month_id)
	{
		Presence::where('month_id', '=', $month_id)->delete();
		return redirect('/presence/data/' . $month_id);
	}

	// user side 
	public function presensilist()
	{

		$nip = Auth::user()->nip;
		$satker = Auth::user()->satker;
		$rows = Presence::where("nip", $nip)
			->select('presences.*')
			->join('months', 'presences.month_id', 'months.id')
			->where('months.satker', $satker)
			->orderBy('month_id', 'DESC')
			->get();
		return view('presence/presensilist', ['rows' => $rows]);
	}

	public function presensi($id)
	{
		$row = Presence::where("id", $id)
			->where('nip', Auth::user()->nip)
			->first();
		return view('presence/presensi', ['row' => $row]);
	}

	public function presensiform($id)
	{
		$row = Presence::where("id", $id)->where('nip', Auth::user()->nip)->first();
		return view('presence/presensiform', ['row' => $row]);
	}

	public function presensiedit(Request $request)
	{
		$presence = Presence::find($request->id);
		$presence->status = $request->status;
		$presence->alasan = $request->alasan;
		$presence->save();
		return redirect('/presensilist');
	}
}
