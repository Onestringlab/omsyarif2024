<?php

namespace App\Http\Controllers;

use App\Models\Months;
use App\Models\Salaries;
use App\Imports\SalaryModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;


class SalariesController extends Controller
{

  public function index()
  {
    $rows = Salaries::all();
    return view('salaries/salarieslist', ['rows' => $rows]);
  }

  public function create($month_id)
  {
    return view('salaries/salariesform', ['action' => 'insert', 'month_id' => $month_id]);
  }

  public function store(Request $request)
  {
    $salaries = new Salaries;
    // $salaries->id = $request->id;
    $salaries->month_id = $request->month_id;
    $salaries->name = $request->name;
    $salaries->nip = $request->nip;
    $salaries->gol = $request->gol;
    $salaries->rekening = $request->rekening;
    $salaries->bank = $request->bank;
    $salaries->bersih = $request->bersih;
    $salaries->p1 = $request->p1;
    $salaries->p2 = $request->p2;
    $salaries->p3 = $request->p3;
    $salaries->p4 = $request->p4;
    $salaries->p5 = $request->p5;
    $salaries->p6 = $request->p6;
    $salaries->p7 = $request->p7;
    $salaries->p8 = $request->p8;
    $salaries->p9 = $request->p9;
    $salaries->p10 = $request->p10;
    $salaries->p11 = $request->p11;
    $salaries->p12 = $request->p12;
    $salaries->p13 = $request->p13;
    $salaries->p14 = $request->p14;
    $salaries->p15 = $request->p15;
    $salaries->point = $request->point;
    $salaries->bayar = $request->bayar;
    // $salaries->created_at = $request->created_at;
    // $salaries->updated_at = $request->updated_at;
    $salaries->save();
    return redirect('/salaries/data/' . $salaries->month_id);
  }

  public function show($month_id, $id)
  {
    $salaries = Salaries::find($id);
    return view('salaries/salariesform', ['row' => $salaries, 'action' => 'detail', 'month_id' => $month_id]);
  }

  public function edit($month_id, $id)
  {
    $salaries = Salaries::find($id);
    return view('salaries/salariesform', ['row' => $salaries, 'action' => 'update', 'month_id' => $month_id]);
  }

  public function update(Request $request)
  {
    $salaries = Salaries::find($request->id);
    // $salaries->id = $request->id;
    $salaries->month_id = $request->month_id;
    $salaries->name = $request->name;
    $salaries->nip = $request->nip;
    $salaries->gol = $request->gol;
    $salaries->rekening = $request->rekening;
    $salaries->bank = $request->bank;
    $salaries->bersih = $request->bersih;
    $salaries->p1 = $request->p1;
    $salaries->p2 = $request->p2;
    $salaries->p3 = $request->p3;
    $salaries->p4 = $request->p4;
    $salaries->p5 = $request->p5;
    $salaries->p6 = $request->p6;
    $salaries->p7 = $request->p7;
    $salaries->p8 = $request->p8;
    $salaries->p9 = $request->p9;
    $salaries->p10 = $request->p10;
    $salaries->p11 = $request->p11;
    $salaries->p12 = $request->p12;
    $salaries->p13 = $request->p13;
    $salaries->p14 = $request->p14;
    $salaries->p15 = $request->p15;
    $salaries->point = $request->point;
    $salaries->bayar = $request->bayar;
    // $salaries->created_at = $request->created_at;
    // $salaries->updated_at = $request->updated_at;
    $salaries->save();
    return redirect('/salaries/data/' . $salaries->month_id);
  }

  public function delete($month_id, $id)
  {
    $salaries = Salaries::find($id);
    return view('salaries/salariesform', ['row' => $salaries, 'action' => 'delete', 'month_id' => $month_id]);
  }

  public function destroy($id)
  {
    $salaries = Salaries::find($id);
    $salaries->delete();
    return redirect('/salaries/data/' . $salaries->month_id);
  }


  public function data($month_id)
  {
    $rows = Salaries::where('month_id', $month_id)->orderBy('name', 'ASC')->get();
    $month = Months::where('id', $month_id)->first();
    return view('salaries/salarieslist', ['rows' => $rows, 'month' => $month]);
  }

  public function dibayarkanlist()
  {
    $nip = Auth::user()->nip;
    $rows = Salaries::where('nip', $nip)->orderBy('month_id', 'DESC')->get();
    return view('salaries/dibayarkanlist', ['rows' => $rows]);
  }

  public function dibayarkan($id)
  {
    $row = Salaries::where('id', $id)->where('nip', Auth::user()->nip)->first();
    return view('salaries/dibayarkan', ['row' => $row]);
  }

  public function dibayarkanpdf($id)
  {
    $row = Salaries::where('id', $id)->where('nip', Auth::user()->nip)->first();
    $pdf = PDF::loadview('salaries/dibayarkanpdf', ['row' => $row])->setPaper('a5');
    // return $pdf->download('dibayarkan_dibayarkan' . generate_uuid() . '.pdf');
    return $pdf->stream('dibayarkan_dibayarkan' . generate_uuid_4());
  }

  public function import(Request $request)
  {
    $this->validate($request, [
      'file' => 'required|mimes:xls,xlsx',
    ]);

    $file = $request->file('file');
    try {
      Excel::import(new SalaryModel($request->month_id), $file);
    } catch (\Exception $e) {
      $message = 'File yang diunggah tidak cocok!';
      return back()->with(['message' => $message]);
    }
    return redirect('/salaries/data/' . $request->month_id);
  }

  public function remove($month_id)
  {
    Salaries::where('month_id', '=', $month_id)->delete();
    return redirect('/salaries/data/' . $month_id);
  }
}
