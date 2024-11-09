@extends('layouts.app')

@section('title')
Presensi
@endsection

@section('content')
<div class="container">
  <div class="card border-success">
    <h5 class="card-header text-bg-success">Rekapitulasi Kehadiran untuk Perhitungan Tunjangan Kinerja</h5>
    <div class="card-body">
      <h5 class="card-title">
        {{Auth::user()->name}}<br>
        {{Auth::user()->nip}}
      </h5>
      <div class="table-responsive">
        <table class="table table-striped table-hover ">
          <thead class="thead-dark">
            <tr class="table-primary">
              <th>Bulan</th>
              <th>Hadir</th>
              <th width="90">Status</th>
              <th width="90"></th>
            </tr>
          </thead>
          <tbody>
            @php ($no = 1)
            @foreach ($rows as $row)
            <tr>
              <td>{{ $row->months->month }} {{ $row->months->year }}</td>
              <td>{{ $row['tk'] }} Hari</td>
              <td>{{ $row['status'] }}</td>
              <td>
                <a class="btn text-light btn-info btn-sm" href="{{asset('/')}}presensi/{{ $row->id }}">
                  <i class="fa-solid fa-calendar-check"></i>
                </a>
                <a class="btn btn-secondary btn-sm" href="{{asset('/')}}presensiform/{{ $row->id }}">
                  <i class="far fa-edit"></i>
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