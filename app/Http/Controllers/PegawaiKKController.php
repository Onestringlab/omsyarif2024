<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\KeluargaPegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;

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

    $pegawai = Pegawai::with('user')
        ->where('nip', $request->input('nip'))
        ->firstOrFail();

    $file = $request->file('pdf');
    $path = $file->store('temp');
    $fullPath = storage_path('app/' . $path);

    $parser = new Parser();
    $pdf = $parser->parseFile($fullPath);
    $text = $pdf->getText();

    $text = str_replace(["\r\n", "\r", "\t"], "\n", $text);
    $text = preg_replace('/[ ]{2,}/', ' ', $text);
    $text = preg_replace('/[ ]*\n[ ]*/', "\n", $text);
    $text = trim($text);

    $normalize = function ($value) {
        $value = trim($value);
        $value = preg_replace('/\s+/', ' ', $value);
        return $value;
    };

    $nama = null;
    $nip = null;
    $tgl = null;

    if (preg_match('/NAMA\s*:\s*(.+?)\s+GOLONGAN/s', $text, $m)) {
        $nama = $normalize($m[1]);
    }

    if (preg_match('/NIP\/NRP\s*:\s*([0-9]+)/', $text, $m)) {
        $nip = trim($m[1]);
    }

    if (preg_match('/TGL\.\s*LAHIR\s*:\s*([0-9]{2}-[0-9]{2}-[0-9]{4})/', $text, $m)) {
        $tgl = trim($m[1]);
    }

    $section = '';
    if (preg_match('/C\.\s*DATA\s*KELUARGA(.*?)(?:halaman\s*\d+\s*dari\s*\d+|$)/si', $text, $m)) {
        $section = trim($m[1]);
    }

    $section = str_replace(["\r\n", "\r", "\t"], "\n", $section);
    $section = preg_replace('/[ ]{2,}/', ' ', $section);
    $section = preg_replace('/[ ]*\n[ ]*/', "\n", $section);
    $section = trim($section);

    $lines = array_values(array_filter(array_map(function ($line) use ($normalize) {
        return $normalize($line);
    }, preg_split('/\n+/', $section))));

    $lines = array_values(array_filter($lines, function ($line) {
        return !in_array($line, [
            'NO',
            'NAMA',
            'TANGGAL LAHIR HUBUNGAN KELUARGA',
            'TANGGAL LAHIR',
            'HUBUNGAN KELUARGA',
            'AYAH',
            'IBU',
            'PEKERJAAN',
            'SEKOLAH',
            'NAMA KETERANGAN',
            '[ ◀]()',
            '[ ▶]()',
        ]);
    }));

    $joined = implode(' | ', $lines);
    $joined = preg_replace('/\s*\[\s*◀\s*\]\(\)\s*/u', ' ', $joined);
    $joined = preg_replace('/\s*\[\s*▶\s*\]\(\)\s*/u', ' ', $joined);
    $joined = preg_replace('/\s+/', ' ', $joined);
    $joined = trim($joined);

   $families = [];

preg_match_all('/(?:^|\s)(\d+)\s+(.*?)(?=(?:\s\d+\s+)|$)/s', $joined, $matches, PREG_SET_ORDER);

foreach ($matches as $match) {
    $chunk = trim($match[2]);
    $chunk = preg_replace('/\s+/', ' ', $chunk);
    $chunk = trim($chunk);

    $tanggal = null;
    $namaKeluarga = null;
    $sisa = $chunk;

    if (preg_match('/^(.*?)\s+(\d{2}-\d{2}-\d{4})\s+(.*)$/s', $chunk, $parts)) {
        $namaKeluarga = trim($parts[1]);
        $tanggal = trim($parts[2]);
        $sisa = trim($parts[3]);
    } else {
        continue;
    }

    $hubungan = null;
    foreach (['Anak Kandung', 'Anak Angkat', 'Istri', 'Suami'] as $h) {
        if (stripos($sisa, $h) !== false) {
            $hubungan = $h;
            $sisa = preg_replace('/' . preg_quote($h, '/') . '/i', '', $sisa, 1);
            $sisa = trim($sisa);
            break;
        }
    }

    $tanggungan = null;
    foreach (['Tidak', 'Ya'] as $t) {
        if (preg_match('/\b' . preg_quote($t, '/') . '\b/i', $sisa)) {
            $tanggungan = $t;
            break;
        }
    }

    $sekolah = '-';
    if (preg_match('/\b(Kuliah|SMA|SMP|SD)\b/i', $sisa, $sm)) {
        $sekolah = strtoupper($sm[1]) === 'KULIAH' ? 'Kuliah' : strtoupper($sm[1]);
    }

    if ($namaKeluarga === '' || !$tanggal) {
        continue;
    }

    $namaKeluarga = str_replace('|', '', $namaKeluarga);
    $namaKeluarga = preg_replace('/\s+/', ' ', $namaKeluarga);
    $namaKeluarga = trim($namaKeluarga, " -");

    $families[] = [
        'nama' => $namaKeluarga,
        'tanggal_lahir' => $tanggal,
        'hubungan' => $hubungan,
        'tanggungan' => $tanggungan,
        'sekolah' => $sekolah,
    ];
}

    Storage::delete($path);

    return view('pegawai.datakk.previewkk', [
        'data' => [
            'pegawai' => $pegawai,
            'nama' => $nama,
            'nip' => $nip,
            'tanggal_lahir' => $tgl,
            'keluarga' => $families
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

                        if (!empty($kel->skk->file_skk) && Storage::disk('local')->exists($kel->skk->file_skk)) {
                            Storage::disk('local')->delete($kel->skk->file_skk);
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

