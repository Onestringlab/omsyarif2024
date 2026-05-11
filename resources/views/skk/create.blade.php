@extends('layouts.app')

@section('title')
Upload SKK - {{ $keluarga->nama }}
@endsection

@section('content')
<div class="container">
    {{-- Breadcrumb --}}
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('pegawai.show', $keluarga->pegawai_id ?? $pegawai->id ?? '') }}">
                    Detail Pegawai
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Upload SKK - {{ $keluarga->nama }}
            </li>
        </ol>
    </nav>

    <div class="card border-success">
        <h5 class="card-header text-bg-success">Upload Surat Keterangan Kuliah</h5>
        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <div class="mb-3">
                <table class="table table-sm table-borderless mb-0">
                    <tr>
                        <th style="width:160px">NIP Pegawai</th>
                        <td>{{ $keluarga->nip }}</td>
                    </tr>
                    <tr>
                        <th>Nama Anak</th>
                        <td>{{ $keluarga->nama }}</td>
                    </tr>
                    <tr>
                        <th>Status Sekolah</th>
                        <td>{{ $keluarga->sekolah }}</td>
                    </tr>
                </table>
            </div>

            <form action="{{ route('skk.store', $keluarga->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                        <input type="text"
                               name="nomor_surat"
                               id="nomor_surat"
                               value="{{ old('nomor_surat', $skk->nomor_surat ?? '') }}"
                               class="form-control @error('nomor_surat') is-invalid @enderror">
                        @error('nomor_surat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="tanggal_surat" class="form-label">
                            Tanggal Surat <span class="text-danger">*</span>
                        </label>
                        <input type="date"
                               name="tanggal_surat"
                               id="tanggal_surat"
                               value="{{ old('tanggal_surat', isset($skk->tanggal_surat) ? $skk->tanggal_surat->format('Y-m-d') : '') }}"
                               class="form-control @error('tanggal_surat') is-invalid @enderror"
                               required>
                        @error('tanggal_surat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-3">
                        <label for="tanggal_berakhir_preview" class="form-label">Berlaku Sampai</label>
                        <input type="date"
                               id="tanggal_berakhir_preview"
                               value="{{ old('tanggal_surat', isset($skk->tanggal_surat) ? $skk->tanggal_surat->copy()->addYear()->format('Y-m-d') : '') }}"
                               class="form-control"
                               readonly>
                        <small class="text-muted">Otomatis 1 tahun dari tanggal surat.</small>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="file_skk" class="form-label">
                        File SKK (PDF, max 2 MB) <span class="text-danger">*</span>
                    </label>
                    <input type="file"
                           name="file_skk"
                           id="file_skk"
                           class="form-control @error('file_skk') is-invalid @enderror"
                           accept=".pdf"
                           required>
                    @error('file_skk')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                    <div class="form-text">
                        Unggah Surat Keterangan Kuliah dalam format PDF.
                    </div>
                </div>

                <div class="mt-3 d-flex gap-2">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('pegawai.show', $pegawai->id ?? $keluarga->pegawai_id) }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tanggalSurat = document.getElementById('tanggal_surat');
    const tanggalBerakhirPreview = document.getElementById('tanggal_berakhir_preview');

    function updateTanggalBerakhir() {
        if (!tanggalSurat.value) {
            tanggalBerakhirPreview.value = '';
            return;
        }

        const tgl = new Date(tanggalSurat.value);
        tgl.setFullYear(tgl.getFullYear() + 1);

        const tahun = tgl.getFullYear();
        const bulan = String(tgl.getMonth() + 1).padStart(2, '0');
        const hari = String(tgl.getDate()).padStart(2, '0');

        tanggalBerakhirPreview.value = `${tahun}-${bulan}-${hari}`;
    }

    tanggalSurat.addEventListener('change', updateTanggalBerakhir);
    updateTanggalBerakhir();
});
</script>
@endsection