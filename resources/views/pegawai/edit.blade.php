@extends('layouts.app')

@section('title')
Edit Pegawai
@endsection

@section('content')
<div class="container">
    <div class="card border-success">
        <h5 class="card-header text-bg-success">Form Edit Pegawai</h5>
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

            <form action="{{ route('pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Baris 1 --}}
                <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nip" class="form-label fw-bold">NIP</label>
                    <input type="text" id="nip" class="form-control" value="{{ $pegawai->nip }}" disabled>
                    <div class="form-text">NIP tidak dapat diubah (mengikuti data pengguna pada satuan kerja).</div>
                </div>
                <div class="col-md-6">
                    <label for="nama" class="form-label fw-bold">Nama</label>
                    <input type="text" name="nama" id="nama"
                        class="form-control @error('nama') is-invalid @enderror"
                        value="{{ old('nama', $pegawai->nama) }}" required>
                    @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>

                {{-- Baris 2 --}}
                <div class="row mb-3">
                <div class="col-md-6">
                    <label for="jenis_kelamin" class="form-label fw-bold">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin"
                            class="form-select @error('jenis_kelamin') is-invalid @enderror">
                    <option value="">-- pilih --</option>
                    <option value="L" {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="P" {{ old('jenis_kelamin', $pegawai->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="golongan" class="form-label fw-bold">Golongan/Ruang</label>
                    <input type="text" name="golongan" id="golongan"
                        class="form-control @error('golongan') is-invalid @enderror"
                        value="{{ old('golongan', $pegawai->golongan) }}">
                    @error('golongan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>

                {{-- Baris 3 --}}
                <div class="row mb-3">
                <div class="col-md-6">
                    <label for="nama_golongan" class="form-label fw-bold">Pangkat</label>
                    <input type="text" name="nama_golongan" id="nama_golongan"
                        class="form-control @error('nama_golongan') is-invalid @enderror"
                        value="{{ old('nama_golongan', $pegawai->nama_golongan) }}">
                    @error('nama_golongan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="jabatan" class="form-label fw-bold">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan"
                        class="form-control @error('jabatan') is-invalid @enderror"
                        value="{{ old('jabatan', $pegawai->jabatan) }}">
                    @error('jabatan')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>

                {{-- Baris 4: kode satker --}}
                <div class="row mb-3">
                <div class="col-md-3">
                    <label for="kdsatker_induk" class="form-label fw-bold">Kd Satker Induk</label>
                    <input type="text" name="kdsatker_induk" id="kdsatker_induk"
                        class="form-control @error('kdsatker_induk') is-invalid @enderror"
                        value="{{ old('kdsatker_induk', $pegawai->kdsatker_induk) }}">
                    @error('kdsatker_induk')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="kdsatker_bekerja" class="form-label fw-bold">Kd Satker Bekerja</label>
                    <input type="text" name="kdsatker_bekerja" id="kdsatker_bekerja"
                        class="form-control @error('kdsatker_bekerja') is-invalid @enderror"
                        value="{{ old('kdsatker_bekerja', $pegawai->kdsatker_bekerja) }}">
                    @error('kdsatker_bekerja')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="kdsatker_bayar" class="form-label fw-bold">Kd Satker Bayar</label>
                    <input type="text" name="kdsatker_bayar" id="kdsatker_bayar"
                        class="form-control @error('kdsatker_bayar') is-invalid @enderror"
                        value="{{ old('kdsatker_bayar', $pegawai->kdsatker_bayar) }}">
                    @error('kdsatker_bayar')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="kdanak" class="form-label fw-bold">Kd Anak</label>
                    <input type="text" name="kdanak" id="kdanak"
                        class="form-control @error('kdanak') is-invalid @enderror"
                        value="{{ old('kdanak', $pegawai->kdanak) }}">
                    @error('kdanak')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>

                {{-- Baris 5: status & gapok --}}
                <div class="row mb-3">
                <div class="col-md-4">
                    <label for="kdkawin" class="form-label fw-bold">Kd Kawin</label>
                    <input type="text" name="kdkawin" id="kdkawin"
                        class="form-control @error('kdkawin') is-invalid @enderror"
                        value="{{ old('kdkawin', $pegawai->kdkawin) }}">
                    @error('kdkawin')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="kdduduk" class="form-label fw-bold">Kd Duduk</label>
                    <input type="text" name="kdduduk" id="kdduduk"
                        class="form-control @error('kdduduk') is-invalid @enderror"
                        value="{{ old('kdduduk', $pegawai->kdduduk) }}">
                    @error('kdduduk')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="kdgapok" class="form-label fw-bold">Kd Gapok</label>
                    <input type="text" name="kdgapok" id="kdgapok"
                        class="form-control @error('kdgapok') is-invalid @enderror"
                        value="{{ old('kdgapok', $pegawai->kdgapok) }}">
                    @error('kdgapok')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>

                {{-- Baris 6 --}}
                <div class="row mb-3">
                <div class="col-md-3">
                    <label for="pberas" class="form-label fw-bold">Pberas</label>
                    <input type="number" name="pberas" id="pberas"
                        class="form-control @error('pberas') is-invalid @enderror"
                        value="{{ old('pberas', $pegawai->pberas) }}">
                    @error('pberas')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="kdhakim" class="form-label fw-bold">Kd Hakim</label>
                    <input type="number" name="kdhakim" id="kdhakim"
                        class="form-control @error('kdhakim') is-invalid @enderror"
                        value="{{ old('kdhakim', $pegawai->kdhakim) }}">
                    @error('kdhakim')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="kdpapua" class="form-label fw-bold">Kd Papua</label>
                    <input type="number" name="kdpapua" id="kdpapua"
                        class="form-control @error('kdpapua') is-invalid @enderror"
                        value="{{ old('kdpapua', $pegawai->kdpapua) }}">
                    @error('kdpapua')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="kdpencil" class="form-label fw-bold">Kd Pencil</label>
                    <input type="number" name="kdpencil" id="kdpencil"
                        class="form-control @error('kdpencil') is-invalid @enderror"
                        value="{{ old('kdpencil', $pegawai->kdpencil) }}">
                    @error('kdpencil')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>

                {{-- Baris 7 --}}
                <div class="row mb-3">
                <div class="col-md-3">
                    <label for="tahungapok" class="form-label fw-bold">Tahun Gapok</label>
                    <input type="text" name="tahungapok" id="tahungapok"
                        class="form-control @error('tahungapok') is-invalid @enderror"
                        value="{{ old('tahungapok', $pegawai->tahungapok) }}">
                    @error('tahungapok')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="kdbpjs2" class="form-label fw-bold">Kd BPJS2</label>
                    <input type="text" name="kdbpjs2" id="kdbpjs2"
                        class="form-control @error('kdbpjs2') is-invalid @enderror"
                        value="{{ old('kdbpjs2', $pegawai->kdbpjs2) }}">
                    @error('kdbpjs2')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="bulanakhir" class="form-label fw-bold">Bulan Akhir</label>
                    <input type="text" name="bulanakhir" id="bulanakhir"
                        class="form-control @error('bulanakhir') is-invalid @enderror"
                        value="{{ old('bulanakhir', $pegawai->bulanakhir) }}">
                    @error('bulanakhir')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="tahunakhir" class="form-label fw-bold">Tahun Akhir</label>
                    <input type="text" name="tahunakhir" id="tahunakhir"
                        class="form-control @error('tahunakhir') is-invalid @enderror"
                        value="{{ old('tahunakhir', $pegawai->tahunakhir) }}">
                    @error('tahunakhir')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>

                {{-- Baris 8 --}}
                <div class="row mb-3">
                <div class="col-md-3">
                    <label for="kdjab" class="form-label fw-bold">Kd Jabatan</label>
                    <input type="text" name="kdjab" id="kdjab"
                        class="form-control @error('kdjab') is-invalid @enderror"
                        value="{{ old('kdjab', $pegawai->kdjab) }}">
                    @error('kdjab')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="jablain" class="form-label fw-bold">Jab Lain</label>
                    <input type="text" name="jablain" id="jablain"
                        class="form-control @error('jablain') is-invalid @enderror"
                        value="{{ old('jablain', $pegawai->jablain) }}">
                    @error('jablain')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="tumum" class="form-label fw-bold">Tunjangan Umum</label>
                    <input type="number" step="1" name="tumum" id="tumum"
                        class="form-control @error('tumum') is-invalid @enderror"
                        value="{{ old('tumum', $pegawai->tumum) }}">
                    @error('tumum')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="sewarumah" class="form-label fw-bold">Sewa Rumah</label>
                    <input type="number" step="1" name="sewarumah" id="sewarumah"
                        class="form-control @error('sewarumah') is-invalid @enderror"
                        value="{{ old('sewarumah', $pegawai->sewarumah) }}">
                    @error('sewarumah')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>

                <div class="mt-3 d-flex gap-2">
                    <button type="submit" class="btn btn-warning">Simpan</button>
                    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection