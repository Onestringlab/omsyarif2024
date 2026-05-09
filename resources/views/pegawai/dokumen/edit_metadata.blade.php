@extends('layouts.app')

@section('title')
Edit Metadata Dokumen
@endsection

@section('content')
<div class="container">
    <div class="card border-success">
        <h5 class="card-header text-bg-success">Edit Metadata {{ $label }}</h5>

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

            <table class="table table-borderless mb-4">
                <tr>
                    <th style="width:180px;">NIP</th>
                    <td>{{ $pegawai->nip }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $pegawai->nama }}</td>
                </tr>
                <tr>
                    <th>Dokumen</th>
                    <td>{{ $label }}</td>
                </tr>
            </table>

            <form action="{{ route('pegawai.dokumen.update-metadata', $dokumen->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nomor_dokumen" class="form-label fw-bold">Nomor</label>
                    <input type="text"
                            name="nomor_dokumen"
                            id="nomor_dokumen"
                            class="form-control @error('nomor_dokumen') is-invalid @enderror"
                            value="{{ old('nomor_dokumen', $dokumen->nomor_dokumen) }}">
                    @error('nomor_dokumen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tanggal_dokumen" class="form-label fw-bold">Tanggal Dokumen</label>
                    <input type="date"
                            name="tanggal_dokumen"
                            id="tanggal_dokumen"
                            class="form-control @error('tanggal_dokumen') is-invalid @enderror"
                            value="{{ old('tanggal_dokumen', !empty($dokumen->tanggal_dokumen) ? \Carbon\Carbon::parse($dokumen->tanggal_dokumen)->format('Y-m-d') : '') }}">
                    @error('tanggal_dokumen')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                    <textarea name="keterangan"
                                id="keterangan"
                                rows="3"
                                class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $dokumen->keterangan) }}</textarea>
                    @error('keterangan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-success">
                        Simpan
                    </button>
                    <a href="{{ route('pegawai.show', ['pegawai' => $pegawai->id]) }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection