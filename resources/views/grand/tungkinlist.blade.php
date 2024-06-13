@extends('layouts.app')

@section('title')
Tunjangan Kinerja
@endsection

@section('content')
<div class="container">
  <div class="card border-success">
    <h5 class="card-header text-bg-success"> Tunjangan Kinerja </h5>
    <div class="card-body">
      <h5 class="card-title">
        {{Auth::user()->name}}<br>
        {{Auth::user()->nip}}
      </h5>
      <div class="table-responsive">
        <table class="table table-striped table-hover ">
          <thead class="thead-dark">
            <tr class="align-middle text-center table-primary">
              <!-- <th width="40">No</th> -->
              <th>Bulan</th>
              <!-- <th width="150">Tunjangan</th> -->
              <!-- <th width="150">Tunjangan Setelah Potongan</th> -->
              <th>Netto</th>
              <th>Status</th>
              <!-- <th>Alasan</th> -->
              <th width="90"></th>
            </tr>
          </thead>
          <tbody>
            @php ($no = 1)
            @foreach ($rows as $row)
            <tr>
              <!-- <td class="text-center">{{ $no++ }}.</td> -->
              <td class="text-center">{{ $row->months->month }} {{ $row->months->year }}</td>
              <!-- <td class="text-end">{{ toCurrency($row['tunjangan']) }}</td> -->
              <!-- <td class="text-end">{{ toCurrency($row['jumtunjsetpot']) }}</td> -->
              <td class="text-end">{{ toCurrency($row['netto']) }}</td>
              <td class="text-center">{{ $row['status'] }}</td>
              <!-- <td>{{ $row['alasan'] }}</td> -->
              <td>
                <a class="btn text-light btn-info btn-sm" href=" {{asset('/')}}tungkin/{{ $row->id }}">
                  <i class="fa-solid fa-calendar-check"></i>
                </a>
                <a class="btn btn-secondary btn-sm" href="{{asset('/')}}tungkinform/{{ $row->id }}">
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