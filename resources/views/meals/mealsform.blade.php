@extends('layouts.app')

@section('title')
Data Meals 
@endsection

@section('content')
<div class="container">
    <script>
        function button_cancel() {
            location.replace("{{ asset('/') }}meals/data/{{ $month_id }}");
        }
    </script>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/months') }}">Data</a></li>
            <li class="breadcrumb-item"><a
                    href="{{ asset('/') }}meals/data/{{ $month_id }}">Uang Makan</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($action) }}</li>
        </ol>
    </nav>
    <div class="card">
        <h5 class="card-header text-bg-success"> Data Meals</h5>
        <div class="card-body">
            @if($action == 'insert')
                <form class="form-horizontal" action="{{ asset('/') }}meals" method="post">
                    <div class="mb-3 row">
                        <label for="nogaji" class="col-sm-2 col-form-label">Nogaji</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nogaji" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 col-form-label">Nip</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nip" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nmpeg" class="col-sm-2 col-form-label">Nmpeg</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nmpeg" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kdgol" class="col-sm-2 col-form-label">Kdgol</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="kdgol" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jmlhari" class="col-sm-2 col-form-label">Jmlhari</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="jmlhari" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tarif" class="col-sm-2 col-form-label">Tarif</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="tarif" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pph" class="col-sm-2 col-form-label">Pph</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="pph" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kotor" class="col-sm-2 col-form-label">Kotor</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="kotor" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="potongan" class="col-sm-2 col-form-label">Potongan</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="potongan" value="">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="bersih" class="col-sm-2 col-form-label">Bersih</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="bersih" value="">
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="offset-sm-2 col-sm-10">
                            <input type="hidden" name="action" value="{{ $action }}">
                            <input type="hidden" name="month_id" value="{{ $month_id }}">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            @elseif($action == 'update')
                <form class="form-horizontal" action="{{ asset('/') }}meals/{{ $row->id }}"
                    method="post">
                    <div class="mb-3 row">
                        <label for="nogaji" class="col-sm-2 col-form-label">Nogaji</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nogaji" value="{{ $row->nogaji }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 col-form-label">Nip</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nip" value="{{ $row->nip }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nmpeg" class="col-sm-2 col-form-label">Nmpeg</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nmpeg" value="{{ $row->nmpeg }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kdgol" class="col-sm-2 col-form-label">Kdgol</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="kdgol" value="{{ $row->kdgol }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jmlhari" class="col-sm-2 col-form-label">Jmlhari</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="jmlhari" value="{{ $row->jmlhari }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tarif" class="col-sm-2 col-form-label">Tarif</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="tarif" value="{{ $row->tarif }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pph" class="col-sm-2 col-form-label">Pph</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="pph" value="{{ $row->pph }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kotor" class="col-sm-2 col-form-label">Kotor</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="kotor" value="{{ $row->kotor }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="potongan" class="col-sm-2 col-form-label">Potongan</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="potongan" value="{{ $row->potongan }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="bersih" class="col-sm-2 col-form-label">Bersih</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="bersih" value="{{ $row->bersih }}">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="offset-sm-2 col-sm-10">
                            @method("PATCH")
                            <input type="hidden" name="action" value="{{ $action }}">
                            <input type="hidden" name="id" value="{{ $row->id }}">
                            <input type="hidden" name="month_id" value="{{ $month_id }}">
                            <button type="submit" class="btn btn-warning">Simpan</button>
                            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            @elseif($action == 'delete')
                <form class="form-horizontal" action="{{ asset('/') }}meals/{{ $row->id }}"
                    method="post">
                    <div class="mb-3 row">
                        <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                        <div class="col-sm-10">
                            {{ $row->tanggal }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nogaji" class="col-sm-2 control-label">Nogaji</label>
                        <div class="col-sm-10">
                            {{ $row->nogaji }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nip" class="col-sm-2 control-label">Nip</label>
                        <div class="col-sm-10">
                            {{ $row->nip }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nmpeg" class="col-sm-2 control-label">Nmpeg</label>
                        <div class="col-sm-10">
                            {{ $row->nmpeg }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kdgol" class="col-sm-2 control-label">Kdgol</label>
                        <div class="col-sm-10">
                            {{ $row->kdgol }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jmlhari" class="col-sm-2 control-label">Jmlhari</label>
                        <div class="col-sm-10">
                            {{ $row->jmlhari }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tarif" class="col-sm-2 control-label">Tarif</label>
                        <div class="col-sm-10">
                            {{ $row->tarif }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pph" class="col-sm-2 control-label">Pph</label>
                        <div class="col-sm-10">
                            {{ $row->pph }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kotor" class="col-sm-2 control-label">Kotor</label>
                        <div class="col-sm-10">
                            {{ $row->kotor }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="potongan" class="col-sm-2 control-label">Potongan</label>
                        <div class="col-sm-10">
                            {{ $row->potongan }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="bersih" class="col-sm-2 control-label">Bersih</label>
                        <div class="col-sm-10">
                            {{ $row->bersih }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <div class="offset-sm-2 col-sm-10">
                            @method("DELETE")
                            <input type="hidden" name="action" value="{{ $action }}">
                            <input type="hidden" name="id" value="{{ $row->id }}">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            @elseif($action == 'detail')
                <div class="mb-3 row">
                    <label for="tanggal" class="col-sm-2 control-label">Tanggal</label>
                    <div class="col-sm-10">
                        {{ $row->tanggal }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nogaji" class="col-sm-2 control-label">Nogaji</label>
                    <div class="col-sm-10">
                        {{ $row->nogaji }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nip" class="col-sm-2 control-label">Nip</label>
                    <div class="col-sm-10">
                        {{ $row->nip }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nmpeg" class="col-sm-2 control-label">Nmpeg</label>
                    <div class="col-sm-10">
                        {{ $row->nmpeg }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kdgol" class="col-sm-2 control-label">Kdgol</label>
                    <div class="col-sm-10">
                        {{ $row->kdgol }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jmlhari" class="col-sm-2 control-label">Jmlhari</label>
                    <div class="col-sm-10">
                        {{ $row->jmlhari }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tarif" class="col-sm-2 control-label">Tarif</label>
                    <div class="col-sm-10">
                        {{ $row->tarif }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pph" class="col-sm-2 control-label">Pph</label>
                    <div class="col-sm-10">
                        {{ $row->pph }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kotor" class="col-sm-2 control-label">Kotor</label>
                    <div class="col-sm-10">
                        {{ $row->kotor }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potongan" class="col-sm-2 control-label">Potongan</label>
                    <div class="col-sm-10">
                        {{ $row->potongan }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="bersih" class="col-sm-2 control-label">Bersih</label>
                    <div class="col-sm-10">
                        {{ $row->bersih }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="offset-sm-2 col-sm-10">
                        <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
