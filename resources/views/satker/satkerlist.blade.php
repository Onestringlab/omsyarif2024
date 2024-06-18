@extends('layouts.app')

@section('title')
Data Satker 
@endsection

@section('content')
<div class="container">
    <div class="card">
        <h5 class="card-header"> Data Satker</h5>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover ">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <!-- <th>Created_at</th> -->
                            <th>Updated at</th>
                            <th><a href="{{ asset('/') }}satker/create">
                                    <i class="fas fa-plus"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                            @foreach($rows as $row)
                                <tr>
                                    <td>{{ $row['id'] }}.</td>
                                    <td>{{ $row['kode'] }}</td>
                                    <td>{{ $row['nama'] }}</td>
                                    <td>{{ $row['alamat'] }}</td>
                                    <!-- <td>{{ $row['created_at'] }}</td> -->
                                    <td>{{ $row['updated_at'] }}</td>
                                    <td align="center">
                                        <a href="{{ asset('/') }}satker/{{ $row->id }}"><i
                                                class="fas fa-info-circle"></i></a>
                                        <a href="{{ asset('/') }}satker/{{ $row->id }}/edit"><i
                                                class="far fa-edit"></i></a>
                                        <a href="{{ asset('/') }}satker/{{ $row->id }}/delete"><i
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
