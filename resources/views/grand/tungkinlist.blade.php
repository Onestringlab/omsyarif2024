@extends('layouts.app')

@section('title')
Tunjangan Kinerja
@endsection

@section('content')
<div class="container">
  <div class="card border-success">
    <h5 class="card-header text-bg-success">Slip Tunjangan Kinerja </h5>
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
              <th>Jumlah Bersih</th>
              <th>Status</th>
              <th width="120"></th>
            </tr>
          </thead>
          <tbody>
            @php ($no = 1)
            @foreach ($rows as $row)
            <tr>
              <td>{{ $row->months->month }} {{ $row->months->year }}</td>
              <td>{{ toCurrency($row['netto']) }}</td>
              <td>{{ $row['status'] }}</td>
              <td>
                <a class="btn text-light btn-info btn-sm" href=" {{asset('/')}}tungkin/{{ $row->id }}">
                  <i class="fa-solid fa-calendar-check"></i>
                </a>
                <a class="btn btn-secondary btn-sm" href="{{asset('/')}}tungkinform/{{ $row->id }}">
                  <i class="far fa-edit"></i>
                </a>
                <a class="btn btn-danger btn-sm"
                  href=" {{ asset('/') }}tungkinpdf/{{ $row->id }}"
                  target="_blank">
                  <i class="fa-regular fa-file-pdf"></i>
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