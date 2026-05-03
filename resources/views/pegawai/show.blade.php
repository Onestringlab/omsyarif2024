@extends('layouts.app')

@section('title')
Detail Pegawai
@endsection

@section('content')
<div class="container">
    {{-- Breadcrumb --}}
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Data Pegawai</a></li>
            <li class="breadcrumb-item">{{ $pegawai->nama }}</a></li>
        </ol>
    </nav>

    <div class="card border-success">
        <h5 class="card-header text-bg-success">Detail Pegawai</h5>
        <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
        @endif

        {{-- IDENTITAS & DATA PEGAWAI (semua field seperti form edit) --}}
        <h5 class="mb-3">Data Pegawai</h5>

        <div class="row mb-3">
            <div class="col-md-6">
            <table class="table table-borderless mb-0">
                <tr>
                <th style="width:160px">NIP</th>
                <td>{{ $pegawai->nip }}</td>
                </tr>
                <tr>
                <th>Nama</th>
                <td>{{ $pegawai->nama }}</td>
                </tr>
                <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $pegawai->jenis_kelamin }}</td>
                </tr>
                <tr>
                <th>Golongan</th>
                <td>{{ $pegawai->golongan }} {{ $pegawai->nama_golongan }}</td>
                </tr>
                <tr>
                <th>Jabatan</th>
                <td>{{ $pegawai->jabatan }}</td>
                </tr>
                <tr>
                <th>Kd Satker Induk</th>
                <td>{{ $pegawai->kdsatker_induk }}</td>
                </tr>
                <tr>
                <th>Kd Satker Bekerja</th>
                <td>{{ $pegawai->kdsatker_bekerja }}</td>
                </tr>
                <tr>
                <th>Kd Satker Bayar</th>
                <td>{{ $pegawai->kdsatker_bayar }}</td>
                </tr>
            </table>
            </div>

            <div class="col-md-6">
            <table class="table table-borderless mb-0">
                <tr>
                <th style="width:160px">Kd Anak</th>
                <td>{{ $pegawai->kdanak }}</td>
                </tr>
                <tr>
                <th>Kd Kawin</th>
                <td>{{ $pegawai->kdkawin }}</td>
                </tr>
                <tr>
                <th>Kd Duduk</th>
                <td>{{ $pegawai->kdduduk }}</td>
                </tr>
                <tr>
                <th>Kd Gapok</th>
                <td>{{ $pegawai->kdgapok }}</td>
                </tr>
                <tr>
                <th>Pberas</th>
                <td>{{ $pegawai->pberas }}</td>
                </tr>
                <tr>
                <th>Kd Hakim</th>
                <td>{{ $pegawai->kdhakim }}</td>
                </tr>
                <tr>
                <th>Kd Papua</th>
                <td>{{ $pegawai->kdpapua }}</td>
                </tr>
                <tr>
                <th>Kd Pencil</th>
                <td>{{ $pegawai->kdpencil }}</td>
                </tr>
            </table>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-md-6">
            <table class="table table-borderless mb-0">
                <tr>
                <th style="width:160px">Tahun Gapok</th>
                <td>{{ $pegawai->tahungapok }}</td>
                </tr>
                <tr>
                <th>Kd BPJS2</th>
                <td>{{ $pegawai->kdbpjs2 }}</td>
                </tr>
                <tr>
                <th>Bulan Akhir</th>
                <td>{{ $pegawai->bulanakhir }}</td>
                </tr>
                <tr>
                <th>Tahun Akhir</th>
                <td>{{ $pegawai->tahunakhir }}</td>
                </tr>
            </table>
            </div>

            <div class="col-md-6">
            <table class="table table-borderless mb-0">
                <tr>
                <th style="width:160px">Kd Jabatan</th>
                <td>{{ $pegawai->kdjab }}</td>
                </tr>
                <tr>
                <th>Jab Lain</th>
                <td>{{ $pegawai->jablain }}</td>
                </tr>
                <tr>
                <th>Tunjangan Umum</th>
                <td>{{ number_format($pegawai->tumum, 0, ',', '.') }}</td>
                </tr>
                <tr>
                <th>Sewa Rumah</th>
                <td>{{ number_format($pegawai->sewarumah, 0, ',', '.') }}</td>
                </tr>
            </table>
            </div>
        </div>

        <hr class="my-4">

        <h5 class="mb-3">Dokumen Pegawai</h5>

        @php
            $jenisDokumen = [
                'naik_pangkat' => 'SK Kenaikan Pangkat',
                'kgb' => 'SK KGB',
                'jabatan' => 'SK Jabatan',
                'kp4' => 'SK KP4',
                'rumah_dinas' => 'SK Rumah Dinas',
            ];

            $dokumenByJenis = $pegawai->dokumen->keyBy('jenis_dokumen');
        @endphp

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th style="width:60px">No</th>
                        <th style="width:120px">Tanggal</th>
                        <th style="width:250px">Nomor</th>
                        <th style="width:250px">Dokumen</th>
                        <th>Keterangan</th>
                        <th class="text-center" style="width:220px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jenisDokumen as $key => $label)
                        @php
                            $dok = $dokumenByJenis->get($key);
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}.</td>
                            <td>
                                {{ $dok?->tanggal_dokumen ? \Carbon\Carbon::parse($dok->tanggal_dokumen)->format('d-m-Y') : '-' }}
                            </td>
                            <td>{{ $dok?->nomor_dokumen ?? '-' }}</td>
                            <td>{{ $label }}</td>
                            <!-- <td>{{ $dok?->nama_file ?? '-' }}</td> -->
                            <td>{{ !empty($dok?->keterangan) ? $dok->keterangan : '-' }}</td>
                            <td class="text-center">
                                @if($dok)
                                    <a href="{{ route('pegawai.dokumen.download', $dok->id) }}"
                                    class="btn btn-sm btn-success">
                                        <i class="fa-solid fa-download"></i>
                                    </a>
                                @endif

                                <a href="{{ route('pegawai.dokumen.upload', [$pegawai->nip, $key]) }}"
                                class="btn btn-sm btn-warning">
                                    <i class="fa-sharp fa-solid fa-upload"></i>                                    
                                </a>
                                @if($dok)
                                    <a href="{{ route('pegawai.dokumen.edit-metadata', $dok->id) }}"
                                        class="btn btn-sm btn-secondary text-white"><i class="fa-solid fa-pen"></i>
                                    </a>
                                    <form action="{{ route('pegawai.dokumen.destroy', $dok->id) }}"
                                        method="POST"
                                        class="d-inline form-delete-dokumen">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">
                                Belum ada dokumen yang diupload.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3 d-flex gap-2">
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary"> Kembali</a>
            <!-- <a href="{{ route('pegawai.edit', $pegawai->id) }}" class="btn btn-primary"> Edit Data Pegawai</a> -->
        </div>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteForms = document.querySelectorAll('.form-delete-dokumen');

    deleteForms.forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Yakin hapus dokumen?',
                text: 'Dokumen yang dihapus tidak bisa dikembalikan.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
});
</script>
@endsection