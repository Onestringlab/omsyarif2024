@extends('layouts.app')

@section('title')
Upload PDF Data Keluarga
@endsection

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ asset('/pegawai') }}">Data Pegawai</a></li>
        <li class="breadcrumb-item"><a href="{{ route('pegawai.show', $row->id) }}">{{ $row->nama }}</a></li>
        <li class="breadcrumb-item active" aria-current="page">Unggah PDF Data Keluarga</li>
        </ol>
    </nav>
    <div class="card border-success">
    <h5 class="card-header text-bg-success"> Unggah Data Keluarga - {{ $row->nama }}</h5>
        <div class="card-body">
        <form action="{{ route('pegawai.uploadkk.process', $row->nip) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="fw-bold">File PDF</label>
                <input type="file" name="pdf" class="form-control" accept=".pdf" required>
                <input type="hidden" name="nip" value="{{ $row->nip }}">
            </div>

            <button class="btn btn-success">Unggah & Tinjau</button>
            <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>
@endsection