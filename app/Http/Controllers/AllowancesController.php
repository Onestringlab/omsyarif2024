<?php

namespace App\Http\Controllers;

use App\Imports\AllowanceModel;
use App\Models\Months;
use App\Models\Satker;
use App\Models\Allowances;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AllowancesController extends Controller
{

  public function index()
  {
    $rows = Allowances::all();
    return view('allowances/allowanceslist', ['rows' => $rows]);
  }

  public function create($month_id)
  {
    $month = Months::where('id', $month_id)->where('satker',Auth::user()->satker)->first();
    return view('allowances/allowancesform', ['action' => 'insert', 'month_id' => $month->id]);
  }

  public function store(Request $request)
  {
    $allowances = new Allowances;
    // $allowances->id = $request->id;
    $allowances->month_id = $request->month_id;
    $allowances->nip = $request->nip;
    $allowances->nmpeg = $request->nmpeg;
    $allowances->npwp = $request->npwp;
    $allowances->rekening = $request->rekening;
    $allowances->nmbankspan = $request->nmbankspan;
    $allowances->gjpokok = $request->gjpokok;
    $allowances->tjistri = $request->tjistri;
    $allowances->tjanak = $request->tjanak;
    $allowances->tjupns = $request->tjupns;
    $allowances->tjstruk = $request->tjstruk;
    $allowances->tjfungs = $request->tjfungs;
    $allowances->tjdaerah = $request->tjdaerah;
    $allowances->tjpencil = $request->tjpencil;
    $allowances->tjlain = $request->tjlain;
    $allowances->tjkompen = $request->tjkompen;
    $allowances->pembul = $request->pembul;
    $allowances->tjberas = $request->tjberas;
    $allowances->tjpph = $request->tjpph;
    $allowances->tottun = $request->tottun;
    $allowances->kotor = $request->kotor;
    $allowances->potpfkbul = $request->potpfkbul;
    $allowances->potpfk2 = $request->potpfk2;
    $allowances->potpfk10 = $request->potpfk10;
    $allowances->potpph = $request->potpph;
    $allowances->potswrum = $request->potswrum;
    $allowances->potkelbtj = $request->potkelbtj;
    $allowances->potlain = $request->potlain;
    $allowances->pottabrum = $request->pottabrum;
    $allowances->bpjs = $request->bpjs;
    $allowances->bpjs2 = $request->bpjs2;
    $allowances->totpot = $request->totpot;
    $allowances->bersih = $request->bersih;
    $allowances->save();
    return redirect('/allowances/data/' . $allowances->month_id);
  }

  public function show($month_id, $id)
  {
    $allowances = Allowances::find($id);
    $month = Months::where('id', $month_id)->where('satker',Auth::user()->satker)->first();
    return view('allowances/allowancesform', ['row' => $allowances, 'action' => 'detail', 'month_id' => $month->id]);
  }

  public function edit($month_id, $id)
  {
    $allowances = Allowances::find($id);
    $month = Months::where('id', $month_id)->where('satker',Auth::user()->satker)->first();
    return view('allowances/allowancesform', ['row' => $allowances, 'action' => 'update', 'month_id' => $month->id]);
  }

  public function update(Request $request)
  {
    $allowances = Allowances::find($request->id);
    // $allowances->id = $request->id;
    $allowances->month_id = $request->month_id;
    $allowances->nip = $request->nip;
    $allowances->nmpeg = $request->nmpeg;
    $allowances->npwp = $request->npwp;
    $allowances->rekening = $request->rekening;
    $allowances->nmbankspan = $request->nmbankspan;
    $allowances->gjpokok = $request->gjpokok;
    $allowances->tjistri = $request->tjistri;
    $allowances->tjanak = $request->tjanak;
    $allowances->tjupns = $request->tjupns;
    $allowances->tjstruk = $request->tjstruk;
    $allowances->tjfungs = $request->tjfungs;
    $allowances->tjdaerah = $request->tjdaerah;
    $allowances->tjpencil = $request->tjpencil;
    $allowances->tjlain = $request->tjlain;
    $allowances->tjkompen = $request->tjkompen;
    $allowances->pembul = $request->pembul;
    $allowances->tjberas = $request->tjberas;
    $allowances->tjpph = $request->tjpph;
    $allowances->tottun = $request->tottun;
    $allowances->kotor = $request->kotor;
    $allowances->potpfkbul = $request->potpfkbul;
    $allowances->potpfk2 = $request->potpfk2;
    $allowances->potpfk10 = $request->potpfk10;
    $allowances->potpph = $request->potpph;
    $allowances->potswrum = $request->potswrum;
    $allowances->potkelbtj = $request->potkelbtj;
    $allowances->potlain = $request->potlain;
    $allowances->pottabrum = $request->pottabrum;
    $allowances->bpjs = $request->bpjs;
    $allowances->bpjs2 = $request->bpjs2;
    $allowances->totpot = $request->totpot;
    $allowances->bersih = $request->bersih;
    $allowances->save();
    return redirect('/allowances/data/' . $allowances->month_id);
  }

  public function delete($month_id, $id)
  {
    $allowances = Allowances::find($id);
    $month = Months::where('id', $month_id)->where('satker',Auth::user()->satker)->first();
    return view('allowances/allowancesform', ['row' => $allowances, 'action' => 'delete', 'month_id' => $month->id]);
  }

  public function destroy($id)
  {
    $allowances = Allowances::find($id);
    $allowances->delete();
    return redirect('/allowances/data/' . $allowances->month_id);
  }

  public function data($month_id)
  {
    $month = Months::where('id', $month_id)->where('satker',Auth::user()->satker)->first();
    $rows = Allowances::where('month_id', $month_id)->orderBy('nmpeg', 'ASC')->get();
    return view('allowances/allowanceslist', ['rows' => $rows, 'month' => $month]);
  }

  public function bersihlist()
  {

    $nip = Auth::user()->nip;
    $satker = Auth::user()->satker;
    $rows = Allowances::select('allowances.*')
              ->where('nip', $nip) 
              ->join('months','months.id', '=', 'allowances.month_id')
              ->where('months.satker',$satker)
              ->orderBy('month_id', 'DESC')
              ->get();
    return view('allowances/bersihlist', ['rows' => $rows]);
  }

  public function bersih($id)
  {
    $row = Allowances::where("id", $id)->where('nip', Auth::user()->nip)->first();
    return view('allowances/bersih', ['row' => $row]);
  }

  public function import(Request $request)
  {

    $this->validate($request, [
      'file' => 'required|file|max:204800|mimes:xlsx,xls'
    ]);

    $file = $request->file('file');
    try {
      Excel::import(new AllowanceModel($request->month_id), $file);
    } catch (\Exception $e) {
      $message = 'File yang diunggah tidak cocok!';
      return back()->with(['message' => $message]);
    }

    return redirect('/allowances/data/' . $request->month_id);
  }

  public function remove($month_id)
  {
    Allowances::where('month_id', '=', $month_id)->delete();
    return redirect('/allowances/data/' . $month_id);
  }

  public function bersihpdf($id)
  {
    $row = Allowances::where('id', $id)
            ->where('nip', Auth::user()->nip)
            ->first();
    $satker = Satker::where('kode',Auth::user()->satker)->first();
    $pdf = PDF::loadview('allowances/bersihpdf', ['row' => $row, 'satker' => $satker])->setPaper('a5');
    return $pdf->stream('slip_bersih_' . generate_uuid_4());
  }
}
