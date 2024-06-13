@extends('layouts.app')

@section('title')
Data Grand 
@endsection

@section('content')
<div class="container">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ asset('/months') }}">Data</a></li>
      <li class="breadcrumb-item active" aria-current="page">Tunjangan Kinerja</li>
    </ol>
  </nav>
  <div class="card">
    <h5 class="card-header text-bg-success"> Data Tunjangan Kinerja</h5>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped table-hover ">
          <thead class="thead-dark">
            <tr class="align-middle">
              <th width="30" class="text-center">No</th>
              <!-- <th>Month_id</th> -->
              <th width="180" class="text-center">NIP</th>
              <th width="250" class="text-center">Nama</th>
              <!-- <th>Npwp</th> -->
              <!-- <th>Panggol</th> -->
              <!-- <th>Jabatan</th> -->
              <!-- <th>Grad</th> -->
              <!-- <th>Maxmedmin</th> -->
              <th width="100" class="text-center">Tunjangan</th>
              <!-- <th>Potabs</th> -->
              <!-- <th>Potkim</th> -->
              <!-- <th>Jumlahpot</th> -->
              <th width="150" class="text-center">Tunjangan Setelah Potongan</th>
              <!-- <th>Tunjpph</th> -->
              <!-- <th>Bruto</th> -->
              <!-- <th>Potpph</th> -->
              <th width="100" class="text-center">Netto</th>
              <th width="120" class="text-center">Status</th>
              <th class="text-center">Alasan</th>
              <!-- <th>Created_at</th> -->
              <!-- <th>Updated_at</th> -->
              <th class="text-center" width="150">
                <a class=" btn btn-primary" href="{{asset('/')}}grand/create/{{ $month->id }}">
                  <i class="fas fa-plus"></i></a>
                <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#uploadGrands">
                  <i class="fa-sharp fa-solid fa-upload"></i></a>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeGrands">
                  <i class="fas fa-trash"></i></a>
              </th>
            </tr>
          </thead>
          <tbody>
            @php ($no = 1)
            @foreach ($rows as $row)
            <tr>
              <td>{{ $no++ }}.</td>
              <!-- <td>{{ $row['month_id'] }}</td> -->
              <td>{{ $row['nip'] }}</td>
              <td>{{ $row['nama'] }}</td>
              <!-- <td>{{ $row['npwp'] }}</td> -->
              <!-- <td>{{ $row['panggol'] }}</td> -->
              <!-- <td>{{ $row['jabatan'] }}</td> -->
              <!-- <td>{{ $row['grad'] }}</td> -->
              <!-- <td>{{ $row['maxmedmin'] }}</td> -->
              <td class="text-end">{{ toCurrency($row['tunjangan']) }}</td>
              <!-- <td>{{ $row['potabs'] }}</td> -->
              <!-- <td>{{ $row['potkim'] }}</td> -->
              <!-- <td>{{ $row['jumlahpot'] }}</td> -->
              <td class="text-end">{{ toCurrency($row['jumtunjsetpot']) }}</td>
              <!-- <td>{{ $row['tunjpph'] }}</td> -->
              <!-- <td>{{ $row['bruto'] }}</td> -->
              <!-- <td>{{ $row['potpph'] }}</td> -->
              <td class="text-end">{{ toCurrency($row['netto']) }}</td>
              <td class="text-center">{{ $row['status'] }}</td>
              <td>{{ $row['alasan'] }}</td>
              <!-- <td>{{ $row['created_at'] }}</td> -->
              <!-- <td>{{ $row['updated_at'] }}</td> -->
              <td class=" text-center">
                <a class="btn btn-success" href="{{asset('/')}}grand/show/{{ $month->id }}/{{ $row->id }}"><i class="fas fa-info-circle"></i></a>
                <a class="btn btn-secondary" href="{{asset('/')}}grand/{{ $month->id }}/{{ $row->id }}/edit"><i class="far fa-edit"></i></a>
                <a class="btn btn-danger" href="{{asset('/')}}grand/{{ $month->id }}/{{ $row->id }}/delete"><i class="far fa-trash-alt"></i></a>
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
<div class="modal fade" id="uploadGrands" tabindex="-1" aria-labelledby="uploadGrandsLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="uploadGrandsLabel">Mengunggah File Tunjangan Kinerja</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ asset('/grand/import') }}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          <div class="mb-3 row">
            <label for="point" class="col-sm-2 col-form-label">File</label>
            <div class="col-sm-12">
              <input class="form-control" type="file" name="file" required>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="month_id" value="{{ $month->id }}">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="Submit" class="btn btn-primary">Upload</button>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="removeGrands" tabindex="-1" aria-labelledby="removeGrandsLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="removeSalariesLabel">Menghapus Data Tunjangan Kinerja</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3 row">
          <div class="col-sm-12">
            PERINGATAN!!!<br>
            SEMUA data tunjangan kinerja pada bulan ini akan DIHAPUS!!!
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="month_id" value="{{ $month->id }}">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a class="btn btn-danger" href="{{asset('/')}}grand/remove/{{ $month->id }}">Delete</a>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection