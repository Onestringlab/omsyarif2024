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

            @include('pegawai._detail_readonly', ['pegawai' => $pegawai])

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

            <h5 class="mb-3">Data Keluarga
                <a href="{{ route('pegawai.uploadkk', $pegawai->nip) }}"
                    class="btn btn-dark">
                    <i class="fa-solid fa-people-group"></i>
                </a>
            </h5>
            
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead class="table-success">
                        <tr>
                            <th width="60">No</th>
                            <th>Nama</th>
                            <th width="150">Tanggal Lahir</th>
                            <th width="150">Hubungan</th>
                            <th width="150">Tanggungan</th>
                            <th width="150">Sekolah</th>
                            <th width="100">Berlaku</th>
                            <th width="200">Aksi SKK</th>
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
                                    <td>
                                        <a href="{{ route('skk.create', $item->id) }}"
                                        class="btn btn-sm btn-warning"
                                        title="Upload SKK">
                                            <i class="fa-solid fa-upload"></i>
                                        </a>

                                        @if($skk)
                                            <a href="{{ route('skk.download', $skk->id) }}"
                                            class="btn btn-sm btn-success"
                                            title="Download SKK">
                                                <i class="fa-solid fa-download"></i>
                                            </a>

                                            <a href="{{ route('skk.edit', $skk->id) }}"
                                            class="btn btn-sm btn-secondary text-white"
                                            title="Edit SKK">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>

                                            <a href="javascript:void(0)"
                                                class="btn btn-sm btn-info text-white"
                                                title="Salin Narasi"
                                                onclick="copyToClipboardSKK(this, '{{ $item->narasi_skk }}')">
                                                    <i class="fa-solid fa-link"></i>
                                            </a>
                                            
                                            <form action="{{ route('skk.destroy', $skk->id) }}"
                                                method="POST"
                                                class="d-inline form-delete-skk">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="btn btn-sm btn-danger"
                                                        title="Hapus SKK">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                @else
                                    <td>-</td>
                                    <td>-</td>
                                @endif
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">
                                    Data keluarga belum tersedia.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
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
                    <thead class="table-success">
                        <tr>
                            <th style="width:60px">No</th>
                            <th style="width:120px">Tanggal</th>
                            <th style="width:250px">Nomor</th>
                            <th style="width:250px">Dokumen</th>
                            <th>Keterangan</th>
                            <th style="width:220px">Aksi</th>
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
                                <td>
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
<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteFormsDokumen = document.querySelectorAll('.form-delete-dokumen');
    const deleteFormsSkk = document.querySelectorAll('.form-delete-skk');

    function bindDelete(forms, title, text) {
        forms.forEach(form => {
            form.addEventListener('submit', function (e) {
                e.preventDefault();

                Swal.fire({
                    title: title,
                    text: text,
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
    }

    bindDelete(
        deleteFormsDokumen,
        'Yakin hapus dokumen?',
        'Dokumen yang dihapus tidak bisa dikembalikan.'
    );

    bindDelete(
        deleteFormsSkk,
        'Yakin hapus SKK?',
        'File SKK yang dihapus tidak bisa dikembalikan.'
    );
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('.btn-copy-narasi').forEach(button => {
        button.addEventListener('click', function () {
            const narasi = JSON.parse(this.dataset.narasi);
            copyToClipboard(this, narasi);
        });
    });
});

function copyToClipboardSKK(button, narasi) {
    if (!narasi || narasi === 'Narasi tidak tersedia') {
        Swal.fire({
            icon: 'warning',
            title: 'Narasi tidak tersedia',
            text: 'Data SKK belum lengkap atau belum tersedia untuk disalin.',
        });
        return;
    }

    if (!navigator.clipboard || !window.isSecureContext) {
        Swal.fire({
            icon: 'error',
            title: 'Clipboard tidak didukung',
            text: 'Browser atau koneksi saat ini tidak mendukung fitur salin otomatis.',
        });
        return;
    }

    navigator.clipboard.writeText(narasi)
        .then(() => {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: 'Narasi berhasil disalin ke clipboard.',
                timer: 1500,
                showConfirmButton: false
            });
        })
        .catch(err => {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: 'Gagal menyalin narasi: ' + err,
            });
        });
}
</script>
@endsection