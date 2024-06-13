@extends('layouts.app')

@section('title')
Data Gaji Bersih
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
      <li class="breadcrumb-item"><a href="{{asset('/')}}allowances/data/{{ $month_id }}">Gaji Bersih</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ ucfirst($action) }}</li>
    </ol>
  </nav>
  <div class="card border-success">
    <h5 class="card-header text-bg-success"> Gaji Bersih</h5>
    <div class="card-body">
      @if($action == 'insert')
      <form class="form-horizontal" action="{{ asset('/') }}allowances" method="post">
        <!-- <div class="mb-3 row">
          <label for="id" class="col-sm-2 col-form-label"><strong>Id</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="id" value="">
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="month_id" class="col-sm-2 col-form-label"><strong>Month_id</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="month_id" value="">
          </div>
        </div> -->
        <div class="mb-3 row">
          <label for="nip" class="col-sm-2 col-form-label"><strong>nip</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="nip" value="">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nmpeg" class="col-sm-2 col-form-label"><strong>nmpeg</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="nmpeg" value="">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="npwp" class="col-sm-2 col-form-label"><strong>npwp</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="npwp" value="">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="rekening" class="col-sm-2 col-form-label"><strong>rekening</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="rekening" value="">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nmbankspan" class="col-sm-2 col-form-label"><strong>nmbankspan</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="nmbankspan" value="">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="gjpokok" class="col-sm-2 col-form-label"><strong>gjpokok</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="gjpokok" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjistri" class="col-sm-2 col-form-label"><strong>tjistri</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjistri" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjanak" class="col-sm-2 col-form-label"><strong>tjanak</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjanak" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjupns" class="col-sm-2 col-form-label"><strong>tjupns</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjupns" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjstruk" class="col-sm-2 col-form-label"><strong>tjstruk</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjstruk" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjfungs" class="col-sm-2 col-form-label"><strong>tjfungs</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjfungs" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjdaerah" class="col-sm-2 col-form-label"><strong>tjdaerah</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjdaerah" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjpencil" class="col-sm-2 col-form-label"><strong>tjpencil</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjpencil" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjlain" class="col-sm-2 col-form-label"><strong>tjlain</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjlain" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjkompen" class="col-sm-2 col-form-label"><strong>tjkompen</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjkompen" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="pembul" class="col-sm-2 col-form-label"><strong>pembul</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="pembul" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjberas" class="col-sm-2 col-form-label"><strong>tjberas</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjberas" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjpph" class="col-sm-2 col-form-label"><strong>tjpph</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjpph" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tottun" class="col-sm-2 col-form-label"><strong>tottun</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tottun" value="0">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="kotor" class="col-sm-2 col-form-label"><strong>kotor</strong></label>
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
          <label for="bersih" class="col-sm-2 col-form-label"><strong>bersih</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="bersih" value="0">
          </div>
        </div>
        <!-- <div class="mb-3 row">
          <label for="created_at" class="col-sm-2 col-form-label"><strong>Created_at</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="created_at" value="">
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="updated_at" class="col-sm-2 col-form-label"><strong>Updated_at</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="updated_at" value="">
          </div>
        </div> -->
        <div class="mb-3">
          <div class="offset-sm-2 col-sm-10">
            <input type="hidden" name="action" value="{{ $action }}">
            <input type="hidden" name="month_id" value="{{ $month_id }}">
            <button type="submit" class="btn btn-primary">Insert</button>
            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Cancel</button>
          </div>
        </div>
        {{ csrf_field() }}
      </form>
      @elseif($action == 'update')
      <form class="form-horizontal" action="{{ asset('/') }}allowances/{{ $row->id }}" method="post">
        <!-- <div class="mb-3 row">
          <label for="id" class="col-sm-2 col-form-label"><strong>Id</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="id" value="{{ $row->id }}">
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="month_id" class="col-sm-2 col-form-label"><strong>Month_id</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="month_id" value="{{ $row->month_id }}">
          </div>
        </div> -->
        <div class="mb-3 row">
          <label for="nip" class="col-sm-2 col-form-label"><strong>nip</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="nip" value="{{ $row->nip }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nmpeg" class="col-sm-2 col-form-label"><strong>nmpeg</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="nmpeg" value="{{ $row->nmpeg }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="npwp" class="col-sm-2 col-form-label"><strong>npwp</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="npwp" value="{{ $row->npwp }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="rekening" class="col-sm-2 col-form-label"><strong>rekening</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="rekening" value="{{ $row->rekening }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nmbankspan" class="col-sm-2 col-form-label"><strong>nmbankspan</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="nmbankspan" value="{{ $row->nmbankspan }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="gjpokok" class="col-sm-2 col-form-label"><strong>gjpokok</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="gjpokok" value="{{ $row->gjpokok }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjistri" class="col-sm-2 col-form-label"><strong>tjistri</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjistri" value="{{ $row->tjistri }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjanak" class="col-sm-2 col-form-label"><strong>tjanak</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjanak" value="{{ $row->tjanak }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjupns" class="col-sm-2 col-form-label"><strong>tjupns</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjupns" value="{{ $row->tjupns }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjstruk" class="col-sm-2 col-form-label"><strong>tjstruk</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjstruk" value="{{ $row->tjstruk }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjfungs" class="col-sm-2 col-form-label"><strong>tjfungs</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjfungs" value="{{ $row->tjfungs }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjdaerah" class="col-sm-2 col-form-label"><strong>tjdaerah</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjdaerah" value="{{ $row->tjdaerah }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjpencil" class="col-sm-2 col-form-label"><strong>tjpencil</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjpencil" value="{{ $row->tjpencil }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjlain" class="col-sm-2 col-form-label"><strong>tjlain</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjlain" value="{{ $row->tjlain }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjkompen" class="col-sm-2 col-form-label"><strong>tjkompen</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjkompen" value="{{ $row->tjkompen }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="pembul" class="col-sm-2 col-form-label"><strong>pembul</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="pembul" value="{{ $row->pembul }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjberas" class="col-sm-2 col-form-label"><strong>tjberas</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjberas" value="{{ $row->tjberas }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjpph" class="col-sm-2 col-form-label"><strong>tjpph</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tjpph" value="{{ $row->tjpph }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tottun" class="col-sm-2 col-form-label"><strong>tottun</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="tottun" value="{{ $row->tottun }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="kotor" class="col-sm-2 col-form-label"><strong>kotor</strong></label>
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
          <label for="bersih" class="col-sm-2 col-form-label"><strong>bersih</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="bersih" value="{{ $row->bersih }}">
          </div>
        </div>
        <!-- <div class="mb-3 row">
          <label for="created_at" class="col-sm-2 col-form-label"><strong>Created_at</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="created_at" value="{{ $row->created_at }}">
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="updated_at" class="col-sm-2 col-form-label"><strong>Updated_at</strong></label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="updated_at" value="{{ $row->updated_at }}">
          </div>
        </div> -->
        <div class="mb-3 row">
          <div class="offset-sm-2 col-sm-10">
            @method("PATCH")
            <input type="hidden" name="action" value="{{ $action }}">
            <input type="hidden" name="id" value="{{ $row->id }}">
            <input type="hidden" name="month_id" value="{{ $month_id }}">
            <button type="submit" class="btn btn-warning">Update</button>
            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Cancel</button>
          </div>
        </div>
        {{ csrf_field() }}
      </form>
      @elseif($action == 'delete')
      <form class="form-horizontal" action="{{ asset('/') }}allowances/{{ $row->id }}" method="post">
        <!-- <div class="mb-3 row">
          <label for="id" class="col-sm-2 control-label"><strong>Id</strong></label>
          <div class="col-sm-10">
            {{ $row->id }}
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="month_id" class="col-sm-2 control-label"><strong>Month_id</strong></label>
          <div class="col-sm-10">
            {{ $row->month_id }}
          </div>
        </div> -->
        <div class="mb-3 row">
          <label for="nip" class="col-sm-2 control-label"><strong>nip</strong></label>
          <div class="col-sm-10">
            {{ $row->nip }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nmpeg" class="col-sm-2 control-label"><strong>nmpeg</strong></label>
          <div class="col-sm-10">
            {{ $row->nmpeg }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="npwp" class="col-sm-2 control-label"><strong>npwp</strong></label>
          <div class="col-sm-10">
            {{ $row->npwp }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="rekening" class="col-sm-2 control-label"><strong>rekening</strong></label>
          <div class="col-sm-10">
            {{ $row->rekening }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nmbankspan" class="col-sm-2 control-label"><strong>nmbankspan</strong></label>
          <div class="col-sm-10">
            {{ $row->nmbankspan }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="gjpokok" class="col-sm-2 control-label"><strong>gjpokok</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->gjpokok) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjistri" class="col-sm-2 control-label"><strong>tjistri</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->tjistri) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjanak" class="col-sm-2 control-label"><strong>tjanak</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->tjanak) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjupns" class="col-sm-2 control-label"><strong>tjupns</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->tjupns) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjstruk" class="col-sm-2 control-label"><strong>tjstruk</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->tjstruk) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjfungs" class="col-sm-2 control-label"><strong>tjfungs</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->tjfungs) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjdaerah" class="col-sm-2 control-label"><strong>tjdaerah</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->tjdaerah) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjpencil" class="col-sm-2 control-label"><strong>tjpencil</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->tjpencil) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjlain" class="col-sm-2 control-label"><strong>tjlain</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->tjlain) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjkompen" class="col-sm-2 control-label"><strong>tjkompen</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->tjkompen) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="pembul" class="col-sm-2 control-label"><strong>pembul</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->pembul) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjberas" class="col-sm-2 control-label"><strong>tjberas</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->tjberas) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tjpph" class="col-sm-2 control-label"><strong>tjpph</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->tjpph) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="tottun" class="col-sm-2 control-label"><strong>tottun</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->tottun) }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="kotor" class="col-sm-2 control-label"><strong>kotor</strong></label>
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
          <label for="bersih" class="col-sm-2 control-label"><strong>bersih</strong></label>
          <div class="col-sm-10">
            {{ toCurrency($row->bersih) }}
          </div>
        </div>
        <!-- <div class="mb-3 row">
          <label for="created_at" class="col-sm-2 control-label"><strong>Created_at</strong></label>
          <div class="col-sm-10">
            {{ $row->created_at }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="updated_at" class="col-sm-2 control-label"><strong>Updated_at</strong></label>
          <div class="col-sm-10">
            {{ $row->updated_at }}
          </div>
        </div> -->
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
      <!-- <div class="mb-3 row">
        <label for="id" class="col-sm-2 control-label"><strong>Id</strong></label>
        <div class="col-sm-10">
          {{ $row->id }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="month_id" class="col-sm-2 control-label"><strong>Month_id</strong></label>
        <div class="col-sm-10">
          {{ $row->month_id }}
        </div>
      </div> -->
      <div class="mb-3 row">
        <label for="nip" class="col-sm-2 control-label"><strong>nip</strong></label>
        <div class="col-sm-10">
          {{ $row->nip }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="nmpeg" class="col-sm-2 control-label"><strong>nmpeg</strong></label>
        <div class="col-sm-10">
          {{ $row->nmpeg }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="npwp" class="col-sm-2 control-label"><strong>npwp</strong></label>
        <div class="col-sm-10">
          {{ $row->npwp }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="rekening" class="col-sm-2 control-label"><strong>rekening</strong></label>
        <div class="col-sm-10">
          {{ $row->rekening }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="nmbankspan" class="col-sm-2 control-label"><strong>nmbankspan</strong></label>
        <div class="col-sm-10">
          {{ $row->nmbankspan }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="gjpokok" class="col-sm-2 control-label"><strong>gjpokok</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->gjpokok) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjistri" class="col-sm-2 control-label"><strong>tjistri</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->tjistri) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjanak" class="col-sm-2 control-label"><strong>tjanak</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->tjanak) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjupns" class="col-sm-2 control-label"><strong>tjupns</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->tjupns) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjstruk" class="col-sm-2 control-label"><strong>tjstruk</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->tjstruk) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjfungs" class="col-sm-2 control-label"><strong>tjfungs</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->tjfungs) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjdaerah" class="col-sm-2 control-label"><strong>tjdaerah</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->tjdaerah) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjpencil" class="col-sm-2 control-label"><strong>tjpencil</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->tjpencil) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjlain" class="col-sm-2 control-label"><strong>tjlain</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->tjlain) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjkompen" class="col-sm-2 control-label"><strong>tjkompen</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->tjkompen) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="pembul" class="col-sm-2 control-label"><strong>pembul</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->pembul) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjberas" class="col-sm-2 control-label"><strong>tjberas</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->tjberas) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tjpph" class="col-sm-2 control-label"><strong>tjpph</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->tjpph) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="tottun" class="col-sm-2 control-label"><strong>tottun</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->tottun) }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="kotor" class="col-sm-2 control-label"><strong>kotor</strong></label>
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
        <label for="bersih" class="col-sm-2 control-label"><strong>bersih</strong></label>
        <div class="col-sm-10">
          {{ toCurrency($row->bersih) }}
        </div>
      </div>
      <!-- <div class="mb-3 row">
        <label for="created_at" class="col-sm-2 control-label"><strong>Created_at</strong></label>
        <div class="col-sm-10">
          {{ $row->created_at }}
        </div>
      </div> -->
      <!-- <div class="mb-3 row">
        <label for="updated_at" class="col-sm-2 control-label"><strong>Updated_at</strong></label>
        <div class="col-sm-10">
          {{ $row->updated_at }}
        </div>
      </div> -->
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