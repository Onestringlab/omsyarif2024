@extends('layouts.app')

@section('title')
Data Gaji
@endsection

@section('content')
<div class="container">
    <script>
        function button_cancel() {
            location.replace("{{ asset('/') }}allowances/data/{{ $month_id }}");
        }
    </script>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ asset('/months') }}">Data</a></li>
            <li class="breadcrumb-item"><a href="{{asset('/')}}allowances/data/{{ $month_id }}">Gaji</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($action) }}</li>
        </ol>
    </nav>
    <div class="card border-success">
        <h5 class="card-header text-bg-success"> Gaji</h5>
        <div class="card-body">
            @if($action == 'insert')
            <form class="form-horizontal" action="{{ asset('/') }}allowances" method="post">
                <div class="mb-3 row">
                    <label for="nip" class="col-sm-2 col-form-label"><strong>NIP</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nip" value="" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nmpeg" class="col-sm-2 col-form-label"><strong>Nama</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nmpeg" value="" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gjpokok" class="col-sm-2 col-form-label"><strong>Gaji Pokok</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="gjpokok" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjistri" class="col-sm-2 col-form-label"><strong>Tunjangan Istri</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjistri" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjanak" class="col-sm-2 col-form-label"><strong>Tunjangan Anak</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjanak" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjupns" class="col-sm-2 col-form-label"><strong>Tunjangan UPNS </strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjupns" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjstruk" class="col-sm-2 col-form-label"><strong>Tunjangan Struktural</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjstruk" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjfungs" class="col-sm-2 col-form-label"><strong>Tunjangan Fungsional</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjfungs" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjdaerah" class="col-sm-2 col-form-label"><strong>Tunjangan Daerah</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjdaerah" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjpencil" class="col-sm-2 col-form-label"><strong>Tunjangan Terpencil</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjpencil" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjlain" class="col-sm-2 col-form-label"><strong>Tunjangan Lain</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjlain" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjkompen" class="col-sm-2 col-form-label"><strong>Tunjangan Kompen</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjkompen" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pembul" class="col-sm-2 col-form-label"><strong>Pembulatan</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="pembul" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjberas" class="col-sm-2 col-form-label"><strong>Tunjangan Beras</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjberas" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjpph" class="col-sm-2 col-form-label"><strong>Tunjangan PPH</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjpph" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tottun" class="col-sm-2 col-form-label"><strong>Total Tunjangan</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tottun" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kotor" class="col-sm-2 col-form-label"><strong>Kotor</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="kotor" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potpfkbul" class="col-sm-2 col-form-label"><strong>potpfkbul</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="potpfkbul" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potpfk2" class="col-sm-2 col-form-label"><strong>potpfk2</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="potpfk2" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potpfk10" class="col-sm-2 col-form-label"><strong>potpfk10</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="potpfk10" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potpph" class="col-sm-2 col-form-label"><strong>potpph</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="potpph" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potswrum" class="col-sm-2 col-form-label"><strong>potswrum</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="potswrum" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potkelbtj" class="col-sm-2 col-form-label"><strong>potkelbtj</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="potkelbtj" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potlain" class="col-sm-2 col-form-label"><strong>potlain</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="potlain" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pottabrum" class="col-sm-2 col-form-label"><strong>pottabrum</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="pottabrum" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="bpjs" class="col-sm-2 col-form-label"><strong>bpjs</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="bpjs" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="bpjs2" class="col-sm-2 col-form-label"><strong>bpjs2</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="bpjs2" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="totpot" class="col-sm-2 col-form-label"><strong>totpot</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="totpot" value="0">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="bersih" class="col-sm-2 col-form-label"><strong>Gaji Bersih</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="bersih" value="0">
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
            <form class="form-horizontal" action="{{ asset('/') }}allowances/{{ $row->id }}" method="post">
                <div class="mb-3 row">
                    <label for="nip" class="col-sm-2 col-form-label"><strong>NIP</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nip" value="{{ $row->nip }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nmpeg" class="col-sm-2 col-form-label"><strong>Nama</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="nmpeg" value="{{ $row->nmpeg }}" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gjpokok" class="col-sm-2 col-form-label"><strong>Gaji Pokok</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="gjpokok" value="{{ $row->gjpokok }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjistri" class="col-sm-2 col-form-label"><strong>Tunjangan Istri</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjistri" value="{{ $row->tjistri }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjanak" class="col-sm-2 col-form-label"><strong>Tunjangan Anak</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjanak" value="{{ $row->tjanak }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjupns" class="col-sm-2 col-form-label"><strong>Tunjangan UPNS </strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjupns" value="{{ $row->tjupns }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjstruk" class="col-sm-2 col-form-label"><strong>Tunjangan Struktural</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjstruk" value="{{ $row->tjstruk }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjfungs" class="col-sm-2 col-form-label"><strong>Tunjangan Fungsional</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjfungs" value="{{ $row->tjfungs }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjdaerah" class="col-sm-2 col-form-label"><strong>Tunjangan Daerah</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjdaerah" value="{{ $row->tjdaerah }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjpencil" class="col-sm-2 col-form-label"><strong>Tunjangan Terpencil</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjpencil" value="{{ $row->tjpencil }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjlain" class="col-sm-2 col-form-label"><strong>Tunjangan Lain</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjlain" value="{{ $row->tjlain }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjkompen" class="col-sm-2 col-form-label"><strong>Tunjangan Kompen</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjkompen" value="{{ $row->tjkompen }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pembul" class="col-sm-2 col-form-label"><strong>Pembulatan</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="pembul" value="{{ $row->pembul }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjberas" class="col-sm-2 col-form-label"><strong>Tunjangan Beras</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjberas" value="{{ $row->tjberas }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjpph" class="col-sm-2 col-form-label"><strong>Tunjangan PPH</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tjpph" value="{{ $row->tjpph }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tottun" class="col-sm-2 col-form-label"><strong>Total Tunjangan</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="tottun" value="{{ $row->tottun }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kotor" class="col-sm-2 col-form-label"><strong>Kotor</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="kotor" value="{{ $row->kotor }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potpfkbul" class="col-sm-2 col-form-label"><strong>potpfkbul</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="potpfkbul" value="{{ $row->potpfkbul }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potpfk2" class="col-sm-2 col-form-label"><strong>potpfk2</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="potpfk2" value="{{ $row->potpfk2 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potpfk10" class="col-sm-2 col-form-label"><strong>potpfk10</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="potpfk10" value="{{ $row->potpfk10 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potpph" class="col-sm-2 col-form-label"><strong>potpph</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="potpph" value="{{ $row->potpph }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potswrum" class="col-sm-2 col-form-label"><strong>potswrum</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="potswrum" value="{{ $row->potswrum }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potkelbtj" class="col-sm-2 col-form-label"><strong>potkelbtj</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="potkelbtj" value="{{ $row->potkelbtj }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potlain" class="col-sm-2 col-form-label"><strong>potlain</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="potlain" value="{{ $row->potlain }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pottabrum" class="col-sm-2 col-form-label"><strong>pottabrum</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="pottabrum" value="{{ $row->pottabrum }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="bpjs" class="col-sm-2 col-form-label"><strong>bpjs</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="bpjs" value="{{ $row->bpjs }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="bpjs2" class="col-sm-2 col-form-label"><strong>bpjs2</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="bpjs2" value="{{ $row->bpjs2 }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="totpot" class="col-sm-2 col-form-label"><strong>totpot</strong></label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="totpot" value="{{ $row->totpot }}">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="bersih" class="col-sm-2 col-form-label"><strong>Gaji Bersih</strong></label>
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
            <form class="form-horizontal" action="{{ asset('/') }}allowances/{{ $row->id }}" method="post">
                <div class="mb-3 row">
                    <label for="nip" class="col-sm-2 control-label"><strong>NIP</strong></label>
                    <div class="col-sm-10">
                        {{ $row->nip }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="nmpeg" class="col-sm-2 control-label"><strong>Nama</strong></label>
                    <div class="col-sm-10">
                        {{ $row->nmpeg }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="gjpokok" class="col-sm-2 control-label"><strong>Gaji Pokok</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->gjpokok) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjistri" class="col-sm-2 control-label"><strong>Tunjangan Istri</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->tjistri) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjanak" class="col-sm-2 control-label"><strong>Tunjangan Anak</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->tjanak) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjupns" class="col-sm-2 control-label"><strong>Tunjangan UPNS </strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->tjupns) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjstruk" class="col-sm-2 control-label"><strong>Tunjangan Struktural</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->tjstruk) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjfungs" class="col-sm-2 control-label"><strong>Tunjangan Fungsional</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->tjfungs) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjdaerah" class="col-sm-2 control-label"><strong>Tunjangan Daerah</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->tjdaerah) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjpencil" class="col-sm-2 control-label"><strong>Tunjangan Terpencil</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->tjpencil) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjlain" class="col-sm-2 control-label"><strong>Tunjangan Lain</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->tjlain) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjkompen" class="col-sm-2 control-label"><strong>Tunjangan Kompen</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->tjkompen) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pembul" class="col-sm-2 control-label"><strong>Pembulatan</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->pembul) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjberas" class="col-sm-2 control-label"><strong>Tunjangan Beras</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->tjberas) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tjpph" class="col-sm-2 control-label"><strong>Tunjangan PPH</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->tjpph) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tottun" class="col-sm-2 control-label"><strong>Total Tunjangan</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->tottun) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kotor" class="col-sm-2 control-label"><strong>Kotor</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->kotor) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potpfkbul" class="col-sm-2 control-label"><strong>potpfkbul</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->potpfkbul) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potpfk2" class="col-sm-2 control-label"><strong>potpfk2</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->potpfk2) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potpfk10" class="col-sm-2 control-label"><strong>potpfk10</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->potpfk10) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potpph" class="col-sm-2 control-label"><strong>potpph</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->potpph) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potswrum" class="col-sm-2 control-label"><strong>potswrum</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->potswrum) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potkelbtj" class="col-sm-2 control-label"><strong>potkelbtj</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->potkelbtj) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="potlain" class="col-sm-2 control-label"><strong>potlain</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->potlain) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pottabrum" class="col-sm-2 control-label"><strong>pottabrum</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->pottabrum) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="bpjs" class="col-sm-2 control-label"><strong>bpjs</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->bpjs) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="bpjs" class="col-sm-2 control-label"><strong>bpjs2</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->bpjs2) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="totpot" class="col-sm-2 control-label"><strong>totpot</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->totpot) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="bersih" class="col-sm-2 control-label"><strong>Gaji Bersih</strong></label>
                    <div class="col-sm-10">
                        {{ toCurrency($row->bersih) }}
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="offset-sm-2 col-sm-10">
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
                <label for="nip" class="col-sm-2 control-label"><strong>NIP</strong></label>
                <div class="col-sm-10">
                    {{ $row->nip }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nmpeg" class="col-sm-2 control-label"><strong>Nama</strong></label>
                <div class="col-sm-10">
                    {{ $row->nmpeg }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="gjpokok" class="col-sm-2 control-label"><strong>Gaji Pokok</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->gjpokok) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tjistri" class="col-sm-2 control-label"><strong>Tunjangan Istri</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjistri) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tjanak" class="col-sm-2 control-label"><strong>Tunjangan Anak</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjanak) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tjupns" class="col-sm-2 control-label"><strong>Tunjangan UPNS </strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjupns) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tjstruk" class="col-sm-2 control-label"><strong>Tunjangan Struktural</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjstruk) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tjfungs" class="col-sm-2 control-label"><strong>Tunjangan Fungsional</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjfungs) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tjdaerah" class="col-sm-2 control-label"><strong>Tunjangan Daerah</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjdaerah) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tjpencil" class="col-sm-2 control-label"><strong>Tunjangan Terpencil</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjpencil) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tjlain" class="col-sm-2 control-label"><strong>Tunjangan Lain</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjlain) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tjkompen" class="col-sm-2 control-label"><strong>Tunjangan Kompen</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjkompen) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pembul" class="col-sm-2 control-label"><strong>Pembulatan</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->pembul) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tjberas" class="col-sm-2 control-label"><strong>Tunjangan Beras</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjberas) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tjpph" class="col-sm-2 control-label"><strong>Tunjangan PPH</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tjpph) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="tottun" class="col-sm-2 control-label"><strong>Total Tunjangan</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->tottun) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kotor" class="col-sm-2 control-label"><strong>Gaji Kotor</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->kotor) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="potpfkbul" class="col-sm-2 control-label"><strong>potpfkbul</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->potpfkbul) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="potpfk2" class="col-sm-2 control-label"><strong>potpfk2</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->potpfk2) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="potpfk10" class="col-sm-2 control-label"><strong>potpfk10</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->potpfk10) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="potpph" class="col-sm-2 control-label"><strong>potpph</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->potpph) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="potswrum" class="col-sm-2 control-label"><strong>potswrum</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->potswrum) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="potkelbtj" class="col-sm-2 control-label"><strong>potkelbtj</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->potkelbtj) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="potlain" class="col-sm-2 control-label"><strong>potlain</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->potlain) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="pottabrum" class="col-sm-2 control-label"><strong>pottabrum</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->pottabrum) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="bpjs" class="col-sm-2 control-label"><strong>bpjs</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->bpjs) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="bpjs" class="col-sm-2 control-label"><strong>bpjs2</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->bpjs2) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="totpot" class="col-sm-2 control-label"><strong>totpot</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->totpot) }}
                </div>
            </div>
            <div class="mb-3 row">
                <label for="bersih" class="col-sm-2 control-label"><strong>Gaji Bersih</strong></label>
                <div class="col-sm-10">
                    {{ toCurrency($row->bersih) }}
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