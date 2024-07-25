@extends('layouts.app')

@section('title')
Slip Potongan
@endsection

@section('content')
<div class="container">
	<div class="card border-success">
		<h5 class="card-header text-bg-success"> Slip Potongan</h5>
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
				<th>Potongan</th>
				{{-- <th>Dibayarkan</th> --}}
				<th width="90"></th>
				</tr>
			</thead>
			<tbody>
				@php ($no = 1)
				@foreach ($rows as $row)
				<tr>
				<td>{{ $row->months->month }} {{ $row->months->year }}</td>
				<td>{{ toCurrency($row['point']) }}</td>
				{{-- <td>{{ toCurrency($row['bayar']) }}</td> --}}
				<td>
					<a class="btn btn-primary btn-sm" href=" {{asset('/')}}dibayarkan/{{ $row->id }}">
					<i class="fas fa-receipt"></i>
					</a>
					<a class="btn btn-danger btn-sm" href="{{asset('/')}}dibayarkanpdf/{{ $row->id }}" target="_blank">
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