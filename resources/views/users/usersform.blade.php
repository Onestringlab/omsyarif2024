@extends('layouts.app')

@section('title')
Data Users 
@endsection

@section('content')
<div class="container">
  <script>
    function button_cancel() {
      location.replace("{{ asset('/') }}users");
    }
  </script>
  <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{ asset('/users') }}">Data Pengguna</a></li>
      <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
    </ol>
  </nav>
  <div class="card border-success">
    <h5 class="card-header text-bg-success"> Data Pengguna</h5>
    <div class="card-body">
      @if($action == 'insert')
      <form class="form-horizontal" action="{{ asset('/') }}users" method="post">
        <div class="mb-3 row">
          @if(in_array(Auth::user()->role, ['superadmin']))
          <label for="nip" class="col-sm-2 col-form-label">Satuan Kerja</label>
          <div class="col-sm-10">
            @error('satker')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <select name="satker" class="form-control">
              @foreach ($satker as $data )
              <option value="{{ $data->kode }}">{{ $data->kode }}-{{ $data->nama }}</option>
              @endforeach
            </select>
          </div>
          @endif
        </div>
        <div class="mb-3 row">
          <label for="nip" class="col-sm-2 col-form-label">NIP</label>
          <div class="col-sm-10">
            @error('nip')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="form-control" type="text" name="nip" value="{{ old('nip') }}" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="name" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="form-control" type="text" name="name" value="{{ old('name') }}" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="form-control" type="text" name="email" value="{{ old('email') }}" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="password" class="col-sm-2 col-form-label">Sandi</label>
          <div class="col-sm-10">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="form-control" type="password" name="password" value="" required>
          </div>
        </div>
        <div class="mb-3 row">
          <label for="password" class="col-sm-2 col-form-label">Konfirmasi Sandi</label>
          <div class="col-sm-10">
            <input class="form-control" type="password" name="confirmed" value="" required>
          </div>
        </div>
        <div class="mb-3">
          <div class="offset-sm-2 col-sm-10">
            <input type="hidden" name="action" value="{{ $action }}">
            <button type="submit" class="btn btn-primary">Tambah</button>
            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
          </div>
        </div>
        {{ csrf_field() }}
      </form>
      @elseif($action == 'update')
      <form class="form-horizontal" action="{{ asset('/') }}users/{{ $row->id }}" method="post">
        <div class="mb-3 row">
          @if(in_array(Auth::user()->role, ['superadmin']))
          <label for="nip" class="col-sm-2 col-form-label">Satuan Kerja</label>
          <div class="col-sm-10">
            @error('satker')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <select name="satker" class="form-control">
              @foreach ($satker as $data )
              <option value="{{ $data->kode }}" {{ $row->satker == $data->kode ? 'selected' : ''}}>{{ $data->kode }}-{{ $data->nama }}</option>
              @endforeach
            </select>
          </div>
          @endif
        </div>
        <div class="mb-3 row">
          <label for="nip" class="col-sm-2 col-form-label">NIP</label>
          <div class="col-sm-10">
            @error('nip')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="form-control" type="text" name="nip" value="{{ $row->nip }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="name" class="col-sm-2 col-form-label">Nama</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="name" value="{{ $row->name }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="form-control" type="text" name="email" value="{{ $row->email }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="password" class="col-sm-2 col-form-label">Sandi</label>
          <div class="col-sm-10">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="form-control" type="password" name="password" value="">
            Kosongkan! Jika tidak ubah password.
          </div>
        </div>
        <div class="mb-3 row">
          <label for="password" class="col-sm-2 col-form-label">Konfirmasi Sandi</label>
          <div class="col-sm-10">
            <input class="form-control" type="password" name="confirmed" value="">
            Kosongkan! Jika tidak ubah password.
          </div>
        </div>
        <div class="mb-3">
          <div class="offset-sm-2 col-sm-10">
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
      <form class="form-horizontal" action="{{ asset('/') }}users/{{ $row->id }}" method="post">
        <div class="mb-3 row">
          <label for="nip" class="col-sm-2 control-label">Satuan Kerja</label>
          <div class="col-sm-10">
            {{ $row->satuankerja->nama }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="nip" class="col-sm-2 control-label">NIP</label>
          <div class="col-sm-10">
            {{ $row->nip }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="name" class="col-sm-2 control-label">Nama</label>
          <div class="col-sm-10">
            {{ $row->name }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="email" class="col-sm-2 control-label">Email</label>
          <div class="col-sm-10">
            {{ $row->email }}
          </div>
        </div>
        <div class="mb-3">
          <div class="offset-sm-2 col-sm-10">
            @method("DELETE")
            <input type="hidden" name="action" value="{{ $action }}">
            <input type="hidden" name="id" value="{{ $row->id }}">
            <button type="submit" class="btn btn-danger">Hapus</button>
            <button type="button" class="btn btn-primary" onclick="button_cancel()">Kembali</button>
          </div>
        </div>
        {{ csrf_field() }}
      </form>
      @elseif($action == 'detail')
      <div class="mb-3 row">
        <label for="nip" class="col-sm-2 control-label">Satuan Kerja</label>
        <div class="col-sm-10">
          {{ $row->satuankerja->nama }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="nip" class="col-sm-2 control-label">NIP</label>
        <div class="col-sm-10">
          {{ $row->nip }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="name" class="col-sm-2 control-label">Nama</label>
        <div class="col-sm-10">
          {{ $row->name }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
          {{ $row->email }}
        </div>
      </div>
      <div class="mb-3">
        <div class="offset-sm-2 col-sm-10">
          <button type="button" class="btn btn-secondary" onclick="button_cancel()">Kembali</button>
        </div>
      </div>
      @endif
    </div>
  </div>
</div>
@endsection