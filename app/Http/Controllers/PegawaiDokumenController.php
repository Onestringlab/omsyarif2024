<?php

namespace App\Http\Controllers;

use App\Models\DokumenPegawai;
use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PegawaiDokumenController extends Controller
{
    protected array $jenisDokumen = [
        'naik_pangkat' => [
            'label' => 'SK Pangkat',
            'view'  => 'pegawai.dokumen.upload',
        ],
        'kgb' => [
            'label' => 'SK KGB',
            'view'  => 'pegawai.dokumen.upload',
        ],
        'jabatan' => [
            'label' => 'SK Jabatan',
            'view'  => 'pegawai.dokumen.upload',
        ],
        'kp4' => [
            'label' => 'SK KP4',
            'view'  => 'pegawai.dokumen.upload',
        ],
        'rumah_dinas' => [
            'label' => 'SK Rumah Dinas',
            'view'  => 'pegawai.dokumen.upload',
        ],
        'cuti' => [
            'label' => 'SK Cuti',
            'view'  => 'pegawai.dokumen.upload',
        ],
        'hukuman_disiplin' => [
            'label' => 'SK Hukuman Disiplin',
            'view'  => 'pegawai.dokumen.upload',
        ],
        'lain_lain' => [
            'label' => 'Dokumen Lain-lain',
            'view'  => 'pegawai.dokumen.upload',
        ]
    ];

    public function createUpload(string $nip, string $jenis)
    {
        $pegawai = Pegawai::with('user')->where('nip', $nip)->firstOrFail();

        $this->authorizeSatker($pegawai);
        $this->validateJenis($jenis);

        $dokumen = DokumenPegawai::where('nip', $pegawai->nip)
            ->where('jenis_dokumen', $jenis)
            ->first();

        $label = $this->jenisDokumen[$jenis]['label'];

        return view('pegawai.dokumen.upload', compact('pegawai', 'jenis', 'label', 'dokumen'));
    }

    public function storeUpload(Request $request, string $nip, string $jenis)
    {
        $pegawai = Pegawai::with('user')->where('nip', $nip)->firstOrFail();

        $this->authorizeSatker($pegawai);
        $this->validateJenis($jenis);

        $user = User::where('nip', $pegawai->nip)
            ->where('satker', auth()->user()->satker)
            ->first();

        abort_if(!$user, 403, 'NIP tidak valid untuk satker ini.');

        $request->validate([
            'nomor_dokumen'   => 'required|string|max:100',
            'tanggal_dokumen' => 'required|date',
            'uraian'          => 'required|string|max:1000',
            'keterangan'      => 'nullable|string|max:1000',
            'file_dokumen'    => 'required|file|mimes:pdf|max:5120',
        ]);

        $dokumen = DokumenPegawai::where('nip', $pegawai->nip)
            ->where('jenis_dokumen', $jenis)
            ->first();

        if ($dokumen && $dokumen->path_file && Storage::disk('local')->exists($dokumen->path_file)) {
            Storage::disk('local')->delete($dokumen->path_file);
        }

        $file = $request->file('file_dokumen');
        $originalName = $file->getClientOriginalName();
        $fileName = $pegawai->nip . '_' . $jenis . '.pdf';

        $path = $file->storeAs('dokumen_pegawai/' . $pegawai->nip, $fileName, 'local');

        DokumenPegawai::updateOrCreate(
            [
                'nip' => $pegawai->nip,
                'jenis_dokumen' => $jenis,
            ],
            [
                'nomor_dokumen'   => $request->nomor_dokumen,
                'tanggal_dokumen' => $request->tanggal_dokumen,
                'uraian'          => $request->uraian,
                'keterangan'      => $request->keterangan,
                'nama_file'       => $originalName,
                'path_file'       => $path,
                'uploaded_by'     => auth()->user()->nip,
            ]
        );

        return redirect()
            ->route('pegawai.show', ['pegawai' => $pegawai->id])
            ->with('success', $this->jenisDokumen[$jenis]['label'] . ' berhasil diupload.');
    }

    public function download($id)
    {
        $dokumen = DokumenPegawai::findOrFail($id);

        $pegawai = Pegawai::where('nip', $dokumen->nip)->firstOrFail();
        $this->authorizeSatker($pegawai);

        if (!Storage::disk('local')->exists($dokumen->path_file)) {
            abort(404, 'File tidak ditemukan.');
        }

        $fullPath = storage_path('app/' . $dokumen->path_file);

        return response()->download($fullPath, $dokumen->nama_file);
    }

    public function destroy($id)
    {
        $dokumen = DokumenPegawai::findOrFail($id);

        $pegawai = Pegawai::where('nip', $dokumen->nip)->firstOrFail();
        $this->authorizeSatker($pegawai);

        if (Storage::disk('local')->exists($dokumen->path_file)) {
            Storage::disk('local')->delete($dokumen->path_file);
        }

        $dokumen->delete();

        return back()->with('success', 'Dokumen berhasil dihapus.');
    }

    protected function validateJenis(string $jenis): void
    {
        abort_unless(array_key_exists($jenis, $this->jenisDokumen), 404, 'Jenis dokumen tidak valid.');
    }

    protected function authorizeSatker(Pegawai $pegawai): void
    {
        if (!$pegawai->user || $pegawai->user->satker !== auth()->user()->satker) {
            abort(403, 'Anda tidak berhak mengakses pegawai ini.');
        }
    }

    public function editMetadata($id)
    {
        $dokumen = DokumenPegawai::findOrFail($id);

        $pegawai = Pegawai::with('user')->where('nip', $dokumen->nip)->firstOrFail();
        $this->authorizeSatker($pegawai);

        $label = $this->jenisDokumen[$dokumen->jenis_dokumen]['label'] ?? $dokumen->jenis_dokumen;

        return view('pegawai.dokumen.edit_metadata', compact('dokumen', 'pegawai', 'label'));
    }

    public function updateMetadata(Request $request, $id)
    {
        $dokumen = DokumenPegawai::findOrFail($id);

        $pegawai = Pegawai::with('user')->where('nip', $dokumen->nip)->firstOrFail();
        $this->authorizeSatker($pegawai);

        $request->validate([
            'nomor_dokumen'   => 'nullable|string|max:100',
            'tanggal_dokumen' => 'nullable|date',
            'uraian'      => 'nullable|string|max:1000',
            'keterangan'      => 'nullable|string|max:1000',
        ]);

        $dokumen->update([
            'nomor_dokumen'   => $request->nomor_dokumen,
            'tanggal_dokumen' => $request->tanggal_dokumen,
            'uraian'      => $request->uraian,
            'keterangan'      => $request->keterangan,
        ]);

        return redirect()
            ->route('pegawai.show', ['pegawai' => $pegawai->id])
            ->with('success', 'Metadata dokumen berhasil diperbarui.');
    }
}