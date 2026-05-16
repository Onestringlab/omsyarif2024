@extends('layouts.app')

@section('title')
Data Pegawai
@endsection

@section('content')
<div class="container">
    <div class="card border-success">
        <h5 class="card-header text-bg-success">Data Pegawai</h5>
        <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success">
            {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="alert alert-warning" role="alert">
            <strong>Perhatian:</strong> Silahkan memeriksa data keluarga terkait Surat Keterangan Kuliah (SKK) anak untuk nama pegawai yang di-highlight.
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle">
                <thead class="thead-dark">
                    <tr class="align-middle text-center">
                        <th width="50px">No</th>
                        <th width="150px">NIP</th>
                        <th> Nama</th>
                        <th class="text-center" width="120px">SK Kenaikan<BR>Pangkat</th>
                        <th class="text-center" width="90px">KGB</th>
                        <th class="text-center" width="90px">SK Jabatan</th>
                        <th class="text-center" width="90px">KP4</th>
                        <th class="text-center" width="120px">SK Rumah<br>Dinas</th>
                        <th class="text-center" width="90px">Data<br>Keluarga</th>
                        <th class="text-center" width="180px">
                            <a class="btn btn-primary" href="{{ asset('/') }}pegawai/create">
                            <i class="fas fa-plus"></i>
                            </a>
                            <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#uploadPegawaiExcel">
                            <i class="fa-sharp fa-solid fa-upload"></i>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php($no = 1)
                    @forelse($rows as $row)
                    <tr class="{{ $row->skk_warning ? 'table-warning' : '' }}">
                        <td  class="text-center">{{ $no++ }}.</td>
                        <td>{{ $row->nip }}</td>
                        <td>{{ $row->nama }}</td>

                        {{-- SK Kenaikan Pangkat --}}
                        <td class="text-center">
                            <a href="{{ route('pegawai.dokumen.upload', [$row->nip, 'naik_pangkat']) }}"
                            class="btn btn-success">
                            <i class="fa-solid fa-turn-up"></i>
                            </a>
                        </td>

                        {{-- SK KGB --}}
                        <td class="text-center">
                            <a href="{{ route('pegawai.dokumen.upload', [$row->nip, 'kgb']) }}"
                            class="btn btn-warning">
                            <i class="fa-regular fa-file-lines"></i>
                            </a>
                        </td>

                        {{-- SK Jabatan --}}
                        <td class="text-center">
                            <a href="{{ route('pegawai.dokumen.upload', [$row->nip, 'jabatan']) }}"
                            class="btn btn-primary">
                            <i class="fa-solid fa-user-tie"></i>
                            </a>
                        </td>

                        {{-- KP4 --}}
                        <td class="text-center">
                            <a href="{{ route('pegawai.dokumen.upload', [$row->nip, 'kp4']) }}"
                            class="btn btn-secondary">
                            <i class="fa-solid fa-file-contract"></i>
                            </a>
                        </td>
                        
                        {{-- SK Rumah Dinas --}}
                        <td class="text-center">
                            <a href="{{ route('pegawai.dokumen.upload', [$row->nip, 'rumah_dinas']) }}"
                            class="btn btn-info text-white">
                            <i class="fa-solid fa-house-chimney"></i>
                            </a>
                        </td>

                        {{-- Data Keluarga --}}
                        <td class="text-center">
                            <a href="{{ route('pegawai.uploadkk', $row->nip) }}"
                            class="btn btn-dark">
                            <i class="fa-solid fa-people-group"></i>
                            </a>
                        </td>
                    
                        {{-- Aksi umum: detail / edit / hapus --}}
                        <td class="text-center">
                            <a class="btn btn-success" href="{{ asset('/') }}pegawai/{{ $row->id }}">
                            <i class="fas fa-info-circle"></i>
                            </a>
                            <a class="btn btn-secondary" href="{{ asset('/') }}pegawai/{{ $row->id }}/edit">
                            <i class="far fa-edit"></i>
                            </a>
                            <a class="btn btn-danger"
                                href="{{ route('pegawai.confirm-delete', $row->id) }}">
                                    <i class="far fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="10" class="text-center">Belum ada data pegawai.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        </div>
    </div>
</div>


<!-- Modal Upload Excel Pegawai -->
<div class="modal fade" id="uploadPegawaiExcel" tabindex="-1" aria-labelledby="uploadPegawaiExcelLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <form action="{{ route('pegawai.import') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="modal-header">
            <h1 class="modal-title fs-5" id="uploadPegawaiExcelLabel">Mengunggah Data Pegawai</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <!-- <div class="mb-3 row">
                    <div class="col-sm-12">
                    <div class="alert alert-warning mb-3">
                        <strong>Perhatian!</strong><br>
                        1. NIP pada file Excel harus terdaftar pada data pengguna di satker ini.<br>
                        2. Jika NIP sudah ada di data pegawai, maka data akan diupdate.<br>
                        3. Jika NIP belum ada, maka data akan ditambahkan.<br>
                        4. Hanya file Excel (.xls / .xlsx) yang diperbolehkan.
                    </div>
                    </div>
                </div> -->

                <div class="mb-3">
                    <label for="file" class="form-label">File (.xls / .xlsx)</label>
                    <input type="file" name="file" id="file" class="form-control" accept=".xls,.xlsx" required>
                </div>
            </div>

            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Unggah
            </button>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection