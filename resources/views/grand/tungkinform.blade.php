@extends('layouts.app')

@section('title')
Tunjangan Kinerja
@endsection

@section('content')
<div class="container">
    <script>
    function button_cancel() {
        location.replace("{{ asset('/') }}tungkinlist");
    }
    </script>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ asset('/tungkinlist') }}">Tunjangan Kinerja</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
            {{ $row->months->month }} {{ $row->months->year }}
        </li>
        </ol>
    </nav>
    <div class="card border-success">
        <h5 class="card-header text-bg-success"> Tunjangan Kinerja
            {{ $row->months->month }} {{ $row->months->year }}
        </h5>
        <div class="card-body">
            <form class="form-horizontal" action="{{ asset('/') }}tungkinedit" method="post">
                <div class="mb-3 row">
                    <label for="status" class="col-sm-2 col-form-label"><strong>Status</strong></label>
                    <div class="col-sm-10">
                    <select class="form-control" type="text" name="status">
                        <option value="Setuju" {{ $row->status === "Setuju" ? "selected" : ""}}>Setuju</option>
                        <option value="Tidak Setuju" {{ $row->status === "Tidak Setuju" ? "selected" : ""}}>Tidak Setuju</option>
                    </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alasan" class="col-sm-2 col-form-label"><strong>Alasan</strong></label>
                    <div class="col-sm-10">
                    <input class="form-control" type="text" name="alasan" value="{{ $row->alasan }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="offset-sm-2 col-sm-10">
                    <input type="hidden" name="id" value="{{ $row->id }}">
                    <input type="hidden" name="month_id" value="{{ $row->month_id }}">
                    <button type="submit" class="btn btn-warning">Simpan</button>
                    <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
                    </div>
                </div>
                {{ csrf_field() }}
        </form>
        </div>
    </div>
</div>
@endsection