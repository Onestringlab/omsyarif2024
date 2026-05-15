@extends('layouts.app')

@section('title')
Profil Pegawai Saya
@endsection

@section('content')
<div class="container">
    <div class="card border-success">
        <h5 class="card-header text-bg-success">Data Pegawai</h5>
        
        <div class="card-body">
            @if($pegawai)

                @include('pegawai._profil_readonly', ['pegawai' => $pegawai])

                <hr class="my-4">

                <h5 class="mb-3">Data Keluarga</h5>
                
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-success">
                            <tr>
                                <th width="60">No</th>
                                <th>Nama</th>
                                <th width="200">Tanggal Lahir</th>
                                <th width="250">Hubungan</th>
                                <th width="150">Tanggungan</th>
                                <th width="150">Sekolah</th>
                                <th width="100">Berlaku</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($keluarga as $i => $item)
                                @php
                                $skk = $item->skk;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $i + 1 }}.</td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    {{ $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') : '-' }}
                                    ({{ $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->age : '-' }} th)
                                </td>
                                <td>{{ $item->hubungan ?? '-' }}</td>
                                <td>{{ $item->tanggungan ?? '-' }}</td>
                                <td>{{ $item->sekolah ?? '-' }}</td>

                                @if(strtolower(trim($item->sekolah ?? '')) === 'kuliah')
                                    @php
                                        $tglBerakhir = $skk && $skk->tanggal_berakhir
                                            ? \Carbon\Carbon::parse($skk->tanggal_berakhir)
                                            : null;

                                        $isExpired = $tglBerakhir && $tglBerakhir->isPast();
                                        $isWarning = $tglBerakhir && !$isExpired && now()->diffInDays($tglBerakhir, false) <= 30;
                                    @endphp

                                    <td class="{{ $isExpired ? 'bg-danger text-white' : ($isWarning ? 'bg-warning' : '') }}">
                                        @if($tglBerakhir)
                                            {{ $tglBerakhir->format('d-m-Y') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                @else
                                    <td>-</td>
                                @endif
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-muted">
                                        Data keluarga belum tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

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
                            <thead class="table-success">
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
                <div class="alert alert-warning mt-0 mb-3">
                    Jika terdapat data atau dokumen yang belum sesuai, silakan menghubungi admin satker.
                </div>
            @else
                <div class="alert alert-warning mb-0">
                    Data pegawai Anda belum tersedia di sistem. Silakan hubungi admin satker untuk melakukan input atau import data pegawai.
                </div>
            @endif
        </div>
    </div>
</div>
@endsection