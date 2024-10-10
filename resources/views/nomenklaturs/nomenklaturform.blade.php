@extends('layouts.app')

@section('title')
Data Nomenklatur 
@endsection

@section('content')
<div class="container">
    <script>
        function button_cancel() {
            location.replace("{{ asset('/') }}nomenklatur");
        }
    </script>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/nomenklatur') }}">Nomenklatur Potongan</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ Auth::user()->satuankerja->nama }}</li>
        </ol>
    </nav>
    <div class="card border-success">
        <h5 class="card-header text-bg-success">Nomenklatur Potongan</h5>
        <div class="card-body">
            @if($action == 'insert')
            <form class="form-horizontal" action="{{ asset('/') }}nomenklatur" method="post">
                <div class="mb-3 row">
                    <label for="p1" class="col-sm-1 col-form-label">P1</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p1" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p2" class="col-sm-1 col-form-label">P2</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p2" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p3" class="col-sm-1 col-form-label">P3</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p3" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p4" class="col-sm-1 col-form-label">P4</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p4" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p5" class="col-sm-1 col-form-label">P5</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p5" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p6" class="col-sm-1 col-form-label">P6</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p6" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p7" class="col-sm-1 col-form-label">P7</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p7" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p8" class="col-sm-1 col-form-label">P8</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p8" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p9" class="col-sm-1 col-form-label">P9</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p9" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p10" class="col-sm-1 col-form-label">P10</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p10" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p11" class="col-sm-1 col-form-label">P11</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p11" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p12" class="col-sm-1 col-form-label">P12</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p12" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p13" class="col-sm-1 col-form-label">P13</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p13" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p14" class="col-sm-1 col-form-label">P14</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p14" value="">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p15" class="col-sm-1 col-form-label">P15</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p15" value="">
                    </div>
                </div>
                <div class="mb-3">
                    <div class="offset-sm-1 col-sm-11">
                        <input type="hidden" name="action" value="{{ $action }}">
                        <button type="submit" class="btn btn-primary">Tambah</button>
                        <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
            @elseif($action == 'update')
            <form class="form-horizontal" action="{{ asset('/') }}nomenklatur/{{ $row->id }}" method="post">
                <div class="mb-3 row">
                    <label for="p1" class="col-sm-1 col-form-label">P1</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p1" value="{{ $row->p1 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p2" class="col-sm-1 col-form-label">P2</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p2" value="{{ $row->p2 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p3" class="col-sm-1 col-form-label">P3</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p3" value="{{ $row->p3 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p4" class="col-sm-1 col-form-label">P4</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p4" value="{{ $row->p4 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p5" class="col-sm-1 col-form-label">P5</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p5" value="{{ $row->p5 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p6" class="col-sm-1 col-form-label">P6</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p6" value="{{ $row->p6 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p7" class="col-sm-1 col-form-label">P7</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p7" value="{{ $row->p7 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p8" class="col-sm-1 col-form-label">P8</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p8" value="{{ $row->p8 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p9" class="col-sm-1 col-form-label">P9</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p9" value="{{ $row->p9 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p10" class="col-sm-1 col-form-label">P10</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p10" value="{{ $row->p10 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p11" class="col-sm-1 col-form-label">P11</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p11" value="{{ $row->p11 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p12" class="col-sm-1 col-form-label">P12</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p12" value="{{ $row->p12 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p13" class="col-sm-1 col-form-label">P13</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p13" value="{{ $row->p13 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p14" class="col-sm-1 col-form-label">P14</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p14" value="{{ $row->p14 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p15" class="col-sm-1 col-form-label">P15</label>
                    <div class="col-sm-11">
                        <input class="form-control" type="text" name="p15" value="{{ $row->p15 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="offset-sm-1 col-sm-11">
                        @method("PATCH")
                        <input type="hidden" name="action" value="{{ $action }}">
                        <input type="hidden" name="id" value="{{ $row->id }}">
                        <button type="submit" class="btn btn-warning">Simpan</button>
                        <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
            @elseif($action == 'delete')
            <form class="form-horizontal" action="{{ asset('/') }}nomenklatur/{{ $row->id }}" method="post">
                <div class="mb-3 row">
                    <label for="p1" class="col-sm-1 control-label">P1</label>
                    <div class="col-sm-11">
                        {{ $row->p1 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p2" class="col-sm-1 control-label">P2</label>
                    <div class="col-sm-11">
                        {{ $row->p2 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p3" class="col-sm-1 control-label">P3</label>
                    <div class="col-sm-11">
                        {{ $row->p3 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p4" class="col-sm-1 control-label">P4</label>
                    <div class="col-sm-11">
                        {{ $row->p4 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p5" class="col-sm-1 control-label">P5</label>
                    <div class="col-sm-11">
                        {{ $row->p5 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p6" class="col-sm-1 control-label">P6</label>
                    <div class="col-sm-11">
                        {{ $row->p6 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p7" class="col-sm-1 control-label">P7</label>
                    <div class="col-sm-11">
                        {{ $row->p7 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p8" class="col-sm-1 control-label">P8</label>
                    <div class="col-sm-11">
                        {{ $row->p8 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p9" class="col-sm-1 control-label">P9</label>
                    <div class="col-sm-11">
                        {{ $row->p9 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p10" class="col-sm-1 control-label">P10</label>
                    <div class="col-sm-11">
                        {{ $row->p10 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p11" class="col-sm-1 control-label">P11</label>
                    <div class="col-sm-11">
                        {{ $row->p11 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p12" class="col-sm-1 control-label">P12</label>
                    <div class="col-sm-11">
                        {{ $row->p12 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p13" class="col-sm-1 control-label">P13</label>
                    <div class="col-sm-11">
                        {{ $row->p13 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p14" class="col-sm-1 control-label">P14</label>
                    <div class="col-sm-11">
                        {{ $row->p14 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="p15" class="col-sm-1 control-label">P15</label>
                    <div class="col-sm-11">
                        {{ $row->p15 }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="offset-sm-1 col-sm-11">
                        @method("DELETE")
                        <input type="hidden" name="action" value="{{ $action }}">
                        <input type="hidden" name="id" value="{{ $row->id }}">
                        <button type="submit" class="btn btn-danger">Hapus</button>
                        <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
            @elseif($action == 'detail')
            <div class="mb-3 row">
                <label for="kode_satker" class="col-sm-1 control-label">Kode_satker</label>
                <div class="col-sm-11">
                    {{ $row->kode_satker }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p1" class="col-sm-1 control-label">P1</label>
                <div class="col-sm-11">
                    {{ $row->p1 }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p2" class="col-sm-1 control-label">P2</label>
                <div class="col-sm-11">
                    {{ $row->p2 }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p3" class="col-sm-1 control-label">P3</label>
                <div class="col-sm-11">
                    {{ $row->p3 }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p4" class="col-sm-1 control-label">P4</label>
                <div class="col-sm-11">
                    {{ $row->p4 }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p5" class="col-sm-1 control-label">P5</label>
                <div class="col-sm-11">
                    {{ $row->p5 }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p6" class="col-sm-1 control-label">P6</label>
                <div class="col-sm-11">
                    {{ $row->p6 }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p7" class="col-sm-1 control-label">P7</label>
                <div class="col-sm-11">
                    {{ $row->p7 }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p8" class="col-sm-1 control-label">P8</label>
                <div class="col-sm-11">
                    {{ $row->p8 }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p9" class="col-sm-1 control-label">P9</label>
                <div class="col-sm-11">
                    {{ $row->p9 }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p10" class="col-sm-1 control-label">P10</label>
                <div class="col-sm-11">
                    {{ $row->p10 }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p11" class="col-sm-1 control-label">P11</label>
                <div class="col-sm-11">
                    {{ $row->p11 }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p12" class="col-sm-1 control-label">P12</label>
                <div class="col-sm-11">
                    {{ $row->p12 }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p13" class="col-sm-1 control-label">P13</label>
                <div class="col-sm-11">
                    {{ $row->p13 }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p14" class="col-sm-1 control-label">P14</label>
                <div class="col-sm-11">
                    {{ $row->p14 }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="p15" class="col-sm-1 control-label">P15</label>
                <div class="col-sm-11">
                    {{ $row->p15 }}
                </div>
            </div>
            <div class="mb-3 row">
                <div class="offset-sm-1 col-sm-11">
                    <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection