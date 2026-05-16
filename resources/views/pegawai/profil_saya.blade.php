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
                                <th width="180">Tanggal Lahir</th>
                                <th width="180">Hubungan</th>
                                <th width="180">Tanggungan</th>
                                <th width="150">Sekolah</th>
                                <th width="100">Berlaku</th>
                                <th width="100">Aksi SKK</th>
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

                                @if(
                                    strtolower(trim($item->sekolah ?? '')) === 'kuliah' &&
                                    strtolower(trim($item->tanggungan ?? '')) === 'ya'
                                )
                                    @php
                                        $tglBerakhir = $skk && $skk->tanggal_berakhir
                                            ? \Carbon\Carbon::parse($skk->tanggal_berakhir)
                                            : null;

                                        $bgClass = '';
                                        if ($tglBerakhir) {
                                            $daysUntilExpiry = now()->diffInDays($tglBerakhir, false);

                                            if ($daysUntilExpiry < 0) {
                                                $bgClass = 'bg-danger text-white';
                                            } elseif ($daysUntilExpiry <= 30) {
                                                $bgClass = 'bg-warning';
                                            } elseif ($daysUntilExpiry <= 60) {
                                                $bgClass = 'bg-success text-white';
                                            }
                                        }
                                    @endphp

                                    <td class="{{ $bgClass }}">
                                        @if($tglBerakhir)
                                            {{ $tglBerakhir->format('d-m-Y') }}
                                        @else
                                            -
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($skk)
                                            <a href="{{ route('skk.download', $skk->id) }}"
                                            class="btn btn-sm btn-success"
                                            title="Download SKK">
                                                <i class="fa-solid fa-download"></i>
                                            </a>
                                        @endif
                                    </td>
                                @else
                                    <td>-</td>
                                    <td>-</td>
                                @endif
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-muted">
                                        Data keluarga belum tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                @php
                $hasSkkNotification = false;
                foreach ($keluarga as $item) {
                    if (
                        strtolower(trim($item->sekolah ?? '')) === 'kuliah' &&
                        strtolower(trim($item->tanggungan ?? '')) === 'ya' &&
                        $item->skk &&
                        !empty($item->skk->tanggal_berakhir)
                    ) {
                        $tanggalBerakhir = \Carbon\Carbon::parse($item->skk->tanggal_berakhir);
                        $daysUntilExpiry = now()->diffInDays($tanggalBerakhir, false);

                        if ($daysUntilExpiry < 0 || $daysUntilExpiry <= 60) {
                            $hasSkkNotification = true;
                            break;
                        }
                    }
                }
                @endphp

                @if($hasSkkNotification)
                    <div class="alert alert-info">
                        <strong>Status Surat Keterangan Kuliah (SKK):</strong>
                        <ul class="mb-0">
                            <li>Hijau = SKK akan berakhir dalam waktu kurang dari 2 bulan.</li>
                            <li>Kuning = SKK akan berakhir dalam waktu kurang dari 1 bulan.</li>
                            <li>Merah = SKK telah berakhir.</li>
                        </ul>
                    </div>
                @endif

                @php
                    $jenisDokumen = [
                        'naik_pangkat' => 'Pangkat',
                        'kgb' => 'KGB',
                        'jabatan' => 'Jabatan',
                        'kp4' => 'KP4',
                        'rumah_dinas' => 'Sewa Rumah Dinas',
                        'cuti' => 'Cuti',
                        'hukuman_disiplin' => 'Hukuman Disiplin',
                        'lain_lain' => 'Lain-lain',
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
                                <th style="width:60px">No</th>
                                <th style="width:120px">Tanggal</th>
                                <th style="width:250px">Nomor</th>
                                <th style="width:180px">Dokumen</th>
                                <th>Uraian</th>
                                <th style="width:220px">Keterangan</th>
                                <th style="width:120px">Aksi</th>
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
                                        <td>{{ !empty($dok?->uraian) ? $dok->uraian : '-' }}</td>
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