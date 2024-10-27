@extends('layouts.app')

@section('title')
Data potongans 
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
            <tr class="align-middle table-primary">
              <th width="50">No</th>
              <th width="200">NIP</th>
              <th>Nama</th>
              <th width="100">Jumlah</th>
              <!-- <th width="180">Waktu</th> -->
              <th class="text-end" width="150">
                <a class="btn btn-primary" href="{{asset('/')}}potongans/create/{{ $month->id }}">
                  <i class="fas fa-plus"></i></a>
                <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#uploadpotongans">
                  <i class="fa-sharp fa-solid fa-upload"></i></a>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removepotongans">
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
              <td>{{ $row['nama'] }}</td>
              <td class="text-end">{{ toCurrency($row['jumlah']) }}</td>
              <!-- <td>{{ $row['updated_at'] }}</td> -->
              <td class="text-end">
                <a class="btn btn-success" href="{{asset('/')}}potongans/show/{{ $month->id }}/{{ $row->id }}"><i class="fas fa-file-invoice"></i></i></a>
                <a class="btn btn-secondary" href="{{asset('/')}}potongans/{{ $month->id }}/{{ $row->id }}/edit"><i class="far fa-edit"></i></a>
                <a class="btn btn-danger" href="{{asset('/')}}potongans/{{ $month->id }}/{{ $row->id }}/delete"><i class="far fa-trash-alt"></i></a>
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
<div class="modal fade" id="uploadpotongans" tabindex="-1" aria-labelledby="uploadpotongansLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="uploadpotongansLabel">Mengunggah File Potongan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ asset('/potongans/import') }}" method="post" enctype="multipart/form-data">
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
<div class="modal fade" id="removepotongans" tabindex="-1" aria-labelledby="removepotongansLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="removepotongansLabel">Menghapus Data Potongan</h1>
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
          <a class="btn btn-danger" href="{{asset('/')}}potongans/remove/{{ $month->id }}">Hapus</a>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection