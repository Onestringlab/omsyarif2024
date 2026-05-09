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

                <h5 class="mb-3">Dokumen Pegawai</h5>

                
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-success">
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th style="width: 160px;">Tanggal</th>
                                <th style="width:250px">Nomor</th>
                                <th style="width: 250px;">Dokumen</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if($jumlahDokumen > 0)
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
                        @else
                            <tr>
                                <td colspan="7" class="text-muted">
                                    Pegawai ini belum memiliki dokumen yang terupload.
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-4 d-flex gap-2">
                <form action="{{ route('pegawai.destroy', $pegawai->id) }}" method="POST" class="me-2 form-delete-pegawai">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>

                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection