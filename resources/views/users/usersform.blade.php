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
        <!-- <div class="mb-3 row">
          <label for="id" class="col-sm-2 col-form-label">Id</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="id" value="">
          </div>
        </div> -->
        <div class="mb-3 row">
          <label for="nip" class="col-sm-2 col-form-label">NIP</label>
          <div class="col-sm-10">
            @error('nip')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="form-control" type="text" name="nip" value="{{ old('nip') }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="form-control" type="text" name="name" value="{{ old('name') }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="form-control" type="text" name="email" value="{{ old('email') }}">
          </div>
        </div>
        <!-- <div class="mb-3 row">
          <label for="email_verified_at" class="col-sm-2 col-form-label">Email_verified_at</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="email_verified_at" value="">
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="role" class="col-sm-2 col-form-label">Role</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="role" value="">
          </div>
        </div> -->
        <div class="mb-3 row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="form-control" type="password" name="password" value="">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="password" class="col-sm-2 col-form-label">Confirm Password</label>
          <div class="col-sm-10">
            <input class="form-control" type="password" name="confirmed" value="">
          </div>
        </div>
        <!-- <div class="mb-3 row">
          <label for="remember_token" class="col-sm-2 col-form-label">Remember_token</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="remember_token" value="">
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="created_at" class="col-sm-2 col-form-label">Created_at</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="created_at" value="">
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="updated_at" class="col-sm-2 col-form-label">Updated_at</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="updated_at" value="">
          </div>
        </div> -->
        <div class="mb-3">
          <div class="offset-sm-2 col-sm-10">
            <input type="hidden" name="action" value="{{ $action }}">
            <button type="submit" class="btn btn-primary">Tambah</button>
            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Batal</button>
          </div>
        </div>
        {{ csrf_field() }}
      </form>
      @elseif($action == 'update')
      <!-- @if ($errors->any())
      @foreach ($errors->all() as $error)
      <div>{{$error}}</div>
      @endforeach
      @endif -->
      <form class="form-horizontal" action="{{ asset('/') }}users/{{ $row->id }}" method="post">
        <!-- <div class="mb-3 row">
          <label for="id" class="col-sm-2 col-form-label">Id</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="id" value="{{ $row->id }}">
          </div>
        </div> -->
        <div class="mb-3 row">
          <label for="nip" class="col-sm-2 col-form-label">NIP</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="nip" value="{{ $row->nip }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="name" class="col-sm-2 col-form-label">Name</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="name" value="{{ $row->name }}">
          </div>
        </div>
        <div class="mb-3 row">
          <label for="email" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="email" value="{{ $row->email }}">
          </div>
        </div>
        <!-- <div class="mb-3 row">
          <label for="email_verified_at" class="col-sm-2 col-form-label">Email_verified_at</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="email_verified_at" value="{{ $row->email_verified_at }}">
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="role" class="col-sm-2 col-form-label">Role</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="role" value="{{ $row->role }}">
          </div>
        </div> -->
        <div class="mb-3 row">
          <label for="password" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input class="form-control" type="password" name="password" value="">
            Kosongkan! Jika tidak ubah password.
          </div>
        </div>
        <div class="mb-3 row">
          <label for="password" class="col-sm-2 col-form-label">Confirm Password</label>
          <div class="col-sm-10">
            <input class="form-control" type="password" name="confirmed" value="">
            Kosongkan! Jika tidak ubah password.
          </div>
        </div>
        <!-- <div class="mb-3 row">
          <label for="remember_token" class="col-sm-2 col-form-label">Remember_token</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="remember_token" value="{{ $row->remember_token }}">
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="created_at" class="col-sm-2 col-form-label">Created_at</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="created_at" value="{{ $row->created_at }}">
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="updated_at" class="col-sm-2 col-form-label">Updated_at</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="updated_at" value="{{ $row->updated_at }}">
          </div>
        </div> -->
        <div class="mb-3">
          <div class="offset-sm-2 col-sm-10">
            @method("PATCH")
            <input type="hidden" name="action" value="{{ $action }}">
            <input type="hidden" name="id" value="{{ $row->id }}">
            <button type="submit" class="btn btn-warning">Edit</button>
            <button type="button" class="btn btn-secondary" onclick="button_cancel()">Batal</button>
          </div>
        </div>
        {{ csrf_field() }}
      </form>
      @elseif($action == 'delete')
      <form class="form-horizontal" action="{{ asset('/') }}users/{{ $row->id }}" method="post">
        <!-- <div class="mb-3 row">
          <label for="id" class="col-sm-2 control-label">Id</label>
          <div class="col-sm-10">
            {{ $row->id }}
          </div>
        </div> -->
        <div class="mb-3 row">
          <label for="nip" class="col-sm-2 control-label">NIP</label>
          <div class="col-sm-10">
            {{ $row->nip }}
          </div>
        </div>
        <div class="mb-3 row">
          <label for="name" class="col-sm-2 control-label">Name</label>
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
        <!-- <div class="mb-3 row">
          <label for="email_verified_at" class="col-sm-2 control-label">Email_verified_at</label>
          <div class="col-sm-10">
            {{ $row->email_verified_at }}
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="role" class="col-sm-2 control-label">Role</label>
          <div class="col-sm-10">
            {{ $row->role }}
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="password" class="col-sm-2 control-label">Password</label>
          <div class="col-sm-10">
            {{ $row->password }}
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="remember_token" class="col-sm-2 control-label">Remember_token</label>
          <div class="col-sm-10">
            {{ $row->remember_token }}
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="created_at" class="col-sm-2 control-label">Created_at</label>
          <div class="col-sm-10">
            {{ $row->created_at }}
          </div>
        </div> -->
        <!-- <div class="mb-3 row">
          <label for="updated_at" class="col-sm-2 control-label">Updated_at</label>
          <div class="col-sm-10">
            {{ $row->updated_at }}
          </div>
        </div> -->
        <div class="mb-3">
          <div class="offset-sm-2 col-sm-10">
            @method("DELETE")
            <input type="hidden" name="action" value="{{ $action }}">
            <input type="hidden" name="id" value="{{ $row->id }}">
            <button type="submit" class="btn btn-danger">Hapus</button>
            <button type="button" class="btn btn-primary" onclick="button_cancel()">Batal</button>
          </div>
        </div>
        {{ csrf_field() }}
      </form>
      @elseif($action == 'detail')
      <!-- <div class="mb-3 row">
        <label for="id" class="col-sm-2 control-label">Id</label>
        <div class="col-sm-10">
          {{ $row->id }}
        </div>
      </div> -->
      <div class="mb-3 row">
        <label for="nip" class="col-sm-2 control-label">NIP</label>
        <div class="col-sm-10">
          {{ $row->nip }}
        </div>
      </div>
      <div class="mb-3 row">
        <label for="name" class="col-sm-2 control-label">Name</label>
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
      <!-- <div class="mb-3 row">
        <label for="email_verified_at" class="col-sm-2 control-label">Email_verified_at</label>
        <div class="col-sm-10">
          {{ $row->email_verified_at }}
        </div>
      </div> -->
      <!-- <div class="mb-3 row">
        <label for="role" class="col-sm-2 control-label">Role</label>
        <div class="col-sm-10">
          {{ $row->role }}
        </div>
      </div> -->
      <!-- <div class="mb-3 row">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
          {{ $row->password }}
        </div>
      </div> -->
      <!-- <div class="mb-3 row">
        <label for="remember_token" class="col-sm-2 control-label">Remember_token</label>
        <div class="col-sm-10">
          {{ $row->remember_token }}
        </div>
      </div> -->
      <!-- <div class="mb-3 row">
        <label for="created_at" class="col-sm-2 control-label">Created_at</label>
        <div class="col-sm-10">
          {{ $row->created_at }}
        </div>
      </div> -->
      <!-- <div class="mb-3 row">
        <label for="updated_at" class="col-sm-2 control-label">Updated_at</label>
        <div class="col-sm-10">
          {{ $row->updated_at }}
        </div>
      </div> -->
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