@extends('layouts.app')

@section('title')
Tambah Pegawai
@endsection

@section('content')
<div class="container">
    <div class="card border-success">
        <h5 class="card-header text-bg-success">Form Tambah Pegawai</h5>
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

        <form action="{{ route('pegawai.store') }}" method="POST">
            @csrf

            {{-- Baris 1 --}}
            <div class="row mb-3">
            <div class="col-md-6">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" name="nip" id="nip"
                    class="form-control @error('nip') is-invalid @enderror"
                    value="{{ old('nip') }}" required>
                @error('nip')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" id="nama"
                    class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama') }}" required>
                @error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>

            {{-- Baris 2 --}}
            <div class="row mb-3">
            <div class="col-md-6">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin"
                        class="form-select @error('jenis_kelamin') is-invalid @enderror">
                <option value="">-- pilih --</option>
                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jenis_kelamin')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="tgl_lhr" class="form-label fw-bold">Tanggal Lahir</label>
                <input type="date" name="tgl_lhr" id="tgl_lhr"
                    class="form-control @error('tgl_lhr') is-invalid @enderror"
                    value="{{ old('tgl_lhr') }}">
                @error('tgl_lhr')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>

            {{-- Baris 3 --}}
            <div class="row mb-3">
            <div class="col-md-3">
                <label for="golongan" class="form-label">Golongan/Ruang</label>
                <input type="text" name="golongan" id="golongan"
                    class="form-control @error('golongan') is-invalid @enderror"
                    value="{{ old('golongan') }}">
                @error('golongan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="nama_golongan" class="form-label">Pangkat</label>
                <input type="text" name="nama_golongan" id="nama_golongan"
                    class="form-control @error('nama_golongan') is-invalid @enderror"
                    value="{{ old('nama_golongan') }}">
                @error('nama_golongan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="jabatan" class="form-label">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan"
                    class="form-control @error('jabatan') is-invalid @enderror"
                    value="{{ old('jabatan') }}">
                @error('jabatan')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>

            {{-- Baris 4: kode satker --}}
            <div class="row mb-3">
            <div class="col-md-4">
                <label for="kdsatker_induk" class="form-label">Kd Satker Induk</label>
                <input type="text" name="kdsatker_induk" id="kdsatker_induk"
                    class="form-control @error('kdsatker_induk') is-invalid @enderror"
                    value="{{ old('kdsatker_induk') }}">
                @error('kdsatker_induk')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="kdsatker_bekerja" class="form-label">Kd Satker Bekerja</label>
                <input type="text" name="kdsatker_bekerja" id="kdsatker_bekerja"
                    class="form-control @error('kdsatker_bekerja') is-invalid @enderror"
                    value="{{ old('kdsatker_bekerja') }}">
                @error('kdsatker_bekerja')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-4">
                <label for="kdsatker_bayar" class="form-label">Kd Satker Bayar</label>
                <input type="text" name="kdsatker_bayar" id="kdsatker_bayar"
                    class="form-control @error('kdsatker_bayar') is-invalid @enderror"
                    value="{{ old('kdsatker_bayar') }}">
                @error('kdsatker_bayar')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>

            {{-- Baris 5: status keluarga & gapok --}}
            <div class="row mb-3">
            <div class="col-md-3">
                <label for="kdanak" class="form-label">Kd Anak</label>
                <input type="text" name="kdanak" id="kdanak"
                    class="form-control @error('kdanak') is-invalid @enderror"
                    value="{{ old('kdanak') }}">
                @error('kdanak')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="kdkawin" class="form-label">Kd Kawin</label>
                <input type="text" name="kdkawin" id="kdkawin"
                    class="form-control @error('kdkawin') is-invalid @enderror"
                    value="{{ old('kdkawin') }}">
                @error('kdkawin')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="kdduduk" class="form-label">Kd Duduk</label>
                <input type="text" name="kdduduk" id="kdduduk"
                    class="form-control @error('kdduduk') is-invalid @enderror"
                    value="{{ old('kdduduk') }}">
                @error('kdduduk')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="kdgapok" class="form-label">Kd Gapok</label>
                <input type="text" name="kdgapok" id="kdgapok"
                    class="form-control @error('kdgapok') is-invalid @enderror"
                    value="{{ old('kdgapok') }}">
                @error('kdgapok')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>

            {{-- Baris 6: tunjangan & flag --}}
            <div class="row mb-3">
            <div class="col-md-3">
                <label for="pberas" class="form-label">Pberas</label>
                <input type="number" name="pberas" id="pberas"
                    class="form-control @error('pberas') is-invalid @enderror"
                    value="{{ old('pberas') }}">
                @error('pberas')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="kdhakim" class="form-label">Kd Hakim</label>
                <input type="number" name="kdhakim" id="kdhakim"
                    class="form-control @error('kdhakim') is-invalid @enderror"
                    value="{{ old('kdhakim') }}">
                @error('kdhakim')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="kdpapua" class="form-label">Kd Papua</label>
                <input type="number" name="kdpapua" id="kdpapua"
                    class="form-control @error('kdpapua') is-invalid @enderror"
                    value="{{ old('kdpapua') }}">
                @error('kdpapua')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="kdpencil" class="form-label">Kd Pencil</label>
                <input type="number" name="kdpencil" id="kdpencil"
                    class="form-control @error('kdpencil') is-invalid @enderror"
                    value="{{ old('kdpencil') }}">
                @error('kdpencil')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>

            {{-- Baris 7: tahun/bulan dan jab --}}
            <div class="row mb-3">
            <div class="col-md-3">
                <label for="tahungapok" class="form-label">Tahun Gapok</label>
                <input type="text" name="tahungapok" id="tahungapok"
                    class="form-control @error('tahungapok') is-invalid @enderror"
                    value="{{ old('tahungapok') }}">
                @error('tahungapok')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="kdbpjs2" class="form-label">Kd BPJS2</label>
                <input type="text" name="kdbpjs2" id="kdbpjs2"
                    class="form-control @error('kdbpjs2') is-invalid @enderror"
                    value="{{ old('kdbpjs2') }}">
                @error('kdbpjs2')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="bulanakhir" class="form-label">Bulan Akhir</label>
                <input type="text" name="bulanakhir" id="bulanakhir"
                    class="form-control @error('bulanakhir') is-invalid @enderror"
                    value="{{ old('bulanakhir') }}">
                @error('bulanakhir')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="tahunakhir" class="form-label">Tahun Akhir</label>
                <input type="text" name="tahunakhir" id="tahunakhir"
                    class="form-control @error('tahunakhir') is-invalid @enderror"
                    value="{{ old('tahunakhir') }}">
                @error('tahunakhir')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>

            {{-- Baris 8: kdjab, jablain, tunj umum, sewa rumah --}}
            <div class="row mb-3">
            <div class="col-md-3">
                <label for="kdjab" class="form-label">Kd Jabatan</label>
                <input type="text" name="kdjab" id="kdjab"
                    class="form-control @error('kdjab') is-invalid @enderror"
                    value="{{ old('kdjab') }}">
                @error('kdjab')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="jablain" class="form-label">Jab Lain</label>
                <input type="text" name="jablain" id="jablain"
                    class="form-control @error('jablain') is-invalid @enderror"
                    value="{{ old('jablain') }}">
                @error('jablain')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="tumum" class="form-label">Tunjangan Umum</label>
                <input type="number" step="0.01" name="tumum" id="tumum"
                    class="form-control @error('tumum') is-invalid @enderror"
                    value="{{ old('tumum') }}">
                @error('tumum')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-3">
                <label for="sewarumah" class="form-label">Sewa Rumah</label>
                <input type="number" step="0.01" name="sewarumah" id="sewarumah"
                    class="form-control @error('sewarumah') is-invalid @enderror"
                    value="{{ old('sewarumah') }}">
                @error('sewarumah')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            </div>

            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </form>

        </div>
    </div>
</div>
@endsection