<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\KeluargaPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PegawaiKKController extends Controller
{
    public function uploadFormKK($nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->firstOrFail();

        $sudahAdaKeluarga = KeluargaPegawai::where('nip', $nip)->exists();

        if ($sudahAdaKeluarga) {
            return redirect()->route('pegawai.keluarga.edit', $nip)
                ->with('info', 'Data keluarga sudah ada. Silakan edit data yang tersedia.');
        }

        return view('pegawai.datakk.uploadkk', [
            'row' => $pegawai,
            'action' => 'uploadkk'
        ]);
    }

    public function processUploadKK(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'pdf' => 'required|mimes:pdf|max:2048'
        ]);
        // dd($request->all());
        $pegawai = Pegawai::with('user')->where('nip', $request->input('nip'))->firstOrFail();

        $file = $request->file('pdf');
        $path = $file->store('temp');

        $text = \Spatie\PdfToText\Pdf::getText(storage_path('app/' . $path));

        $nama = $this->getValue($text, 'NAMA');
        $nip  = $this->getValue($text, 'NIP\/NRP');
        $tgl  = $this->getValue($text, 'TGL\. LAHIR');

        $section = strstr($text, 'C. DATA KELUARGA');
        $section = $section ? strstr($section, 'halaman', true) : '';

        $lines = array_values(array_filter(array_map('trim', explode("\n", $section))));

        $namaList = [];

        for ($i = 0; $i < count($lines); $i++) {
            if (preg_match('/^\d+$/', $lines[$i])) {
                $next = $lines[$i + 1] ?? null;

                if ($next && !in_array($next, ['-', 'Ya', 'Tidak'])) {
                    $namaList[] = $next;
                }
            }
        }

        $tanggalIndex = [];
        $tanggalList  = [];

        for ($i = 0; $i < count($lines); $i++) {
            if (preg_match('/\d{2}-\d{2}-\d{4}/', $lines[$i])) {
                $tanggalList[]  = $lines[$i];
                $tanggalIndex[] = $i;
            }
        }

        $hubunganList = [];

        foreach ($lines as $line) {
            if (in_array($line, ['Istri', 'Suami', 'Anak Kandung', 'Anak Angkat'])) {
                $hubunganList[] = $line;
            }
        }

        $tanggunganList = [];

        foreach ($lines as $line) {
            if (in_array($line, ['Ya', 'Tidak'])) {
                $tanggunganList[] = $line;
            }
        }

        $sekolahList = [];

        foreach ($tanggalIndex as $idx) {
            $sekolah = null;

            for ($j = $idx; $j < $idx + 10 && $j < count($lines); $j++) {
                $val = strtolower($lines[$j]);

                if (str_contains($val, 'kuliah')) {
                    $sekolah = 'Kuliah';
                    break;
                } elseif (str_contains($val, 'sma')) {
                    $sekolah = 'SMA';
                    break;
                } elseif (str_contains($val, 'smp')) {
                    $sekolah = 'SMP';
                    break;
                } elseif (str_contains($val, 'sd')) {
                    $sekolah = 'SD';
                    break;
                }
            }

            if (!$sekolah) {
                $sekolah = '-';
            }

            $sekolahList[] = $sekolah;
        }

        $count = min(count($namaList), count($tanggalList));

        $keluarga = [];

        for ($i = 0; $i < $count; $i++) {
            $keluarga[] = [
                'nama' => $namaList[$i],
                'tanggal_lahir' => $tanggalList[$i],
                'hubungan' => $hubunganList[$i] ?? null,
                'tanggungan' => $tanggunganList[$i] ?? null,
                'sekolah' => $sekolahList[$i] ?? null,
            ];
        }

        Storage::delete($path);

        return view('pegawai.datakk.previewkk', [
            'data' => [
                'pegawai' => $pegawai,
                'nama' => $nama,
                'nip' => $nip,
                'tanggal_lahir' => $tgl,
                'keluarga' => $keluarga
            ]
        ]);
    }

    private function getValue($text, $field)
    {
        preg_match('/' . $field . '\s*:\s*(.*)/', $text, $match);
        return trim($match[1] ?? '');
    }

    public function saveKK(Request $request)
    {
        $request->validate([
            'nip' => 'required|string',
            'keluarga' => 'required|array',
            'keluarga.*.nama' => 'required|string',
            'keluarga.*.tanggal_lahir' => 'nullable|string',
            'keluarga.*.hubungan' => 'nullable|string',
            'keluarga.*.tanggungan' => 'nullable|string',
            'keluarga.*.sekolah' => 'nullable|string',
        ]);

        $nip = $request->nip;
        $keluarga = $request->keluarga;

        $hubunganDisimpan = ['Suami', 'Istri', 'Anak Kandung', 'Anak Angkat'];

        KeluargaPegawai::where('nip', $nip)
            ->whereIn('hubungan', $hubunganDisimpan)
            ->delete();

        foreach ($keluarga as $item) {
            $hubungan = $item['hubungan'] ?? null;

            if (!in_array($hubungan, $hubunganDisimpan)) {
                continue;
            }

            $tanggalLahir = null;

            if (!empty($item['tanggal_lahir'])) {
                try {
                    $tanggalLahir = Carbon::createFromFormat('d-m-Y', $item['tanggal_lahir'])->format('Y-m-d');
                } catch (\Exception $e) {
                    $tanggalLahir = null;
                }
            }

            KeluargaPegawai::create([
                'nip' => $nip,
                'nama' => $item['nama'] ?? null,
                'tanggal_lahir' => $tanggalLahir,
                'hubungan' => $hubungan,
                'tanggungan' => $item['tanggungan'] ?? null,
                'sekolah' => $item['sekolah'] ?? null,
            ]);
        }

        return redirect()
            ->route('pegawai.index')
            ->with('success', 'Data keluarga berhasil disimpan.');
    }

    public function editKeluarga($nip)
    {
        $pegawai = Pegawai::where('nip', $nip)->firstOrFail();

        $keluarga = KeluargaPegawai::where('nip', $nip)
            ->orderByRaw("
                CASE
                    WHEN hubungan IN ('Suami', 'Istri') THEN 1
                    WHEN hubungan IN ('Anak Kandung', 'Anak Angkat') THEN 2
                    ELSE 3
                END
            ")
            ->orderBy('tanggal_lahir', 'asc')
            ->get();

        return view('pegawai.datakk.editkk', [
            'pegawai' => $pegawai,
            'keluarga' => $keluarga,
        ]);
    }

    public function updateKeluarga(Request $request, $nip)
    {
        $request->validate([
            'nip' => 'required|string',
            'keluarga' => 'nullable|array',
            'keluarga.*.id' => 'nullable|integer',
            'keluarga.*.nama' => 'nullable|string',
            'keluarga.*.tanggal_lahir' => 'nullable|string',
            'keluarga.*.hubungan' => 'nullable|string|in:Istri,Suami,Anak Kandung,Anak Angkat,Lainnya',
            'keluarga.*.tanggungan' => 'nullable|string|in:Ya,Tidak',
            'keluarga.*.sekolah' => 'nullable|string|in:-,Kuliah',
        ]);

        if ($request->nip !== $nip) {
            abort(403, 'NIP tidak valid.');
        }

        $pegawai = Pegawai::where('nip', $nip)->firstOrFail();

        $hubunganDisimpan = ['Suami', 'Istri', 'Anak Kandung', 'Anak Angkat', 'Lainnya'];
        $keluargaInput = $request->keluarga ?? [];

        DB::transaction(function () use ($nip, $pegawai, $keluargaInput, $hubunganDisimpan) {
            $existingIds = KeluargaPegawai::where('nip', $nip)->pluck('id')->toArray();
            $processedIds = [];

            foreach ($keluargaInput as $item) {
                $id = $item['id'] ?? null;
                $nama = trim($item['nama'] ?? '');
                $hubungan = $item['hubungan'] ?? null;

                if ($nama === '' || !in_array($hubungan, $hubunganDisimpan)) {
                    continue;
                }

                $tanggalLahir = null;
                if (!empty($item['tanggal_lahir'])) {
                    try {
                        $tanggalLahir = Carbon::createFromFormat('d-m-Y', $item['tanggal_lahir'])->format('Y-m-d');
                    } catch (\Exception $e) {
                        $tanggalLahir = null;
                    }
                }

                $data = [
                    'nip' => $nip,
                    'nama' => $nama,
                    'tanggal_lahir' => $tanggalLahir,
                    'hubungan' => $hubungan,
                    'tanggungan' => $item['tanggungan'] ?? null,
                    'sekolah' => $item['sekolah'] ?? null,
                ];

                if ($id) {
                    $keluarga = KeluargaPegawai::where('nip', $nip)->where('id', $id)->first();

                    if ($keluarga) {
                        $keluarga->update($data);
                        $processedIds[] = $keluarga->id;
                    }
                } else {
                    $keluargaBaru = KeluargaPegawai::create($data);
                    $processedIds[] = $keluargaBaru->id;
                }
            }

            $idsToDelete = array_diff($existingIds, $processedIds);

            if (!empty($idsToDelete)) {
                $keluargaYangDihapus = KeluargaPegawai::with('skk')
                    ->whereIn('id', $idsToDelete)
                    ->get();

                foreach ($keluargaYangDihapus as $kel) {
                    if ($kel->skk) {
                        $fullPath = storage_path('public/' . $kel->skk->file_skk);

                        if (!empty($kel->skk->file_skk) && file_exists($fullPath)) {
                            @unlink($fullPath);
                        }

                        $kel->skk->delete();
                    }

                    $kel->delete();
                }
            }
        });

        return redirect()
            ->route('pegawai.show', ['pegawai' => $pegawai->id])
            ->with('success', 'Data keluarga berhasil diperbarui.');
    }
}

