<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pegawai;
use App\Models\DokumenPegawai;
use Illuminate\Http\Request;
use App\Imports\PegawaiImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    public function index()
    {
        $rows = Pegawai::with('user')
            ->whereHas('user', function ($q) {
                $q->where('satker', auth()->user()->satker);
            })
            ->orderBy('nama', 'asc')
            ->get();

        return view('pegawai.index', compact('rows'));
    }

    public function create()
    {
        return view('pegawai.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|max:191|unique:pegawai,nip',
            'kdsatker_induk' => 'nullable|string|max:50',
            'kdsatker_bekerja' => 'nullable|string|max:50',
            'kdsatker_bayar' => 'nullable|string|max:50',
            'kdanak' => 'nullable|string|max:10',
            'nama' => 'required|string|max:191',
            'jenis_kelamin' => 'nullable|string|max:10',
            'golongan' => 'nullable|string|max:20',
            'nama_golongan' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:255',
            'kdduduk' => 'nullable|string|max:20',
            'kdgapok' => 'nullable|string|max:20',
            'kdkawin' => 'nullable|string|max:20',
            'pberas' => 'nullable|integer',
            'kdhakim' => 'nullable|integer',
            'kdpapua' => 'nullable|integer',
            'kdpencil' => 'nullable|integer',
            'tahungapok' => 'nullable|string|max:10',
            'kdbpjs2' => 'nullable|string|max:20',
            'bulanakhir' => 'nullable|string|max:20',
            'tahunakhir' => 'nullable|string|max:20',
            'kdjab' => 'nullable|string|max:20',
            'jablain' => 'nullable|string|max:20',
            'tumum' => 'nullable|numeric',
            'sewarumah' => 'nullable|numeric',
        ]);

        $userPegawai = User::where('nip', $request->nip)
            ->where('satker', auth()->user()->satker)
            ->first();

        if (!$userPegawai) {
            return back()
                ->withInput()
                ->with('error', 'NIP tidak ditemukan pada data pengguna atau tidak sesuai satuan kerja admin login.');
        }

        Pegawai::create($request->only([
            'nip',
            'kdsatker_induk',
            'kdsatker_bekerja',
            'kdsatker_bayar',
            'kdanak',
            'nama',
            'jenis_kelamin',
            'golongan',
            'nama_golongan',
            'jabatan',
            'kdduduk',
            'kdgapok',
            'kdkawin',
            'pberas',
            'kdhakim',
            'kdpapua',
            'kdpencil',
            'tahungapok',
            'kdbpjs2',
            'bulanakhir',
            'tahunakhir',
            'kdjab',
            'jablain',
            'tumum',
            'sewarumah',
        ]));

        return redirect()
            ->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    public function show(Pegawai $pegawai)
    {
        if (!$pegawai->user || $pegawai->user->satker !== auth()->user()->satker) {
            abort(403, 'Anda tidak berhak melihat data pegawai ini.');
        }

        return view('pegawai.show', compact('pegawai'));
    }

    public function edit(Pegawai $pegawai)
    {
        if (!$pegawai->user || $pegawai->user->satker !== auth()->user()->satker) {
            abort(403, 'Anda tidak berhak mengubah data pegawai ini.');
        }

        return view('pegawai.edit', compact('pegawai'));
    }

    public function update(Request $request, Pegawai $pegawai)
    {
        if (!$pegawai->user || $pegawai->user->satker !== auth()->user()->satker) {
            abort(403, 'Anda tidak berhak mengubah data pegawai ini.');
        }

        $request->validate([
            'kdsatker_induk' => 'nullable|string|max:50',
            'kdsatker_bekerja' => 'nullable|string|max:50',
            'kdsatker_bayar' => 'nullable|string|max:50',
            'kdanak' => 'nullable|string|max:10',
            'nama' => 'required|string|max:191',
            'jenis_kelamin' => 'nullable|string|max:10',
            'golongan' => 'nullable|string|max:20',
            'nama_golongan' => 'nullable|string|max:100',
            'jabatan' => 'nullable|string|max:255',
            'kdduduk' => 'nullable|string|max:20',
            'kdgapok' => 'nullable|string|max:20',
            'kdkawin' => 'nullable|string|max:20',
            'pberas' => 'nullable|integer',
            'kdhakim' => 'nullable|integer',
            'kdpapua' => 'nullable|integer',
            'kdpencil' => 'nullable|integer',
            'tahungapok' => 'nullable|string|max:10',
            'kdbpjs2' => 'nullable|string|max:20',
            'bulanakhir' => 'nullable|string|max:20',
            'tahunakhir' => 'nullable|string|max:20',
            'kdjab' => 'nullable|string|max:20',
            'jablain' => 'nullable|string|max:20',
            'tumum' => 'nullable|numeric',
            'sewarumah' => 'nullable|numeric',
        ]);

        $pegawai->update($request->only([
            'kdsatker_induk',
            'kdsatker_bekerja',
            'kdsatker_bayar',
            'kdanak',
            'nama',
            'jenis_kelamin',
            'golongan',
            'nama_golongan',
            'jabatan',
            'kdduduk',
            'kdgapok',
            'kdkawin',
            'pberas',
            'kdhakim',
            'kdpapua',
            'kdpencil',
            'tahungapok',
            'kdbpjs2',
            'bulanakhir',
            'tahunakhir',
            'kdjab',
            'jablain',
            'tumum',
            'sewarumah',
        ]));

        return redirect()
            ->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diperbarui.');
    }

    public function destroy(Pegawai $pegawai)
    {
        $pegawai->load(['user', 'dokumen']);

        if (!$pegawai->user || $pegawai->user->satker !== auth()->user()->satker) {
            abort(403, 'Anda tidak berhak menghapus pegawai ini.');
        }

        DB::transaction(function () use ($pegawai) {
            foreach ($pegawai->dokumen as $dokumen) {
                if (!empty($dokumen->path_file) && Storage::disk('local')->exists($dokumen->path_file)) {
                    Storage::disk('local')->delete($dokumen->path_file);
                }

                $dokumen->delete();
            }

            $folderPath = 'dokumen_pegawai/' . $pegawai->nip;
            if (Storage::disk('local')->exists($folderPath)) {
                Storage::disk('local')->deleteDirectory($folderPath);
            }

            $pegawai->delete();
        });

        return redirect()
            ->route('pegawai.index')
            ->with('success', 'Data pegawai beserta dokumen berhasil dihapus.');
    }

    public function confirmDelete(Pegawai $pegawai)
    {        
        if (!$pegawai->user || $pegawai->user->satker !== auth()->user()->satker) {
            abort(403, 'Anda tidak berhak menghapus data pegawai ini.');
        }

        return view('pegawai.confirm_delete', compact('pegawai'));
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');

        try {
            Excel::import(new PegawaiImport(auth()->user()->satker), $file);
        } catch (\Exception $e) {
            $message = 'File yang diunggah tidak cocok atau gagal diproses!';
            return back()->with(['error' => $message]);
        }

        return redirect()
            ->route('pegawai.index')
            ->with('success', 'Data pegawai berhasil diimport.');
    }

    public function profilSaya()
    {
        $user = auth()->user();

        $pegawai = Pegawai::with(['user', 'dokumen'])
            ->where('nip', $user->nip)
            ->firstOrFail();

        return view('pegawai.profil_saya', compact('pegawai'));
    }

    public function downloadDokumenSaya($id)
    {
        $dokumen = DokumenPegawai::findOrFail($id);

        abort_unless(
            $dokumen->nip === auth()->user()->nip,
            403,
            'Anda tidak berhak mengakses dokumen ini.'
        );

        if (!Storage::disk('local')->exists($dokumen->path_file)) {
            abort(404, 'File tidak ditemukan.');
        }

        $fullPath = storage_path('app/' . $dokumen->path_file);

        return response()->download($fullPath, $dokumen->nama_file);
    }

}