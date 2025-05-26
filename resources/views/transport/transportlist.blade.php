@extends('layouts.app')

@section('title')
Data Transport 
@endsection

@section('content')
<div class="container">
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/months') }}">Data</a></li>
            <li class="breadcrumb-item active" aria-current="page">Uang Transport</li>
        </ol>
    </nav>
    <div class="card">
        <h5 class="card-header text-bg-success"> Data Uang Transportasi</h5>
        <div class="card-body">
            @if(Session::get('message') != '')
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
            @endif
            <h5 class="card-title">{{ $month->month }} {{ $month->year }}</h5>
            <div class="table-responsive">
                <table class="table table-striped table-hover ">
                    <thead class="thead-dark">
                        <tr>
                            <th width="30" class="text-center">No</th>
                            <th width="180" class="text-center">NIP</th>
                            <th class="text-center">Nama</th>
                            <th width="150" class="text-center">Standar Biaya</th>
                            <th width="200" class="text-center">Fasilitas Uang Transportasi</th>
                            <th width="100" class="text-center">Jumlah</th>
                            <th class="text-center" width="200">
                                <a class=" btn btn-primary" href="{{ asset('/') }}transport/create/{{ $month->id }}">
                                    <i class="fas fa-plus"></i></a>
                                <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#uploadTransport">
                                    <i class="fa-sharp fa-solid fa-upload"></i></a>
                                <a class="btn btn-warning" href="{{asset('/')}}transport/pdf/{{ $month->id }}" target="_blank"><i class="fa-regular fa-file-pdf"></i></a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeTransport">
                                    <i class="fas fa-trash"></i></a>
                            </th>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php ($no = 1)
                        @foreach ($rows as $row)
                        @php ($encryptedParams = encrypt(['id' => $row->id, 'nip' => $row->nip_nik]))
                        <tr>
                            <td class="text-center">{{ $no++ }}</td>
                            <td>{{ $row['nip_nik'] }}</td>
                            <td>{{ $row['nama'] }}</td>
                            <td class="text-center">{{ toCurrency($row['standar_biaya']) }}</td>
                            <td class="text-center">{{ $row['fasilitas_uang_transportasi'] }}</td>
                            <td class="text-center">{{ toCurrency($row['jumlah_diterima']) }}</td>
                            <td class="text-center">
                                <a class="btn btn-success" href="{{ asset('/') }}transport/show/{{ $month->id }}/{{ $row->id }}"><i class="fas fa-info-circle"></i></a>
                                <a class="btn btn-secondary" href="{{ asset('/') }}transport/{{ $month->id }}/{{ $row->id }}/edit"><i class="far fa-edit"></i></a>
                                <input type="hidden" class="form-control shareLink" value=" {{asset('/')}}kendaraanpdfshare/{{ $encryptedParams }}" readonly>
                                <button class="btn btn-warning" onclick="copyToClipboard(this, '{{ $row->salam }}')"><i class="fa-solid fa-link"></i></button>
                                <a class="btn btn-danger" href="{{ asset('/') }}transport/{{ $month->id }}/{{ $row->id }}/delete"><i class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="uploadTransport" tabindex="-1" aria-labelledby="uploadTransportLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="uploadTransportLabel">Mengunggah File Uang Transport</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ asset('/transport/import') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="mb-3 row">
                        <label for="point" class="col-sm-2 col-form-label">File</label>
                        <div class="col-sm-12">
                            <input class="form-control" type="file" name="file" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="month_id" value="{{ $month->id }}">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="Submit" class="btn btn-primary">Unggah</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="removeTransport" tabindex="-1" aria-labelledby="removeTransportLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="removeTransportLabel">Menghapus Data Uang Transport</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        PERINGATAN!!!<br>
                        SEMUA data uang Transport pada bulan ini akan DIHAPUS!!!
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="month_id" value="{{ $month->id }}">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <a class="btn btn-danger" href="{{ asset('/') }}transport/remove/{{ $month->id }}">Hapus</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection