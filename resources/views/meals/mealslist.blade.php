@extends('layouts.app')

@section('title')
Uang Makan 
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
            <li class="breadcrumb-item active" aria-current="page">Uang Makan</li>
        </ol>
    </nav>
    <div class="card">
        <h5 class="card-header text-bg-success"> Data Uang Makan</h5>
        <div class="card-body">
            @if(Session::get('message') != '')
            <div class="alert alert-danger">{{ Session::get('message') }}</div>
            @endif
            <h5 class="card-title">{{ $month->month }} {{ $month->year }}</h5>
            <div class="table-responsive">
                <table class="table table-striped table-hover ">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Hari</th>
                            <th>Tarif</th>
                            <th>PPH</th>
                            <th>Kotor</th>
                            <th>Potongan</th>
                            <th>Bersih</th>
                            <th class="text-center" width="150">
                                <a class=" btn btn-primary"
                                    href="{{ asset('/') }}meals/create/{{ $month->id }}">
                                    <i class="fas fa-plus"></i></a>
                                <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#uploadMeals">
                                    <i class="fa-sharp fa-solid fa-upload"></i></a>
                                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeMeals">
                                    <i class="fas fa-trash"></i></a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach($rows as $row)
                        <tr>
                            <td>{{ $no++ }}.</td>
                            <td>{{ $row['nip'] }}</td>
                            <td>{{ $row['nmpeg'] }}</td>
                            <td>{{ $row['jmlhari'] }}</td>
                            <td>{{ toCurrency($row['tarif']) }}</td>
                            <td>{{ $row['pph'] }}</td>
                            <td>{{ toCurrency($row['kotor']) }}</td>
                            <td>{{ toCurrency($row['potongan']) }}</td>
                            <td>{{ toCurrency($row['bersih']) }}</td>
                            <td align="center">
                                <a class="btn btn-success"
                                    href="{{ asset('/') }}meals/show/{{ $month->id }}/{{ $row->id }}"><i
                                        class="fas fa-info-circle"></i></a>
                                <a class="btn btn-secondary"
                                    href="{{ asset('/') }}meals/{{ $month->id }}/{{ $row->id }}/edit"><i
                                        class="far fa-edit"></i></a>
                                <a class="btn btn-danger"
                                    href="{{ asset('/') }}meals/{{ $month->id }}/{{ $row->id }}/delete"><i
                                        class="far fa-trash-alt"></i></a>
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
<div class="modal fade" id="uploadMeals" tabindex="-1" aria-labelledby="uploadMealsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="uploadMealsLabel">Mengunggah File Uang Makan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ asset('/meals/import') }}" method="post"
                    enctype="multipart/form-data">
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
<div class="modal fade" id="removeMeals" tabindex="-1" aria-labelledby="removeMealsLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="removeSalariesLabel">Menghapus Data Uang Makan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        PERINGATAN!!!<br>
                        SEMUA data uang makan pada bulan ini akan DIHAPUS!!!
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="month_id" value="{{ $month->id }}">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <a class="btn btn-danger"
                        href="{{ asset('/') }}meals/remove/{{ $month->id }}">Hapus</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection