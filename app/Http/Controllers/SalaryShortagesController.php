<?php

namespace App\Http\Controllers;

use App\Imports\ShortStagesModel;
use App\Models\SalaryShortages;
use App\Models\Users;
use App\Models\Months;
use App\Models\Satker;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class SalaryShortagesController extends Controller
{

    public function index()
    {
        $rows = SalaryShortages::all();
        return view('salary_shortages/list', ['rows' => $rows]);
    }

    public function create($month_id)
    {
        $month = Months::where('id', $month_id)
            ->where('satker', Auth::user()->satker)
            ->first();

        return view('salary_shortages/form', [
            'action' => 'insert',
            'month_id' => $month->id
        ]);
    }

    public function store(Request $request)
    {
        $row = new SalaryShortages;

        $row->month_id = $request->month_id;
        $row->nip = $request->nip;
        $row->nmpeg = $request->nmpeg;
        $row->npwp = $request->npwp;
        $row->rekening = $request->rekening;
        $row->nmbankspan = $request->nmbankspan;

        $row->gjpokok = $request->gjpokok;
        $row->tjistri = $request->tjistri;
        $row->tjanak = $request->tjanak;
        $row->tjupns = $request->tjupns;
        $row->tjstruk = $request->tjstruk;
        $row->tjfungs = $request->tjfungs;
        $row->tjdaerah = $request->tjdaerah;
        $row->tjpencil = $request->tjpencil;
        $row->tjlain = $request->tjlain;
        $row->tjkompen = $request->tjkompen;
        $row->pembul = $request->pembul;
        $row->tjberas = $request->tjberas;
        $row->tjpph = $request->tjpph;

        $row->tottun = $request->tottun;
        $row->kotor = $request->kotor;

        $row->potpfkbul = $request->potpfkbul;
        $row->potpfk2 = $request->potpfk2;
        $row->potpfk10 = $request->potpfk10;
        $row->potpph = $request->potpph;
        $row->potswrum = $request->potswrum;

        $row->totpot = $request->totpot;
        $row->bersih = $request->bersih;

        $row->bpjs = $request->bpjs;
        $row->bpjs2 = $request->bpjs2;

        $row->keterangan = $request->keterangan;

        $row->save();

        return redirect('/salary-shortages/data/' . $row->month_id);
    }

    public function show($month_id, $id)
    {
        $row = SalaryShortages::find($id);

        $month = Months::where('id', $month_id)
            ->where('satker', Auth::user()->satker)
            ->first();

        return view('salary_shortages/form', [
            'row' => $row,
            'action' => 'detail',
            'month_id' => $month->id
        ]);
    }

    public function edit($month_id, $id)
    {
        $row = SalaryShortages::find($id);

        $month = Months::where('id', $month_id)
            ->where('satker', Auth::user()->satker)
            ->first();

        return view('salary_shortages/form', [
            'row' => $row,
            'action' => 'update',
            'month_id' => $month->id
        ]);
    }

    public function update(Request $request)
    {
        $row = SalaryShortages::find($request->id);

        $row->month_id = $request->month_id;
        $row->nip = $request->nip;
        $row->nmpeg = $request->nmpeg;
        $row->npwp = $request->npwp;
        $row->rekening = $request->rekening;
        $row->nmbankspan = $request->nmbankspan;

        $row->gjpokok = $request->gjpokok;
        $row->tjistri = $request->tjistri;
        $row->tjanak = $request->tjanak;
        $row->tjupns = $request->tjupns;
        $row->tjstruk = $request->tjstruk;
        $row->tjfungs = $request->tjfungs;
        $row->tjdaerah = $request->tjdaerah;
        $row->tjpencil = $request->tjpencil;
        $row->tjlain = $request->tjlain;
        $row->tjkompen = $request->tjkompen;
        $row->pembul = $request->pembul;
        $row->tjberas = $request->tjberas;
        $row->tjpph = $request->tjpph;

        $row->tottun = $request->tottun;
        $row->kotor = $request->kotor;

        $row->potpfkbul = $request->potpfkbul;
        $row->potpfk2 = $request->potpfk2;
        $row->potpfk10 = $request->potpfk10;
        $row->potpph = $request->potpph;
        $row->potswrum = $request->potswrum;

        $row->totpot = $request->totpot;
        $row->bersih = $request->bersih;

        $row->bpjs = $request->bpjs;
        $row->bpjs2 = $request->bpjs2;

        $row->keterangan = $request->keterangan;

        $row->save();

        return redirect('/salary-shortages/data/' . $row->month_id);
    }

    public function delete($month_id, $id)
    {
        $row = SalaryShortages::find($id);

        $month = Months::where('id', $month_id)
            ->where('satker', Auth::user()->satker)
            ->first();

        return view('salary_shortages/form', [
            'row' => $row,
            'action' => 'delete',
            'month_id' => $month->id
        ]);
    }

    public function destroy($id)
    {
        $row = SalaryShortages::find($id);
        $row->delete();

        return redirect('/salary-shortages/data/' . $row->month_id);
    }

    public function data($month_id)
    {
        $month = Months::where('id', $month_id)
            ->where('satker', Auth::user()->satker)
            ->first();

        $rows = SalaryShortages::where('month_id', $month_id)
            ->orderBy('nmpeg', 'ASC')
            ->get();

        $userNips = Users::pluck('nip')->toArray();

        foreach ($rows as $row) {
            $row->user_exists = in_array($row->nip, $userNips);
            if ($row->user_exists) {
                $row->salam = "Yth. Bapak/Ibu " . addslashes($row->nmpeg) . " \\nBerikut kami bagikan slip kekurangan gaji yang dibayarkan pada bulan " . $month->month . " " . $month->year . ". Silakan klik tautan berikut untuk mengunduh/membuka file.\\nTerima kasih.\\n";
            } else {
                $row->salam = 'Pengguna tidak terdaftar';
            }
        }

        return view('salary_shortages/list', [
            'rows' => $rows,
            'month' => $month
        ]);
    }

    public function remove($month_id)
    {
        SalaryShortages::where('month_id', '=', $month_id)->delete();
        return redirect('/salary-shortages/data/' . $month_id);
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file|max:204800|mimes:xlsx,xls'
        ]);

        $file = $request->file('file');
        try {
            Excel::import(new ShortStagesModel($request->month_id, $request->keterangan), $file);
        } catch (\Exception $e) {
            $message = 'File yang diunggah tidak cocok!';
            return back()->with(['message' => $message]);
        }

        return redirect('/salary-shortages/data/' . $request->month_id);
    }

    public function kekuranganlist()
    {

        $nip = Auth::user()->nip;
        $satker = Auth::user()->satker;
        $rows = SalaryShortages::select('salary_shortages.*')
            ->where('nip', $nip)
            ->join('months', 'months.id', '=', 'salary_shortages.month_id')
            ->where('months.satker', $satker)
            ->orderBy('month_id', 'DESC')
            ->get();
        return view('salary_shortages/kekuranganlist', ['rows' => $rows]);
    }

    public function kekurangan($id)
    {
        $row = SalaryShortages::where("id", $id)->where('nip', Auth::user()->nip)->first();
        return view('salary_shortages/kekurangan', ['row' => $row]);
    }

    public function kekuranganpdf($id)
    {
        $row = SalaryShortages::where('id', $id)
            ->where('nip', Auth::user()->nip)
            ->first();
        $satker = Satker::where('kode', Auth::user()->satker)->first();
        $pdf = PDF::loadview('salary_shortages/kekuranganpdf', ['row' => $row, 'satker' => $satker])->setPaper('a5');
        return $pdf->stream('slip_kekurangan_' . generate_uuid_4());
    }

    public function kekuranganpdfshare($encryptedParams)
    {
        $params = decrypt($encryptedParams);
        $row = SalaryShortages::where('id', $params['id'])
            ->where('nip', $params['nip'])
            ->first();
        $user = Users::where('nip', $params['nip'])->first();
        $satker = Satker::where('kode', $user['satker'])->first();
        $pdf = PDF::loadview('salary_shortages/kekuranganpdfshare', ['row' => $row, 'satker' => $satker])->setPaper('a5');
        return $pdf->stream('slip_kekurangan_' . generate_uuid_4());
    }

    public function kekuranganpdfmonth($month_id)
    {
        $rows = SalaryShortages::where('month_id', $month_id)->orderBy('nmpeg', 'asc')->get();
        $satker = Satker::where('kode', Auth::user()->satker)->first();
        $pdf = PDF::loadview('salary_shortages/kekuranganpdfmonth', ['rows' => $rows, 'satker' => $satker])->setPaper('a4');
        return $pdf->stream('slip_kekurangan_month' . generate_uuid_4());
    }
}
