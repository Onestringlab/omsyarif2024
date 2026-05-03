@extends('layouts.app')

@section('title')
Preview Data Keluarga
@endsection

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ asset('/users') }}">Data Pengguna</a></li>
        <li class="breadcrumb-item"><a href="{{ asset('/users/'.$data['user']->id.'/uploadkk') }}"> Unggah PDF Data Keluarga</a></li>
        <li class="breadcrumb-item active" aria-current="page"> Tinjauan Data Keluarga</li>
        </ol>
    </nav>
    <div class="card border-success">
        <h5 class="card-header text-bg-success"> Tinjauan Data Keluarga</h5>
        <div class="card-body">
            <p><b>Nama:</b> {{ $data['nama'] }}</p>
            <p><b>NIP:</b> {{ $data['nip'] }}</p>
            <p><b>Tanggal Lahir:</b> {{ $data['tanggal_lahir'] }}</p>
        </div>
        <div>
            <form action="{{ route('users.uploadkk.save') }}" method="POST">
                @csrf
                <div class="card-body table-responsive">
                    <table class="table table-striped table-hover ">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Hubungan</th>
                                <th>Tanggungan</th>
                                <th>Sekolah</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['keluarga'] as $i => $item)
                            <tr>
                                <td>
                                    <input type="text" name="keluarga[{{ $i }}][nama]" 
                                        class="form-control" value="{{ $item['nama'] }}">
                                </td>

                                <td>
                                    <input type="text" name="keluarga[{{ $i }}][tanggal_lahir]" 
                                        class="form-control" value="{{ $item['tanggal_lahir'] }}">
                                </td>

                                <td>
                                    <select name="keluarga[{{ $i }}][hubungan]" class="form-control">
                                        <option value="Istri" {{ $item['hubungan']=='Istri'?'selected':'' }}>Istri</option>
                                        <option value="Suami" {{ $item['hubungan']=='Suami'?'selected':'' }}>Suami</option>
                                        <option value="Anak Kandung" {{ $item['hubungan']=='Anak Kandung'?'selected':'' }}>Anak Kandung</option>
                                        <option value="Anak Angkat" {{ $item['hubungan']=='Anak Angkat'?'selected':'' }}>Anak Angkat</option>
                                    </select>
                                </td>

                                <td>
                                    <select name="keluarga[{{ $i }}][tanggungan]" class="form-control">
                                        <option value="Ya" {{ $item['tanggungan']=='Ya'?'selected':'' }}>Ya</option>
                                        <option value="Tidak" {{ $item['tanggungan']=='Tidak'?'selected':'' }}>Tidak</option>
                                    </select>
                                </td>

                                <td>
                                    <select name="keluarga[{{ $i }}][sekolah]" class="form-control">
                                        <option value="-" {{ $item['sekolah']=='-'?'selected':'' }}>-</option>
                                        <option value="SD" {{ $item['sekolah']=='SD'?'selected':'' }}>SD</option>
                                        <option value="SMP" {{ $item['sekolah']=='SMP'?'selected':'' }}>SMP</option>
                                        <option value="SMA" {{ $item['sekolah']=='SMA'?'selected':'' }}>SMA</option>
                                        <option value="Kuliah" {{ $item['sekolah']=='Kuliah'?'selected':'' }}>Kuliah</option>
                                    </select>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="card-footer text-end">
                    <input type="hidden" name="id" value="{{ $data['user']->id }}">
                    <button type="submit" class="btn btn-success">
                        Simpan ke Database
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection