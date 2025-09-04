<?php

namespace App\Http\Controllers;

use App\Models\Meal;
use App\Models\Users;
use App\Models\Months;
use App\Models\Satker;
use App\Imports\MealsImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;



class MealsController extends Controller
{

    public function index()
    {
        $rows = Meal::all();
        return view('meals/mealslist', ['rows' => $rows]);
    }

    public function create($month_id)
    {
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        return view('meals/mealsform', ['action' => 'insert', 'month_id' => $month->id]);
    }

    public function store(Request $request)
    {

        $month = Months::where('id', $request->month_id)->where('satker', Auth::user()->satker)->first();
        $meals = new Meal;
        $meals->month_id = $request->month_id;
        $meals->kdsatker = Auth::user()->satker;
        $meals->bln = $month->month;
        $meals->tahun = $month->year;
        $meals->tanggal = $month->year . '-' . $month->month . '-' . '03';
        $meals->nogaji = $request->nogaji;
        $meals->nip = $request->nip;
        $meals->nmpeg = $request->nmpeg;
        $meals->kdgol = $request->kdgol;
        $meals->jmlhari = $request->jmlhari;
        $meals->tarif = $request->tarif;
        $meals->pph = $request->pph;
        $meals->kotor = $request->kotor;
        $meals->potongan = $request->potongan;
        $meals->bersih = $request->bersih;
        $meals->save();
        return redirect('/meals/data/' . $meals->month_id);
    }

    public function show($month_id, $id)
    {
        $meals = Meal::find($id);
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        return view('meals/mealsform', ['row' => $meals, 'action' => 'detail', 'month_id' => $month->id]);
    }

    public function edit($month_id, $id)
    {
        $meals = Meal::find($id);
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        return view('meals/mealsform', ['row' => $meals, 'action' => 'update', 'month_id' => $month->id]);
    }

    public function update(Request $request)
    {
        $meals = Meal::find($request->id);
        $meals->nogaji = $request->nogaji;
        $meals->nip = $request->nip;
        $meals->nmpeg = $request->nmpeg;
        $meals->kdgol = $request->kdgol;
        $meals->jmlhari = $request->jmlhari;
        $meals->tarif = $request->tarif;
        $meals->pph = $request->pph;
        $meals->kotor = $request->kotor;
        $meals->potongan = $request->potongan;
        $meals->bersih = $request->bersih;
        $meals->save();
        return redirect('/meals/data/' . $meals->month_id);
    }

    public function delete($month_id, $id)
    {
        $meals = Meal::find($id);
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        return view('meals/mealsform', ['row' => $meals, 'action' => 'delete', 'month_id' => $month->id]);
    }

    public function destroy($id)
    {
        $meals = Meal::find($id);
        $meals->delete();
        return redirect('/meals/data/' . $meals->month_id);
    }

    public function makanlist()
    {
        $nip = Auth::user()->nip;
        $satker = Auth::user()->satker;
        $rows = Meal::select('meals.*')
            ->join('months', 'months.id', '=', 'meals.month_id')
            ->where('months.satker', $satker)
            ->where('nip', $nip)
            ->orderBy('month_id', 'DESC')
            ->get();
        return view('meals/makanlist', ['rows' => $rows]);
    }

    public function makan($id)
    {
        $row = Meal::where("id", $id)->where('nip', Auth::user()->nip)->first();
        return view('meals/makan', ['row' => $row]);
    }

    public function makanpdf($id)
    {
        $row = Meal::where('id', $id)
            ->where('nip', Auth::user()->nip)
            ->first();
        $satker = Satker::where('kode', Auth::user()->satker)->first();
        $pdf = PDF::loadview('meals/makanpdf', ['row' => $row, 'satker' => $satker])->setPaper('a5');
        return $pdf->stream('slip_makan_' . generate_uuid_4());
    }

    public function makanpdfshare($encryptedParams)
    {
        $params = decrypt($encryptedParams);
        $row = Meal::where('id', $params['id'])
            ->where('nip', $params['nip'])
            ->first();
        $user = Users::where('nip', $params['nip'])->first();
        $satker = Satker::where('kode', $user['satker'])->first();
        $pdf = PDF::loadview('meals/makanpdfshare', ['row' => $row, 'satker' => $satker])->setPaper('a5');
        return $pdf->stream('slip_makan_' . generate_uuid_4());
    }

    public function makanpdfmonth($month_id)
    {
        $rows = Meal::where('month_id', $month_id)->orderBy('nmpeg', 'asc')->get();
        $satker = Satker::where('kode', Auth::user()->satker)->first();
        $pdf = PDF::loadview('meals/makanpdfmonth', ['rows' => $rows, 'satker' => $satker])->setPaper('a4');
        return $pdf->stream('slip_makan_month' . generate_uuid_4());
    }

    // Admin Role 
    public function data($month_id)
    {
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        $rows = Meal::where('month_id', $month_id)->orderBy('nmpeg', 'ASC')->get();

        $userNips = Users::pluck('nip')->toArray();

        foreach ($rows as $row) {
            $row->user_exists = in_array($row->nip, $userNips);
            if ($row->user_exists) {
                $row->salam = "Yth. Bapak/Ibu " . addslashes($row->nmpeg) . " \\nBerikut kami bagikan slip uang makan bulan " . $month->month . " " . $month->year . ". Silakan klik tautan berikut untuk mengunduh/membuka file.\\nTerima kasih.\\n";
            } else {
                $row->salam = 'Pengguna tidak terdaftar';
            }
        }

        return view('meals/mealslist', ['rows' => $rows, 'month' => $month]);
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');
        try {
            Excel::import(new MealsImport($request->month_id), $file);
        } catch (\Exception $e) {
            $message = 'File yang diunggah tidak cocok!';
            return back()->with(['message' => $e]);
        }
        return redirect('/meals/data/' . $request->month_id);
    }

    public function remove($month_id)
    {
        Meal::where('month_id', '=', $month_id)->delete();
        return redirect('/meals/data/' . $month_id);
    }
}
