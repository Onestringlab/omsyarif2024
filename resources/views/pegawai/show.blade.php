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
                            <th width="180">Tanggal Lahir</th>
                            <th width="180">Hubungan</th>
                            <th width="120">Tanggungan</th>
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
                                                // Sudah expired - merah
                                                $bgClass = 'bg-danger text-white';
                                            } elseif ($daysUntilExpiry <= 30) {
                                                // 1 bulan atau kurang - kuning
                                                $bgClass = 'bg-warning';
                                            } elseif ($daysUntilExpiry <= 60) {
                                                // 1-2 bulan - hijau
                                                $bgClass = 'bg-success text-white';
                                            }
                                            // Lebih dari 2 bulan - tanpa background
                                        }
                                    @endphp

                                    <td class="{{ $bgClass }}">
                                        @if($tglBerakhir)
                                            {{ $tglBerakhir->format('d-m-Y') }}
                                        @elseif(!$skk || empty($skk->tanggal_berakhir))
                                            <span class="badge bg-primary text-white">Belum Unggah</span>
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
                                                    <i class="fa-solid fa-copy"></i>
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

            @php
                $hasSkkNotification = false;
                $hasBelumUnggah = false;
                foreach ($keluarga as $item) {
                    if (
                        strtolower(trim($item->sekolah ?? '')) === 'kuliah' &&
                        strtolower(trim($item->tanggungan ?? '')) === 'ya'
                    ) {
                        if ($item->skk && !empty($item->skk->tanggal_berakhir)) {
                            $tanggalBerakhir = \Carbon\Carbon::parse($item->skk->tanggal_berakhir);
                            $daysUntilExpiry = now()->diffInDays($tanggalBerakhir, false);

                            if ($daysUntilExpiry < 0 || $daysUntilExpiry <= 60) {
                                $hasSkkNotification = true;
                            }
                        } else {
                            $hasBelumUnggah = true;
                        }

                        if ($hasSkkNotification && $hasBelumUnggah) {
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

            <hr class="my-4">

            <h5 class="mb-3">Dokumen Pegawai</h5>

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
                            <th style="width:200px">Aksi</th>
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
                                <td>{{ $dok?->uraian ?? '-' }}</td>
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
                                        @php
                                            $tanggalDokumen = $dok->tanggal_dokumen ? \Carbon\Carbon::parse($dok->tanggal_dokumen)->format('d-m-Y') : '-';
                                        @endphp
                                        <a href="{{ route('pegawai.dokumen.edit-metadata', $dok->id) }}"
                                            class="btn btn-sm btn-secondary text-white"><i class="fa-solid fa-pen"></i>
                                        </a>
                                        <a href="javascript:void(0)"
                                            class="btn btn-sm btn-info text-white"
                                            title="Salin Narasi Dokumen"
                                            onclick="copyDocumentNarrative(this,
                                                '{{ addslashes($pegawai->nama) }}',
                                                '{{ addslashes($label) }}',
                                                '{{ addslashes($dok->uraian ?? '-') }}',
                                                '{{ addslashes($dok->nomor_dokumen ?? '-') }}',
                                                '{{ addslashes($tanggalDokumen) }}')">
                                                <i class="fa-solid fa-copy"></i>
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
function copyDocumentNarrative(button, namaPegawai, dokumen, uraian, nomor, tanggal) {
    const narasi = `Kepada Yth. Bapak/Ibu ${namaPegawai},

Dokumen ${dokumen} atas nama Bapak/Ibu dengan uraian ${uraian}, Nomor ${nomor}, tanggal ${tanggal}, telah diperbarui pada sistem penggajian Kementerian Keuangan.

Silakan melihat pembaruan tersebut di SLIP.web.id pada menu Profil. 

Terima kasih.`;
    copyToClipboardText(narasi);
}

function copyToClipboardText(text) {
    if (!text || text.trim() === '') {
        Swal.fire({
            icon: 'warning',
            title: 'Narasi tidak tersedia',
            text: 'Data narasi belum lengkap atau tidak dapat disalin.',
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

    navigator.clipboard.writeText(text)
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

function copyToClipboardSKK(button, narasi) {
    if (!narasi || narasi === 'Narasi tidak tersedia') {
        Swal.fire({
            icon: 'warning',
            title: 'Narasi tidak tersedia',
            text: 'Data SKK belum lengkap atau belum tersedia untuk disalin.',
        });
        return;
    }

    copyToClipboardText(narasi);
}
</script>
@endsection