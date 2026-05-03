@extends('layouts.app')

@section('title')
Konfirmasi Hapus Pegawai
@endsection

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Data Pegawai</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $pegawai->nama }}</li>
        </ol>
    </nav>

    <div class="card border-success">
        <h5 class="card-header text-bg-success">
            Konfirmasi Hapus Pegawai
        </h5>

        <div class="card-body">
            <div class="alert alert-warning">
                <strong>Peringatan!</strong>  Jika pegawai ini dihapus, maka seluruh metadata dokumen dan file fisik dokumen yang terkait juga akan ikut terhapus permanen.
            </div>

            @include('pegawai._detail_readonly', ['pegawai' => $pegawai])

            @php
                $jenisDokumen = [
                    'naik_pangkat' => 'SK Kenaikan Pangkat',
                    'kgb' => 'SK KGB',
                    'jabatan' => 'SK Jabatan',
                    'kp4' => 'KP4',
                    'rumah_dinas' => 'SK Rumah Dinas',
                ];

                $dokumenByJenis = $pegawai->dokumen->keyBy('jenis_dokumen');
                $jumlahDokumen = $pegawai->dokumen->count();
            @endphp

            <div class="mt-4">

                <h5 class="mb-3">Dokumen Pegawai</h5>

                @if($jumlahDokumen > 0)
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 60px;">No</th>
                                    <th style="width: 160px;">Tanggal</th>
                        <th style="width:250px">Nomor</th>

                                    <th style="width: 250px;">Dokumen</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jenisDokumen as $key => $label)
                                    @php
                                        $dok = $dokumenByJenis->get($key);
                                    @endphp

                                    @if($dok)
                                        <tr>
                                            <td>{{ $loop->iteration }}.</td>
                                            <td>
                                                {{ !empty($dok->tanggal_dokumen)
                                                    ? \Carbon\Carbon::parse($dok->tanggal_dokumen)->format('d-m-Y')
                                                    : '-' }}
                                            </td>
                                            <td>{{ $dok?->nomor_dokumen ?? '-' }}</td>
                                            <td>{{ $label }}</td>
                                            <td>{{ !empty($dok->keterangan) ? $dok->keterangan : '-' }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="alert alert-secondary mb-0">
                        Pegawai ini belum memiliki dokumen yang terupload.
                    </div>
                @endif
            </div>

            <div class="mt-4 d-flex gap-2">
                <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" class="me-2 form-delete-pegawai">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>

                <a href="{{ route('pegawai.index') }}" class="btn btn-primary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection