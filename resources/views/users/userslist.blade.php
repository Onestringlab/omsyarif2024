@extends('layouts.app')

@section('title')
Data Users 
@endsection

@section('content')
<div class="container">
  <div class="card border-success">
    <h5 class="card-header text-bg-success"> Data Pengguna</h5>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover ">
          <thead class="thead-dark">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th class="text-center">NIP</th>
              <th class="text-center">Email</th>
              <th class="text-center" width="180px">Waktu</th>
              <th class="text-center" width="150px">
                <a class="btn btn-primary" href="{{asset('/')}}users/create">
                  <i class="fas fa-plus"></i>
                </a>
              </th>
            </tr>
          </thead>
          <tbody>
            @php ($no = 1)
            @foreach ($rows as $row)
            <tr>
              <td>{{ $no++ }}.</td>
              <td>{{ $row['name'] }}</td>
              <td class="text-center">{{ $row['nip'] }}</td>
              <td>{{ $row['email'] }}</td>
              <td class="text-center">{{ $row['updated_at'] }}</td>
              <td class="text-center">
                <a class="btn btn-success" href="{{asset('/')}}users/{{ $row->id }}">
                  <i class="fas fa-info-circle"></i>
                </a>
                <a class="btn btn-secondary" href="{{asset('/')}}users/{{ $row->id }}/edit">
                  <i class="far fa-edit"></i>
                </a>
                <a class="btn btn-danger" href="{{asset('/')}}users/{{ $row->id }}/delete">
                  <i class="far fa-trash-alt"></i>
                </a>
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