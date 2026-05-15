{{-- pegawai/_detail_readonly.blade.php --}}

@php
    $jenisKelaminLabel = match (strtoupper(trim($pegawai->jenis_kelamin ?? ''))) {
        'L' => 'Pria',
        'P' => 'Wanita',
        default => $pegawai->jenis_kelamin ?? '-',
    };
    $kdduduk = trim($pegawai->kdduduk ?? '');
    $kddudukLabel = match ($kdduduk) {
        '01' => 'Aktif',
        '02' => 'Belajar DN (Bujang-Keluarga)',
        '03' => 'Pensiun/Berhenti',
        '04' => 'Meninggal',
        '05' => 'Pindah',
        '06' => 'Hukuman Disiplin',
        default => $kdduduk ? '••' . substr($kdduduk, -2) : '-',
    };

    $kdkawin = trim($pegawai->kdkawin ?? '');
    $kdkawinLabel = match ($kdkawin) {
        '1000' => '1000 - Tidak kawin atau ditanggung oleh suami/istri PNS',
        '1001' => '1001 - Janda/duda atau suami/istri tidak tertanggung dengan 1 anak',
        '1002' => '1002 - Janda/duda atau suami/istri tidak tertanggung dengan 2 anak',
        '1003' => '1003 - Janda/duda atau suami/istri tidak tertanggung dengan 3 anak',
        '1100' => '1100 - Kawin tanpa anak',
        '1101' => '1101 - Kawin dengan 1 anak',
        '1102' => '1102 - Kawin dengan 2 anak',
        '1103' => '1103 - Kawin dengan 3 anak',
        default => $kdkawin ?: '-',
    };

    $kdgapok = trim($pegawai->kdgapok ?? '');
    $kdgapokYears = null;
    if ($kdgapok === '3B04') {
        $kdgapokYears = 5;
    } elseif (preg_match('/(\d{2})$/', $kdgapok, $matches)) {
        $kdgapokYears = intval($matches[1]);
    }
    $kdgapokLabel = $kdgapokYears !== null
        ? $kdgapokYears . ' Tahun'
        : ($kdgapok ? '••' . substr($kdgapok, -2) : '-');

    $pberas = trim((string) ($pegawai->pberas ?? ''));
    $pberasLabel = match ($pberas) {
        '1' => 'Uang',
        '2' => 'Natura',
        default => $pberas !== '' ? $pberas : '-',
    };

    $kdhakim = trim((string) ($pegawai->kdhakim ?? ''));
    $kdhakimLabel = match ($kdhakim) {
        '1' => 'Ya',
        '2' => 'Tidak',
        default => $kdhakim !== '' ? $kdhakim : '-',
    };

    $kdpapua = trim((string) ($pegawai->kdpapua ?? ''));
    $kdpapuaLabel = match ($kdpapua) {
        '1' => 'Ya',
        '2' => 'Tidak',
        default => $kdpapua !== '' ? $kdpapua : '-',
    };

    $kdpencil = trim((string) ($pegawai->kdpencil ?? ''));
    $kdpencilLabel = match ($kdpencil) {
        '1' => 'Ya',
        '2' => 'Tidak',
        default => $kdpencil !== '' ? $kdpencil : '-',
    };

    $jablain = trim($pegawai->jablain ?? '');
    $jablainLabel = match ($jablain) {
        '31101' => '31101 - Tunjangan Kemahalan Hakim Zona 1',
        '31102' => '31102 - Tunjangan Kemahalan Hakim Zona 2',
        '31103' => '31103 - Tunjangan Kemahalan Hakim Zona 3',
        '31104' => '31104 - Tunjangan Kemahalan Hakim Zona 3 Khusus',
        default => $jablain !== '' ? $jablain : '-',
    };

    $tumum = trim((string) ($pegawai->tumum ?? ''));
    $tumum = $tumum !== '' ? substr($tumum, 0, 1) : '';
    $tumumLabel = match ($tumum) {
        '1' => 'Ya',
        '2' => 'Tidak',
        default => $tumum !== '' ? $tumum : '-',
    };
@endphp

<div class="row mb-3">
    <div class="col-md-6">
        <table class="table table-borderless mb-0">
            <tr><th style="width:250px">NIP</th><td>{{ $pegawai->nip }}</td></tr>
            <tr><th>Nama</th><td>{{ $pegawai->nama }}</td></tr>
            <tr><th>Jenis Kelamin</th><td>{{ $jenisKelaminLabel }}</td></tr>
            <tr><th>Golongan/Ruang</th><td>{{ $pegawai->golongan ?? '-' }}</td></tr>
            <tr><th>Pangkat</th><td>{{ $pegawai->nama_golongan ?? '-' }}</td></tr>
            <tr><th>Jabatan</th><td>{{ $pegawai->jabatan }}</td></tr>
            <tr><th>Satker Induk</th><td>{{ $pegawai->kdsatker_induk ?? '-' }}</td></tr>
            <tr><th>Satker Bekerja</th><td>{{ $pegawai->kdsatker_bekerja ?? '-' }}</td></tr>
            <tr><th>Satker Bayar</th><td>{{ $pegawai->kdsatker_bayar ?? '-' }}</td></tr>
            <tr><th>Anak Satker</th><td>{{ $pegawai->kdanak ?? '-' }}</td></tr>
            <tr><th>Kedudukan</th><td>{{ $kddudukLabel }}</td></tr>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-borderless mb-0">
            <tr><th style="width:250px">Perhitungan Masa Kerja</th><td>{{ $kdgapokLabel }}</td></tr>
            <tr><th>Status Keluarga</th><td>{{ $kdkawinLabel }}</td></tr>
            <tr><th>Tunjangan Beras</th><td>{{ $pberasLabel }}</td></tr>
            <tr><th>Sebagai Hakim</th><td>{{ $kdhakimLabel }}</td></tr>
            <tr><th>Tunjangan Papua</th><td>{{ $kdpapuaLabel }}</td></tr>
            <tr><th>Tunjangan Daerah Terpencil</th><td>{{ $kdpencilLabel }}</td></tr>
            <tr><th>Tahun PP Gaji Pokok</th><td>{{ $pegawai->tahungapok }}</td></tr>
            <tr><th>BPJS Keluarga Lain</th><td>{{ $pegawai->kdbpjs2 }}</td></tr>
            <tr><th>Tunjangan Jabatan</th><td>{{ $pegawai->kdjab }}</td></tr>
            <tr><th>Tunjangan Lain</th><td>{{ $jablainLabel }}</td></tr>
            <tr><th>Tunjangan Umum</th><td>{{ $tumumLabel }}</td></tr>
            <tr><th>Tarif Sewa Rumah Dinas</th><td>{{ number_format($pegawai->sewarumah, 0, ',', '.') }}</td></tr>

        </table>
    </div>
</div>