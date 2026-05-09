@extends('layouts.app')

@section('title')
Edit Metadata SKK
@endsection

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('pegawai.index') }}">Data Pegawai</a></li>
            <li class="breadcrumb-item"><a href="{{ route('pegawai.show', $pegawai->id) }}">Detail Pegawai</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit Metadata SKK</li>
        </ol>
    </nav>

    <div class="card border-success">
        <h5 class="card-header text-bg-success">Edit Metadata SKK</h5>
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

            <div class="mb-3">
                <table class="table table-borderless table-sm mb-0">
                    <tr>
                        <th style="width:160px">Nama Anak</th>
                        <td>{{ $keluarga->nama }}</td>
                    </tr>
                    <tr>
                        <th>NIP Pegawai</th>
                        <td>{{ $keluarga->nip }}</td>
                    </tr>
                    <tr>
                        <th>File SKK</th>
                        <td>{{ basename($skk->file_skk) }}</td>
                    </tr>
                </table>
            </div>

            <form action="{{ route('skk.update', $skk->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row mb-3">
                    <div class="col-md-4">
                        <label for="nomor_surat" class="form-label">Nomor Surat</label>
                        <input type="text"
                                name="nomor_surat"
                                id="nomor_surat"
                                class="form-control @error('nomor_surat') is-invalid @enderror"
                                value="{{ old('nomor_surat', $skk->nomor_surat) }}">
                        @error('nomor_surat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="tanggal_surat" class="form-label">Tanggal Surat</label>
                        <input type="date"
                                name="tanggal_surat"
                                id="tanggal_surat"
                                class="form-control @error('tanggal_surat') is-invalid @enderror"
                                value="{{ old('tanggal_surat', $skk->tanggal_surat ? \Carbon\Carbon::parse($skk->tanggal_surat)->format('Y-m-d') : '') }}">
                        @error('tanggal_surat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-4">
                        <label for="tanggal_berakhir" class="form-label">Tanggal Berakhir</label>
                        <input type="date"
                                name="tanggal_berakhir"
                                id="tanggal_berakhir"
                                class="form-control @error('tanggal_berakhir') is-invalid @enderror"
                                value="{{ old('tanggal_berakhir', $skk->tanggal_berakhir ? \Carbon\Carbon::parse($skk->tanggal_berakhir)->format('Y-m-d') : '') }}"
                                required>
                        @error('tanggal_berakhir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mt-3 d-flex gap-2">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('pegawai.show', $pegawai->id) }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection