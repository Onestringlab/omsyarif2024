{{-- pegawai/_detail_readonly.blade.php --}}

<div class="row mb-3">
    <div class="col-md-6">
        <table class="table table-borderless mb-0">
            <tr><th style="width:160px">NIP</th><td>{{ $pegawai->nip }}</td></tr>
            <tr><th>Nama</th><td>{{ $pegawai->nama }}</td></tr>
            <tr><th>Tanggal Lahir</th><td>{{ $pegawai->tgl_lhr ? $pegawai->tgl_lhr->format('d-m-Y') : '' }}</td></tr>
            <tr><th>Umur</th><td>{{ $pegawai->tgl_lhr ? $pegawai->tgl_lhr->age . ' th' : '' }}</td></tr>
            <tr><th>Jenis Kelamin</th><td>{{ $pegawai->jenis_kelamin }}</td></tr>
            <tr><th>Golongan/Ruang</th><td>{{ $pegawai->golongan }}</td></tr>
            <tr><th>Pangkat</th><td>{{ $pegawai->nama_golongan }}</td></tr>
            <tr><th>Jabatan</th><td>{{ $pegawai->jabatan }}</td></tr>
            <tr><th>Kd Satker Induk</th><td>{{ $pegawai->kdsatker_induk }}</td></tr>
            <tr><th>Kd Satker Bekerja</th><td>{{ $pegawai->kdsatker_bekerja }}</td></tr>
            <tr><th>Kd Satker Bayar</th><td>{{ $pegawai->kdsatker_bayar }}</td></tr>
            <tr><th>Kd Anak</th><td>{{ $pegawai->kdanak }}</td></tr>
            <tr><th>Kd Duduk</th><td>{{ $pegawai->kdduduk }}</td></tr>
        </table>
    </div>
    <div class="col-md-6">
        <table class="table table-borderless mb-0">
            <tr><th>Kd Gapok</th><td>{{ $pegawai->kdgapok }}</td></tr>
            <tr><th>Kd Kawin</th><td>{{ $pegawai->kdkawin }}</td></tr>
            <tr><th>Pberas</th><td>{{ $pegawai->pberas }}</td></tr>
            <tr><th>Kd Hakim</th><td>{{ $pegawai->kdhakim }}</td></tr>
            <tr><th>Kd Papua</th><td>{{ $pegawai->kdpapua }}</td></tr>
            <tr><th>Kd Pencil</th><td>{{ $pegawai->kdpencil }}</td></tr>
            <tr><th>Tahun Gapok</th><td>{{ $pegawai->tahungapok }}</td></tr>
            <tr><th>Kd BPJS2</th><td>{{ $pegawai->kdbpjs2 }}</td></tr>
            <tr><th>Kd Jabatan</th><td>{{ $pegawai->kdjab }}</td></tr>
            <tr><th>Jab Lain</th><td>{{ $pegawai->jablain }}</td></tr>
            <tr><th>Tunjangan Umum</th><td>{{ number_format($pegawai->tumum, 0, ',', '.') }}</td></tr>
            <tr><th>Sewa Rumah</th><td>{{ number_format($pegawai->sewarumah, 0, ',', '.') }}</td></tr>

        </table>
    </div>
</div>