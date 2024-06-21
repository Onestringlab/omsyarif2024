@extends('layouts.app')

@section('title')
Data Satker 
@endsection

@section('content')
<div class="container">
    <script>
        function button_cancel() {
            location.replace("{{ asset('/') }}satker");
        }

    </script>
    <div class="card border-success">
        <h5 class="card-header text-bg-success"> Data Satuan Kerja</h5>
        <div class="card-body">
            @if($action == 'insert')
                <form class="form-horizontal" action="{{ asset('/') }}satker" method="post">
                    <div class="mb-3 row">
                        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="kode" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nama" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="alamat" value="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="offset-sm-2 col-sm-10">
                            <input type="hidden" name="action" value="{{ $action }}">
                            <button type="submit" class="btn btn-primary">Insert</button>
                            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Cancel</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            @elseif($action == 'update')
                <form class="form-horizontal" action="{{ asset('/') }}satker/{{ $row->id }}"
                    method="post">
                    <div class="mb-3 row">
                        <label for="kode" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="kode" value="{{ $row->kode }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nama" value="{{ $row->nama }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="alamat" value="{{ $row->alamat }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="offset-sm-2 col-sm-10">
                            @method("PATCH")
                            <input type="hidden" name="action" value="{{ $action }}">
                            <input type="hidden" name="id" value="{{ $row->id }}">
                            <button type="submit" class="btn btn-warning">Update</button>
                            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Cancel</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            @elseif($action == 'delete')
                <form class="form-horizontal" action="{{ asset('/') }}satker/{{ $row->id }}"
                    method="post">
                    <div class="mb-3 row">
                        <label for="kode" class="col-sm-2 control-label">Kode</label>
                        <div class="col-sm-10">
                            {{ $row->kode }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            {{ $row->nama }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            {{ $row->alamat }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="offset-sm-2 col-sm-10">
                            @method("DELETE")
                            <input type="hidden" name="action" value="{{ $action }}">
                            <input type="hidden" name="id" value="{{ $row->id }}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Cancel</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            @elseif($action == 'detail')
                <div class="mb-3 row">
                    <label for="kode" class="col-sm-2 control-label">Kode</label>
                    <div class="col-sm-10">
                        {{ $row->kode }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 control-label">Nama</label>
                    <div class="col-sm-10">
                        {{ $row->nama }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                    <div class="col-sm-10">
                        {{ $row->alamat }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="button" class="btn btn-secondary" onclick="button_cancel()">Back</button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
