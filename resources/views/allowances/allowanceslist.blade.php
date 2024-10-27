@extends('layouts.app')

@section('title')
Data Gaji
@endsection

@section('content')
<div class="container">
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ asset('/months') }}">Data</a></li>
      <li class="breadcrumb-item active" aria-current="page">Gaji</li>
    </ol>
  </nav>
  <div class="card">
    <h5 class="card-header text-bg-success"> Data Gaji</h5>
    <div class="card-body">
      @if(Session::get('message') != '')
      <div class="alert alert-danger">{{ Session::get('message') }}</div>
      @endif
      <h5 class="card-title">{{$month->month}} {{$month->year}}</h5>
      <div class="table-responsive">
        <table class="table table-striped table-hover ">
          <thead class="thead-dark">
            <tr class="align-middle text-center">
              <th>No</th>
              <!-- <th>Month_id</th> -->
              <th>NIP</th>
              <th>Nama</th>
              <!-- <th>Npwp</th> -->
              <!-- <th width="200">Rekening</th> -->
              <!-- <th>Nmbankspan</th> -->
              <th width="100">Pokok</th>
              <!-- <th>Tjistri</th>
              <th>Tjanak</th>
              <th>Tjupns</th>
              <th>Tjstruk</th>
              <th>Tjfungs</th>
              <th>Tjdaerah</th>
              <th>Tjpencil</th>
              <th>Tjlain</th>
              <th>Tjkompen</th>
              <th>Pembul</th>
              <th>Tjberas</th>
              <th>Tjpph</th> -->
              <th width="100">Kotor</th>
              <!-- <th>Potpfkbul</th>
              <th>Potpfk2</th>
              <th>Potpfk10</th>
              <th>Potpph</th>
              <th>Potswrum</th>
              <th>Potkelbtj</th>
              <th>Potlain</th>
              <th>Pottabrum</th> 
              <th>BPJS</th>
              <th>BPJS2</th> -->
              <th width="100">Potongan</th>
              <th width="100">Gaji Bersih</th>
              <!-- <th>Created_at</th>
              <th>Updated_at</th> -->
              <th class="text-center" width="150">
                <a class=" btn btn-primary" href="{{asset('/')}}allowances/create/{{ $month->id }}">
                  <i class="fas fa-plus"></i></a>
                <a class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#uploadAllowances">
                  <i class="fa-sharp fa-solid fa-upload"></i></a>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#removeAllowances">
                  <i class="fas fa-trash"></i></a>
              </th>
            </tr>
          </thead>
          <tbody>
            @php ($no = 1)
            @foreach ($rows as $row)
            <tr class="align-middle">
              <td>{{ $no++ }}.</td>
              <!-- <td>{{ $row['month_id'] }}</td> -->
              <td>{{ $row['nip'] }}</td>
              <td>{{ $row['nmpeg'] }}</td>
              <!-- <td>{{ $row['npwp'] }}</td> -->
              <!-- <td class="text-center">{{ $row['rekening'] }}</td> -->
              <!-- <td>{{ $row['nmbankspan'] }}</td> -->
              <td class="text-end">{{ toCurrency($row['gjpokok']) }}</td>
              <!-- <td>{{ $row['tjistri'] }}</td>
              <td>{{ $row['tjanak'] }}</td>
              <td>{{ $row['tjupns'] }}</td>
              <td>{{ $row['tjstruk'] }}</td>
              <td>{{ $row['tjfungs'] }}</td>
              <td>{{ $row['tjdaerah'] }}</td>
              <td>{{ $row['tjpencil'] }}</td>
              <td>{{ $row['tjlain'] }}</td>
              <td>{{ $row['tjkompen'] }}</td>
              <td>{{ $row['pembul'] }}</td>
              <td>{{ $row['tjberas'] }}</td>
              <td>{{ $row['tjpph'] }}</td> -->
              <td class="text-end">{{ toCurrency($row['kotor']) }}</td>
              <!-- <td>{{ $row['potpfkbul'] }}</td>
              <td>{{ $row['potpfk2'] }}</td>
              <td>{{ $row['potpfk10'] }}</td>
              <td>{{ $row['potpph'] }}</td>
              <td>{{ $row['potswrum'] }}</td>
              <td>{{ $row['potkelbtj'] }}</td>
              <td>{{ $row['potlain'] }}</td>
              <td>{{ $row['pottabrum'] }}</td> 
              <td>{{ $row['bjps'] }}</td>
              <td>{{ $row['bpjs2'] }}</td> -->
              <td class="text-end">{{ toCurrency($row['totpot']) }}</td>
              <td class="text-end">{{ toCurrency($row['bersih']) }}</td>
              <!-- <td>{{ $row['created_at'] }}</td>
              <td>{{ $row['updated_at'] }}</td> -->
              <td class=" text-center">
                <a class="btn btn-success" href="{{asset('/')}}allowances/show/{{ $month->id }}/{{ $row->id }}"><i class="fas fa-info-circle"></i></a>
                <a class="btn btn-secondary" href="{{asset('/')}}allowances/{{ $month->id }}/{{ $row->id }}/edit"><i class="far fa-edit"></i></a>
                <a class="btn btn-danger" href="{{asset('/')}}allowances/{{ $month->id }}/{{ $row->id }}/delete"><i class="far fa-trash-alt"></i></a>
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
<div class="modal fade" id="uploadAllowances" tabindex="-1" aria-labelledby="uploadAllowancesLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="uploadAllowancesLabel">Mengunggah File Gaji</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" action="{{ asset('/allowances/import') }}" method="post" enctype="multipart/form-data">
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
<div class="modal fade" id="removeAllowances" tabindex="-1" aria-labelledby="removeAllowancesLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="removeSalariesLabel">Menghapus Data Gaji</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3 row">
          <div class="col-sm-12">
            PERINGATAN!!!<br>
            SEMUA data gaji pada bulan ini akan DIHAPUS!!!
          </div>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="month_id" value="{{ $month->id }}">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <a class="btn btn-danger" href="{{asset('/')}}allowances/remove/{{ $month->id }}">Hapus</a>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection