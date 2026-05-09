<?php

namespace App\Http\Controllers;

use App\Models\SKK;
use App\Models\Pegawai;
use App\Models\KeluargaPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SKKController extends Controller
{
    public function create($keluargaPegawaiId)
    {
        $keluarga = KeluargaPegawai::findOrFail($keluargaPegawaiId);
        $pegawai = Pegawai::where('nip', $keluarga->nip)->firstOrFail();
        $this->authorizeSatker($pegawai);

        if (strtolower(trim($keluarga->sekolah ?? '')) !== 'kuliah') {
            abort(403, 'SKK hanya untuk anggota keluarga dengan status Kuliah.');
        }

        $skk = SKK::where('keluarga_pegawai_id', $keluarga->id)->latest()->first();
        return view('skk.create', compact('keluarga', 'skk', 'pegawai'));
    }

    public function store(Request $request, $keluargaPegawaiId)
    {
        $keluarga = KeluargaPegawai::findOrFail($keluargaPegawaiId);

        $pegawai = Pegawai::where('nip', $keluarga->nip)->firstOrFail();
        $this->authorizeSatker($pegawai);

        if (strtolower(trim($keluarga->sekolah ?? '')) !== 'kuliah') {
            abort(403, 'SKK hanya untuk anggota keluarga dengan status Kuliah.');
        }

        $validated = $request->validate([
            'nomor_surat'      => ['nullable', 'string', 'max:255'],
            'tanggal_surat'    => ['nullable', 'date'],
            'tanggal_berakhir' => ['required', 'date'],
            'file_skk'         => ['required', 'file', 'mimes:pdf', 'max:2048'],
        ]);

        $skkLama = SKK::where('keluarga_pegawai_id', $keluarga->id)->first();

        $file = $request->file('file_skk');
        $filename = 'skk_' . $keluarga->id . '_' . time() . '_' . Str::random(6) . '.pdf';
        $filePath = $file->storeAs('skk', $filename, 'local');

        if ($skkLama && $skkLama->file_skk && Storage::disk('local')->exists($skkLama->file_skk)) {
            Storage::disk('local')->delete($skkLama->file_skk);
        }

        SKK::updateOrCreate(
            ['keluarga_pegawai_id' => $keluarga->id],
            [
                'nomor_surat'      => $validated['nomor_surat'] ?? null,
                'tanggal_surat'    => $validated['tanggal_surat'] ?? null,
                'tanggal_berakhir' => $validated['tanggal_berakhir'],
                'file_skk'         => $filePath,
            ]
        );

        return redirect()
            ->route('pegawai.show', $pegawai->id)
            ->with('success', 'Data SKK berhasil disimpan.');
    }

    public function download($id)
    {
        $skk = SKK::findOrFail($id);
        $keluarga = KeluargaPegawai::findOrFail($skk->keluarga_pegawai_id);

        if (!Storage::disk('local')->exists($skk->file_skk)) {
            abort(404, 'File SKK tidak ditemukan.');
            }
            
        $fullPath = storage_path('app/' . $skk->file_skk);
        $downloadName = 'SKK_' . str_replace(' ', '_', $keluarga->nama) . '.pdf';
        return response()->download($fullPath, $downloadName);
    }

    public function edit($id)
    {
        $skk = SKK::findOrFail($id);
        $keluarga = KeluargaPegawai::findOrFail($skk->keluarga_pegawai_id);
        $pegawai = Pegawai::where('nip', $keluarga->nip)->firstOrFail();
        $this->authorizeSatker($pegawai);

        return view('skk.edit', compact('skk', 'keluarga', 'pegawai'));
    }

    public function update(Request $request, $id)
    {
        $skk = SKK::findOrFail($id);
        $keluarga = KeluargaPegawai::findOrFail($skk->keluarga_pegawai_id);
        $pegawai = Pegawai::where('nip', $keluarga->nip)->firstOrFail();
        $this->authorizeSatker($pegawai);

        $validated = $request->validate([
            'nomor_surat'      => ['nullable', 'string', 'max:255'],
            'tanggal_surat'    => ['nullable', 'date'],
            'tanggal_berakhir' => ['required', 'date'],
        ]);

        $skk->update([
            'nomor_surat'      => $validated['nomor_surat'] ?? null,
            'tanggal_surat'    => $validated['tanggal_surat'] ?? null,
            'tanggal_berakhir' => $validated['tanggal_berakhir'],
        ]);

        return redirect()
            ->route('pegawai.show', $pegawai->id)
            ->with('success', 'Metadata SKK berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $skk = SKK::findOrFail($id);

        if ($skk->file_skk && Storage::disk('local')->exists($skk->file_skk)) {
            Storage::disk('local')->delete($skk->file_skk);
        }

        $skk->delete();

        return back()->with('success', 'Data SKK berhasil dihapus.');
    }

    public function narasi($id)
    {
        $skk = SKK::with('keluargaPegawai')->findOrFail($id);
        $keluarga = $skk->keluargaPegawai;

        $pegawai = \App\Models\Pegawai::where('nip', $keluarga->nip)->first();

        if (!$pegawai) {
            return back()->with('error', 'Data pegawai tidak ditemukan.');
        }

        $tanggalBerakhir = Carbon::parse($skk->tanggal_berakhir)->translatedFormat('d F Y');

        $narasi = "Yth. Bapak/Ibu {$pegawai->nama},\n"
            . "Sehubungan dengan Surat Keterangan Kuliah atas nama anak Bapak/Ibu, {$keluarga->nama}, "
            . "yang masa berlakunya akan berakhir pada tanggal {$tanggalBerakhir}, kami sampaikan bahwa apabila "
            . "yang bersangkutan belum berusia 26 tahun dan masih menjadi tanggungan karena sedang menempuh pendidikan, "
            . "mohon kiranya Bapak/Ibu dapat mengirimkan Surat Keterangan Kuliah yang terbaru kepada kami.\n\n"
            . "Demikian disampaikan. Atas perhatian dan kerja samanya, kami ucapkan terima kasih.";

        return view('skk.narasi', compact('skk', 'keluarga', 'pegawai', 'narasi'));
    }

    private function authorizeSatker($pegawai)
    {
        if (!$pegawai->user || $pegawai->user->satker !== auth()->user()->satker) {
            abort(403, 'Anda tidak berhak mengakses data pegawai ini.');
        }
    }
}