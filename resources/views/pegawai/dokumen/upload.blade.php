@extends('layouts.app')

@section('title', 'Unggah ' . $label . ' - ' . $pegawai->nama)

@section('content')
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-lg-8 mx-auto">
            
            {{-- Breadcrumb --}}
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Data Pegawai</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pegawai.show', $pegawai->id) }}">{{ $pegawai->nama }}</a></li>
                    <li class="breadcrumb-item active">Unggah {{ $label }}</li>
                </ol>
            </nav>

            {{-- Card Upload --}}
            <div class="card shadow-sm">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">
                        {{ $dokumen ? 'Ganti' : 'Unggah' }} {{ $label }}
                    </h5>
                </div>

                <div class="card-body">
                    
                    {{-- Info Pegawai --}}
                    <div class="alert alert-light border mb-4">
                        <div class="row">
                            <div class="col-md-6">
                                <strong>NIP:</strong> {{ $pegawai->nip }}
                            </div>
                            <div class="col-md-6">
                                <strong>Nama:</strong> {{ $pegawai->nama }}
                            </div>
                        </div>
                    </div>

                    {{-- Info dokumen existing --}}
                    @if($dokumen)
                    <div class="alert alert-warning">
                        <i class="fas fa-info-circle me-2"></i>
                        <strong>Dokumen sebelumnya:</strong> {{ $dokumen->nama_file }}<br>
                        <small class="text-muted">
                            Diupload pada {{ $dokumen->created_at->format('d/m/Y H:i') }} 
                            oleh {{ $dokumen->uploaded_by ?? '-' }}
                        </small><br>
                        <small class="text-muted">Unggah baru akan mengganti dokumen yang ada.</small>
                    </div>
                    @endif

                    {{-- Form Upload --}}
                    <form action="{{ route('pegawai.dokumen.store', [$pegawai->nip, $jenis]) }}" 
                            method="POST" 
                            enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="nomor_dokumen" class="form-label fw-bold">
                                Nomor Dokumen
                            </label>
                            <input type="text" 
                                    class="form-control @error('nomor_dokumen') is-invalid @enderror" 
                                    id="nomor_dokumen"
                                    name="nomor_dokumen" 
                                    value="{{ old('nomor_dokumen', $dokumen->nomor_dokumen ?? '') }}"
                                    placeholder="Contoh: 800/123/SK/2026">
                            @error('nomor_dokumen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Opsional</small>
                        </div>

                        <div class="mb-3">
                            <label for="tanggal_dokumen" class="form-label fw-bold">Tanggal Dokumen</label>
                            <input type="date"
                                name="tanggal_dokumen"
                                id="tanggal_dokumen"
                                class="form-control @error('tanggal_dokumen') is-invalid @enderror"
                                value="{{ old('tanggal_dokumen', !empty($dokumen?->tanggal_dokumen) ? \Carbon\Carbon::parse($dokumen->tanggal_dokumen)->format('Y-m-d') : '') }}">
                            @error('tanggal_dokumen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="uraian" class="form-label fw-bold">Uraian</label>
                            <input type="text"
                                    name="uraian"
                                    id="uraian"
                                    class="form-control @error('uraian') is-invalid @enderror"
                                    placeholder="Contoh: Uraian terbaru hasil revisi"
                                    value="{{ old('uraian', $dokumen->uraian ?? '') }}">
                            @error('uraian')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Opsional</small>
                        </div>

                        <div class="mb-3">
                            <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                            <input type="text"
                                    name="keterangan"
                                    id="keterangan"
                                    class="form-control @error('keterangan') is-invalid @enderror"
                                    placeholder="Contoh: Keterangan terbaru hasil revisi"
                                    value="{{ old('keterangan', $dokumen->keterangan ?? '') }}">
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="text-muted">Opsional</small>
                        </div>


                        <div class="mb-4">
                            <label for="file_dokumen" class="form-label fw-bold">
                                File PDF <span class="text-danger">*</span>
                            </label>
                            <input type="file" 
                                    class="form-control @error('file_dokumen') is-invalid @enderror" 
                                    id="file_dokumen"
                                    name="file_dokumen" 
                                    accept=".pdf"
                                    required>
                            @error('file_dokumen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">
                                Format: PDF, Maksimal: 5 MB
                            </small>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary">
                                {{ $dokumen ? 'Ganti Dokumen' : 'Unggah Dokumen' }}
                            </button>
                            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection