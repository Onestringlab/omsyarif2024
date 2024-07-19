@extends('layouts.app')

@section('title')
Data Users 
@endsection

@section('content')
<div class="container">
  <script>
    function button_cancel() {
      location.replace("{{ asset('home')}}");
    }
  </script>
  <div class="card border-success">
    <h5 class="card-header text-bg-success">Ubah Sandi</h5>
    <div class="card-body">
      @if(Session::get('message') != '')
      <div class="alert alert-danger">{{ Session::get('message') }}</div>
      @endif
      <form class="form-horizontal" action="{{ asset('/passwordupdate') }}" method="post">
        <div class="mb-3 row">
          <label for="password" class="col-sm-2 col-form-label">Sandi Baru</label>
          <div class="col-sm-10">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="form-control" type="password" name="password" value="">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="password" class="col-sm-2 col-form-label">Konfirmasi Sandi</label>
          <div class="col-sm-10">
            <input class="form-control" type="password" name="confirmed" value="">
          </div>
        </div>
        <div class="mb-3">
          <div class="offset-sm-2 col-sm-10">
            <input type="hidden" name="id" value="{{ $row->id }}">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
          </div>
        </div>
        {{ csrf_field() }}
      </form>
    </div>
  </div>
</div>
@endsection