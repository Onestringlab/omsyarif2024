<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Pegawai;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PegawaiImport implements ToModel, WithHeadingRow
{
    protected $satker;

    public function __construct($satker)
    {
        $this->satker = $satker;
    }

    public function model(array $row)
    {
        // if (empty($row['nip'])) {
        //     return null;
        // }

        $nip = trim($row['nip']);

        $user = User::where('nip', $nip)
            ->where('satker', $this->satker)
            ->first();

        if (!$user) {
            return null;
        }

        $pegawai = Pegawai::where('nip', $nip)->first();

        $data = [
            'nip'               => $nip,
            'nama'              => $row['nama'] ?? null,
            'jenis_kelamin'     => $row['jenis_kelamin'] ?? null,
            'golongan'          => $row['golongan'] ?? null,
            'nama_golongan'     => $row['nama_golongan'] ?? null,
            'jabatan'           => $row['jabatan'] ?? null,
            'kdsatker_induk'    => $row['kdsatker_induk'] ?? null,
            'kdsatker_bekerja'  => $row['kdsatker_bekerja'] ?? null,
            'kdsatker_bayar'    => $row['kdsatker_bayar'] ?? null,
            'kdanak'            => $row['kdanak'] ?? null,
            'kdkawin'           => $row['kdkawin'] ?? null,
            'kdduduk'           => $row['kdduduk'] ?? null,
            'kdgapok'           => $row['kdgapok'] ?? null,
            'pberas'            => $row['pberas'] ?? null,
            'kdhakim'           => $row['kdhakim'] ?? null,
            'kdpapua'           => $row['kdpapua'] ?? null,
            'kdpencil'          => $row['kdpencil'] ?? null,
            'tahungapok'        => $row['tahungapok'] ?? null,
            'kdbpjs2'           => $row['kdbpjs2'] ?? null,
            'bulanakhir'        => $row['bulanakhir'] ?? null,
            'tahunakhir'        => $row['tahunakhir'] ?? null,
            'kdjab'             => $row['kdjab'] ?? null,
            'jablain'           => $row['jablain'] ?? null,
            'tumum'             => $row['tumum'] ?? null,
            'sewarumah'         => $row['sewarumah'] ?? null,
        ];

        if ($pegawai) {
            $pegawai->update($data);
            return null;
        }

        return new Pegawai($data);
    }
}