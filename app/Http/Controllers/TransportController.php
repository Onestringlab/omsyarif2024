<?php

namespace App\Http\Controllers;


use App\Models\Users;
use App\Models\Months;
use App\Models\Satker;
use App\Models\Transport;
use App\Imports\TransportImport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;


class TransportController extends Controller
{

    public function index()
    {
        $rows = Transport::all();
        return view('transport/transportlist', ['rows' => $rows]);
    }

    public function create($month_id)
    {
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        return view('transport/transportform', ['action' => 'insert', 'month_id' => $month->id]);
    }

    public function store(Request $request)
    {
        $month = Months::where('id', $request->month_id)->where('satker', Auth::user()->satker)->first();
        $transport = new Transport;
        $transport->month_id = $request->month_id;
        $transport->nama = $request->nama;
        $transport->nip_nik = $request->nip_nik;
        $transport->pangkat_gol = $request->pangkat_gol;
        $transport->jabatan = $request->jabatan;
        $transport->standar_biaya = $request->standar_biaya;
        $transport->satker = $request->satker;
        $transport->total_kehadiran = $request->total_kehadiran;
        $transport->fasilitas_kendaraan_dinas = $request->fasilitas_kendaraan_dinas;
        $transport->fasilitas_uang_transportasi = $request->fasilitas_uang_transportasi;
        $transport->jumlah_diterima = $request->jumlah_diterima;
        $transport->save();
        return redirect('/transport/data/' . $transport->month_id);

    }

    public function show($month_id, $id)
    {
        $transport = Transport::find($id);
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        return view('transport/transportform', ['row' => $transport, 'action' => 'detail', 'month_id' => $month->id]);
    }

    public function edit($month_id, $id)
    {
        $transport = Transport::find($id);
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        return view('transport/transportform', ['row' => $transport, 'action' => 'update', 'month_id' => $month->id]);
    }

    public function update(Request $request)
    {
        $transport = Transport::find($request->id);
        $transport->id = $request->id;
        $transport->month_id = $request->month_id;
        $transport->nama = $request->nama;
        $transport->nip_nik = $request->nip_nik;
        $transport->pangkat_gol = $request->pangkat_gol;
        $transport->jabatan = $request->jabatan;
        $transport->standar_biaya = $request->standar_biaya;
        $transport->satker = $request->satker;
        $transport->total_kehadiran = $request->total_kehadiran;
        $transport->fasilitas_kendaraan_dinas = $request->fasilitas_kendaraan_dinas;
        $transport->fasilitas_uang_transportasi = $request->fasilitas_uang_transportasi;
        $transport->jumlah_diterima = $request->jumlah_diterima;
        $transport->save();
        return redirect('/transport/data/' . $transport->month_id);

    }

    public function delete($month_id, $id)
    {
        $transport = Transport::find($id);
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        return view('transport/transportform', ['row' => $transport, 'action' => 'delete', 'month_id' => $month->id]);
    }

    public function destroy($id)
    {
        $transport = Transport::find($id);
        $transport->delete();
        return redirect('/transport/data/' . $transport->month_id);
    }

    public function kendaraanlist()
    {
        $nip = Auth::user()->nip;
        $satker = Auth::user()->satker;
        $rows = Transport::select('transports.*')
                    ->join('months', 'months.id', '=', 'transports.month_id')
                    ->where('months.satker', $satker)
                        ->where('nip_nik', $nip)
                        ->orderBy('month_id', 'DESC')
                        ->get();
        return view('transport/kendaraanlist', ['rows' => $rows]);
    }

    public function kendaraan($id)
    {
        $row = Transport::where("id", $id)->where('nip_nik', Auth::user()->nip)->first();
        return view('transport/kendaraan', ['row' => $row]);
    }

    public function kendaraanpdf($id)
    {
        $row = Transport::where('id', $id)
            ->where('nip_nik', Auth::user()->nip)
            ->first();
        $satker = Satker::where('kode', Auth::user()->satker)->first();
        $pdf = PDF::loadview('transport/kendaraanpdf', ['row' => $row, 'satker' => $satker])->setPaper('a5');
        return $pdf->stream('slip_transport_' . generate_uuid_4());
    }

    public function kendaraanpdfshare($encryptedParams)
    {
        $params = decrypt($encryptedParams);
        $row = Transport::where('id', $params['id'])
            ->where('nip_nik', $params['nip'])
            ->first();
        $user = Users::where('nip', $params['nip'])->first();
        $satker = Satker::where('kode', $user['satker'])->first();
        $pdf = PDF::loadview('transport/kendaraanpdfshare', ['row' => $row, 'satker' => $satker])->setPaper('a5');
        return $pdf->stream('slip_kendaraan_' . generate_uuid_4());
    }

    public function kendaraanpdfmonth($month_id)
    {
        $rows = Transport::where('month_id', $month_id)->orderBy('nama','asc')->get();
        $satker = Satker::where('kode', Auth::user()->satker)->first();
        $pdf = PDF::loadview('transport/kendaraanpdfmonth', ['rows' => $rows, 'satker' => $satker])->setPaper('a4');
        return $pdf->stream('slip_transport_month' . generate_uuid_4());
    }

    // admin role
    public function data($month_id)
    {
        $month = Months::where('id', $month_id)->where('satker', Auth::user()->satker)->first();
        $rows = Transport::where('month_id', $month_id)->orderBy('nama', 'ASC')->get();

        $userNips = Users::pluck('nip')->toArray();
        
        foreach ($rows as $row) {
            $row->user_exists = in_array($row->nip_nik, $userNips);
            if ($row->user_exists) {
                $row->salam = "Yth. Bapak/Ibu " . addslashes($row->nama) . " \\nBerikut kami bagikan slip uang tranport bulan " . $month->month . " " . $month->year . ". Silakan klik tautan berikut untuk mengunduh/membuka file.\\nTerima kasih.\\n";
            } else {
                $row->salam = 'Pengguna tidak terdaftar';
            }
        }


        return view('transport/transportlist', ['rows' => $rows, 'month' => $month]);
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');
        try {
            Excel::import(new TransportImport($request->month_id), $file);
        } catch (\Exception $e) {
            $message = 'File yang diunggah tidak cocok!';
            return back()->with(['message' => $message]);
        }
        return redirect('/transport/data/' . $request->month_id);
    }

    public function remove($month_id)
    {
        Transport::where('month_id', '=', $month_id)->delete();
        return redirect('/transport/data/' . $month_id);
    }
}