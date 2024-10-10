@extends('layouts.app')

@section('title')
Data Satker 
@endsection

@section('content')
<div class="container">
    <div class="card border-success">
        <h5 class="card-header text-bg-success"> Data Satuan Kerja</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover ">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center" width="50px">No</th>
                            <th class="text-center" width="100px">Kode</th>
                            <th class="text-center" width="275px">Nama</th>
                            <th class="text-center">Alamat</th>
                            <!-- <th class="text-center">Created_at</th> -->
                            <th class="text-center" width="180px">Waktu</th>
                            <th class="text-center" width="180px"><a class=" btn btn-primary" href="{{ asset('/') }}satker/create">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach($rows as $row)
                        <tr>
                            <td class="text-center">{{ $no++ }}.</td>
                            <td>{{ $row['kode'] }}</td>
                            <td>{{ $row['nama'] }}</td>
                            <td>{{ $row['alamat'] }}</td>
                            <!-- <td>{{ $row['created_at'] }}</td> -->
                            <td>{{ $row['updated_at'] }}</td>
                            <td align="center">
                                <a class="btn btn-success" href="{{ asset('/') }}satker/{{ $row->id }}"><i
                                        class="fas fa-info-circle"></i></a>
                                <a class="btn btn-secondary" href="{{ asset('/') }}satker/{{ $row->id }}/edit"><i
                                        class="far fa-edit"></i></a>
                                <a class="btn btn-danger" href="{{ asset('/') }}satker/{{ $row->id }}/delete"><i
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
@endsection