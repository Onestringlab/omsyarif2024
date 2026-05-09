@extends('layouts.app')

@section('title')
Edit Data Keluarga
@endsection

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
            </li>
            <li class="breadcrumb-item"><a href="{{ route('pegawai.show', $pegawai->id) }}">{{ $pegawai->nama }}</a></li>

            <li class="breadcrumb-item active" aria-current="page">
                Edit Data Keluarga
            </li>
        </ol>
    </nav>

    <div class="card border-success shadow-sm">
        <h5 class="card-header text-bg-success mb-0">
            Edit Data Keluarga - {{ $pegawai->nama }}
        </h5>

        <form action="{{ route('pegawai.keluarga.update', $pegawai->nip) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success">
                    {{ session('success') }}
                    </div>
                @endif
                <div class="row py-2">
                    <div class="col-md-3 fw-bold">NIP</div>
                    <div class="col-md-9">: {{ $pegawai->nip }}</div>
                </div>
                <div class="row py-2">
                    <div class="col-md-3 fw-bold">Nama Pegawai</div>
                    <div class="col-md-9">: {{ $pegawai->nama }}</div>
                </div>
                <div class="row py-2">
                    <div class="col-md-3 fw-bold">Jumlah Data Keluarga</div>
                    <div class="col-md-9">: <span id="jumlahBaris">{{ $keluarga->count() }}</span></div>
                </div>
            </div>

            <div class="card-body pt-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle" id="tabelKeluarga">
                        <thead class="table-success">
                            <tr>
                                <th width="60">No</th>
                                <th>Nama</th>
                                <th width="180">Tanggal Lahir</th>
                                <th width="180">Hubungan</th>
                                <th width="150">Tanggungan</th>
                                <th width="150">Sekolah</th>
                                <th width="100" class="text-center">
                                    <button type="button" class="btn btn-primary" id="btnTambahBaris">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($keluarga as $i => $item)
                                <tr>
                                    <td class="text-center nomor-row">{{ $i + 1 }}.</td>
                                    <td>
                                        <input type="text"
                                                name="keluarga[{{ $i }}][nama]"
                                                class="form-control"
                                                value="{{ old('keluarga.'.$i.'.nama', $item->nama) }}">
                                    </td>
                                    <td>
                                        <input type="text"
                                                name="keluarga[{{ $i }}][tanggal_lahir]"
                                                class="form-control"
                                                placeholder="dd-mm-yyyy"
                                                value="{{ old('keluarga.'.$i.'.tanggal_lahir', $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('d-m-Y') : '') }}">
                                    </td>
                                    <td>
                                        <select name="keluarga[{{ $i }}][hubungan]" class="form-select">
                                            <option value="Istri" {{ old('keluarga.'.$i.'.hubungan', $item->hubungan) == 'Istri' ? 'selected' : '' }}>Istri</option>
                                            <option value="Suami" {{ old('keluarga.'.$i.'.hubungan', $item->hubungan) == 'Suami' ? 'selected' : '' }}>Suami</option>
                                            <option value="Anak Kandung" {{ old('keluarga.'.$i.'.hubungan', $item->hubungan) == 'Anak Kandung' ? 'selected' : '' }}>Anak Kandung</option>
                                            <option value="Anak Angkat" {{ old('keluarga.'.$i.'.hubungan', $item->hubungan) == 'Anak Angkat' ? 'selected' : '' }}>Anak Angkat</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="keluarga[{{ $i }}][tanggungan]" class="form-select">
                                            <option value="Ya" {{ old('keluarga.'.$i.'.tanggungan', $item->tanggungan) == 'Ya' ? 'selected' : '' }}>Ya</option>
                                            <option value="Tidak" {{ old('keluarga.'.$i.'.tanggungan', $item->tanggungan) == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="keluarga[{{ $i }}][sekolah]" class="form-select">
                                            <option value="-" {{ old('keluarga.'.$i.'.sekolah', $item->sekolah) == '-' ? 'selected' : '' }}>-</option>
                                            <option value="Kuliah" {{ old('keluarga.'.$i.'.sekolah', $item->sekolah) == 'Kuliah' ? 'selected' : '' }}>Kuliah</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-sm btn-hapus-row">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center nomor-row">1</td>
                                    <td>
                                        <input type="text" name="keluarga[0][nama]" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" name="keluarga[0][tanggal_lahir]" class="form-control" placeholder="dd-mm-yyyy">
                                    </td>
                                    <td>
                                        <select name="keluarga[0][hubungan]" class="form-select">
                                            <option value="Istri">Istri</option>
                                            <option value="Suami">Suami</option>
                                            <option value="Anak Kandung">Anak Kandung</option>
                                            <option value="Anak Angkat">Anak Angkat</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="keluarga[0][tanggungan]" class="form-select">
                                            <option value="Ya">Ya</option>
                                            <option value="Tidak">Tidak</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="keluarga[0][sekolah]" class="form-select">
                                            <option value="-">-</option>
                                            <option value="Kuliah">Kuliah</option>
                                        </select>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-sm btn-hapus-row">
                                            <i class="far fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 d-flex flex-wrap gap-2">
                    <input type="hidden" name="nip" value="{{ $pegawai->nip }}">
                    <button type="submit" class="btn btn-success">
                        Simpan
                    </button>
                    <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">
                        Kembali
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tbody = document.querySelector('#tabelKeluarga tbody');
    const btnTambahBaris = document.getElementById('btnTambahBaris');
    const jumlahBaris = document.getElementById('jumlahBaris');

    function updateRowNumbersAndNames() {
        const rows = tbody.querySelectorAll('tr');

        rows.forEach((row, index) => {
            const nomor = row.querySelector('.nomor-row');
            if (nomor) {
                nomor.textContent = index + 1 + '.';
            }

            row.querySelectorAll('input, select').forEach(el => {
                const name = el.getAttribute('name');
                if (name) {
                    el.setAttribute('name', name.replace(/keluarga\[\d+\]/, 'keluarga[' + index + ']'));
                }
            });
        });

        jumlahBaris.textContent = rows.length;
    }

    btnTambahBaris.addEventListener('click', function () {
        const index = tbody.querySelectorAll('tr').length;

        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td class="text-center nomor-row">${index + 1}</td>
            <td>
                <input type="text" name="keluarga[${index}][nama]" class="form-control">
            </td>
            <td>
                <input type="text" name="keluarga[${index}][tanggal_lahir]" class="form-control" placeholder="dd-mm-yyyy">
            </td>
            <td>
                <select name="keluarga[${index}][hubungan]" class="form-select">
                    <option value="Istri">Istri</option>
                    <option value="Suami">Suami</option>
                    <option value="Anak Kandung" selected>Anak Kandung</option>
                    <option value="Anak Angkat">Anak Angkat</option>
                </select>
            </td>
            <td>
                <select name="keluarga[${index}][tanggungan]" class="form-select">
                    <option value="Ya">Ya</option>
                    <option value="Tidak" selected>Tidak</option>
                </select>
            </td>
            <td>
                <select name="keluarga[${index}][sekolah]" class="form-select">
                    <option value="-" selected>-</option>
                    <option value="Kuliah">Kuliah</option>
                </select>
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm btn-hapus-row">
                    <i class="far fa-trash-alt"></i>
                </button>
            </td>
        `;

        tbody.appendChild(tr);
        updateRowNumbersAndNames();
    });

    tbody.addEventListener('click', function (e) {
        const tombolHapus = e.target.closest('.btn-hapus-row');

        if (!tombolHapus) {
            return;
        }

        tombolHapus.closest('tr').remove();
        updateRowNumbersAndNames();
    });

    updateRowNumbersAndNames();
});
</script>
@endsection