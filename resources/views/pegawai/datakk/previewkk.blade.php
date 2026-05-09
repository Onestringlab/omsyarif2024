@extends('layouts.app')

@section('title')
Preview Data Keluarga
@endsection

@section('content')
<div class="container">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('pegawai.index') }}">Data Pegawai</a>
            </li>
            <li class="breadcrumb-item">
                <a href="{{ route('pegawai.uploadkk', $data['pegawai']->nip) }}">Unggah PDF Data Keluarga</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                Tinjauan Data Keluarga
            </li>
        </ol>
    </nav>

    <div class="card border-success shadow-sm">
        <h5 class="card-header text-bg-success mb-0">
            Tinjauan Data Keluarga - {{ $data['pegawai']->nama }}
        </h5>

        <div class="card-body">
            <div class="row py-2">
                <div class="col-md-3 fw-bold">NIP</div>
                <div class="col-md-9">: {{ $data['nip'] }}</div>
            </div>
            <div class="row py-2">
                <div class="col-md-3 fw-bold">Nama</div>
                <div class="col-md-9">: {{ $data['nama'] }}</div>
            </div>
            <div class="row py-2">
                <div class="col-md-3 fw-bold">Tanggal Lahir</div>
                <div class="col-md-9">: {{ $data['tanggal_lahir'] }}</div>
            </div>
        </div>

        <form action="{{ route('pegawai.uploadkk.save') }}" method="POST">
            @csrf

            <div class="card-body pt-0">
                <div class="row py-2 mb-3">
                    <div class="col-md-3 fw-bold">Jumlah Data Keluarga</div>
                    <div class="col-md-9">: <span id="jumlahBaris">{{ count($data['keluarga']) }}</span></div>
                </div>

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
                                    <button type="button" class="btn btn-primary btn-sm" id="btnTambahBaris">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($data['keluarga'] as $i => $item)
                                <tr>
                                    <td class="text-center nomor-row">{{ $i + 1 }}.</td>
                                    <td>
                                        <input type="text"
                                                name="keluarga[{{ $i }}][nama]"
                                                class="form-control"
                                                value="{{ $item['nama'] ?? '' }}">
                                    </td>
                                    <td>
                                        <input type="text"
                                                name="keluarga[{{ $i }}][tanggal_lahir]"
                                                class="form-control"
                                                placeholder="dd-mm-yyyy"
                                                value="{{ $item['tanggal_lahir'] ?? '' }}">
                                    </td>
                                    <td>
                                        <select name="keluarga[{{ $i }}][hubungan]" class="form-select">
                                            <option value="Istri" {{ ($item['hubungan'] ?? '') == 'Istri' ? 'selected' : '' }}>Istri</option>
                                            <option value="Suami" {{ ($item['hubungan'] ?? '') == 'Suami' ? 'selected' : '' }}>Suami</option>
                                            <option value="Anak Kandung" {{ ($item['hubungan'] ?? '') == 'Anak Kandung' ? 'selected' : '' }}>Anak Kandung</option>
                                            <option value="Anak Angkat" {{ ($item['hubungan'] ?? '') == 'Anak Angkat' ? 'selected' : '' }}>Anak Angkat</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="keluarga[{{ $i }}][tanggungan]" class="form-select">
                                            <option value="Ya" {{ ($item['tanggungan'] ?? '') == 'Ya' ? 'selected' : '' }}>Ya</option>
                                            <option value="Tidak" {{ ($item['tanggungan'] ?? '') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                                        </select>
                                    </td>
                                    <td>
                                        <select name="keluarga[{{ $i }}][sekolah]" class="form-select">
                                            <option value="-" {{ ($item['sekolah'] ?? '') == '-' ? 'selected' : '' }}>-</option>
                                            <option value="Kuliah" {{ ($item['sekolah'] ?? '') == 'Kuliah' ? 'selected' : '' }}>Kuliah</option>
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
                                    <td colspan="7" class="text-center text-muted kosong-row">
                                        Data keluarga tidak ditemukan dari hasil parsing PDF.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 d-flex flex-wrap gap-2">
                    <input type="hidden" name="nip" value="{{ $data['pegawai']->nip }}">
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
        const rows = tbody.querySelectorAll('tr:not(.row-kosong)');

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

    function hapusRowKosongJikaAda() {
        const rowKosong = tbody.querySelector('.row-kosong');
        if (rowKosong) {
            rowKosong.remove();
        }
    }

    function tampilkanRowKosongJikaPerlu() {
        const rows = tbody.querySelectorAll('tr');
        if (rows.length === 0) {
            const tr = document.createElement('tr');
            tr.classList.add('row-kosong');
            tr.innerHTML = `
                <td colspan="7" class="text-center text-muted kosong-row">
                    Belum ada data keluarga. Klik tombol + untuk menambah baris.
                </td>
            `;
            tbody.appendChild(tr);
        }
    }

    btnTambahBaris.addEventListener('click', function () {
        hapusRowKosongJikaAda();

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
        tampilkanRowKosongJikaPerlu();
    });

    updateRowNumbersAndNames();
    tampilkanRowKosongJikaPerlu();
});
</script>
@endsection