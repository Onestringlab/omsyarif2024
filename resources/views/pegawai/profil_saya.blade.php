@extends('layouts.app')

@section('title')
Profil Pegawai Saya
@endsection

@section('content')
<div class="container">
    <div class="card border-success">
        <h5 class="card-header text-bg-success">Data Pegawai</h5>
        
        <div class="card-body">
            <div class="alert alert-warning mt-0 mb-3">
                Jika terdapat data atau dokumen yang belum sesuai, silakan hubungi admin satker.
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
            @endphp
            <hr class="my-4">
            <div class="mt-4">
                <h5 class="mb-3">Dokumen Pegawai</h5>
                <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th style="width: 160px;">Tanggal</th>
                                <th style="width: 250px;">Nomor</th>
                                <th style="width: 250px;">Jenis Dokumen</th>
                                <th>Keterangan</th>
                                <th style="width: 120px;">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($jenisDokumen as $key => $label)
                                @php $dok = $dokumenByJenis->get($key); @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>
                                        {{ !empty($dok?->tanggal_dokumen)
                                            ? \Carbon\Carbon::parse($dok->tanggal_dokumen)->format('d-m-Y')
                                            : '-' }}
                                    </td>
                                    <td>{{ $dok?->nomor_dokumen ?? '-' }}</td>
                                    <td>{{ $label }}</td>
                                    <td>{{ !empty($dok?->keterangan) ? $dok->keterangan : '-' }}</td>
                                    <td>
                                        @if($dok)
                                            <a href="{{ route('pegawai.profil-saya.download-dokumen', $dok->id) }}"
                                                target="_blank"
                                                class="btn btn-sm btn-primary">
                                                    Lihat
                                            </a>
                                        @else
                                            <span class="btn btn-sm btn-warning">Tidak Ada</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection