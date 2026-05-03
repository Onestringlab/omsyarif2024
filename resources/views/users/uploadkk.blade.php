@extends('layouts.app')

@section('title')
Upload PDF Data Keluarga
@endsection

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ asset('/users') }}">Data Pengguna</a></li>
        <li class="breadcrumb-item active" aria-current="page">Unggah PDF Data Keluarga</li>
        </ol>
    </nav>
    <div class="card border-success">
    <h5 class="card-header text-bg-success"> Upload PDF Data Keluarga - {{ $row->name }}</h5>
        <div class="card-body">
        <form action="{{asset('/')}}users/uploadkk" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>File PDF</label>
                <input type="file" name="pdf" class="form-control" accept=".pdf" required>
                <input type="hidden" name="id" value="{{ $row->id }}">
            </div>

            <button class="btn btn-success">Upload & Preview</button>
            <a href="{{asset('/')}}users" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection