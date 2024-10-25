@extends('layouts.app')

@section('title')
Data Salaries 
@endsection

@section('content')
<div class="container">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ asset('/months') }}">Data</a></li>
      <li class="breadcrumb-item active" aria-current="page">Potongan</li>
    </ol>
  </nav>
  <div class="card border-success">
    <h5 class="card-header text-bg-success"> Data Potongan </h5>
    <div class="card-body">
      @if(Session::get('message') != '')
      <div class="alert alert-danger">{{ Session::get('message') }}</div>
      @endif
      <h5 class="card-title">{{$month->month}} {{$month->year}}</h5>
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
            <tr class="align-middle text-center table-primary">
              <th>No</th>
              <th>NIP</th>
              <th>Nama</th>
              <th>Gol</th>
              <!-- <th width="200">Rekening</th> -->
              <!-- <th>Bank</th> -->
              <th width="100">Bersih</th>
              <!-- <th>P1</th>
              <th>P2</th>
              <th>P3</th>
              <th>P4</th>
              <th>P5</th>
              <th>P6</th>
              <th>P7</th>
              <th>P9</th>
              <th>P10</th>
              <th>P11</th>
              <th>P12</th>
              <th>P13</th>
              <th>P14</th>
              <th>P15</th> -->
              <th width="100">Potongan</th>
              <th width="100">Bayar</th>
              <!-- <th>Created_at</th>
              <th>Updated_at</th> -->
              <th class="text-end" width="150">
                <a class="btn btn-primary" href="{{asset('/')}}salaries/create/{{ $month->id }}">
                  <i class="fas fa-plus"></i></a>
                <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#uploadSalaries">
                  <i class="fa-sharp fa-solid fa-upload"></i></a>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeSalaries">
                  <i class="fas fa-trash"></i></a>
              </th>
            </tr>
          </thead>
          <tbody>
            @php ($no = 1)
            @foreach ($rows as $row)
            <tr class="align-middle">
              <td>{{ $no++ }}.</td>
              <td>{{ $row['nip'] }}</td>
              <td>{{ $row['name'] }}</td>
              <td class="text-center">{{ $row['gol'] }}</td>
              <!-- <td class="text-center">{{ $row['rekening'] }}</td> -->
              <!-- <td>{{ $row['bank'] }}</td> -->
              <td class="text-end">{{ toCurrency($row['bersih']) }}</td>
              <!-- <td>{{ $row['p1'] }}</td>
              <td>{{ $row['p2'] }}</td>
              <td>{{ $row['p3'] }}</td>
              <td>{{ $row['p4'] }}</td>
              <td>{{ $row['p5'] }}</td>
              <td>{{ $row['p6'] }}</td>
              <td>{{ $row['p7'] }}</td>
              <td>{{ $row['p9'] }}</td>
              <td>{{ $row['p10'] }}</td>
              <td>{{ $row['p11'] }}</td>
              <td>{{ $row['p12'] }}</td>
              <td>{{ $row['p13'] }}</td>
              <td>{{ $row['p14'] }}</td>
              <td>{{ $row['p15'] }}</td> -->
              <td class="text-end">{{ toCurrency($row['point']) }}</td>
              <td class="text-end">{{ toCurrency($row['bayar']) }}</td>
              <!-- <td>{{ $row['created_at'] }}</td>
              <td>{{ $row['updated_at'] }}</td> -->
              <td class="text-end">
                <a class="btn btn-success" href="{{asset('/')}}salaries/show/{{ $month->id }}/{{ $row->id }}"><i class="fas fa-file-invoice"></i></i></a>
                <a class="btn btn-secondary" href="{{asset('/')}}salaries/{{ $month->id }}/{{ $row->id }}/edit"><i class="far fa-edit"></i></a>
                <a class="btn btn-danger" href="{{asset('/')}}salaries/{{ $month->id }}/{{ $row->id }}/delete"><i class="far fa-trash-alt"></i></a>
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
<div class="modal fade" id="uploadSalaries" tabindex="-1" aria-labelledby="uploadSalariesLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="uploadSalariesLabel">Mengunggah File Potongan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ asset('/salaries/import') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="mb-3 row">
            <label for="point" class="col-sm-2 col-form-label">File</label>
            <div class="col-sm-10">
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
<div class="modal fade" id="removeSalaries" tabindex="-1" aria-labelledby="removeSalariesLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="removeSalariesLabel">Menghapus Data Potongan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3 row">
          <div class="col-sm-12">
            PERINGATAN!!!<br>
            SEMUA data potongan pada bulan ini akan DIHAPUS!!!
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="month_id" value="{{ $month->id }}">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <a class="btn btn-danger" href="{{asset('/')}}salaries/remove/{{ $month->id }}">Hapus</a>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection