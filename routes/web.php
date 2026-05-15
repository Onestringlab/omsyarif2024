<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GrandController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MonthsController;
use App\Http\Controllers\SatkerController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\PresensiumController;
use App\Http\Controllers\SalariesController;
use App\Http\Controllers\PotonganController;
use App\Http\Controllers\AllowancesController;
use App\Http\Controllers\MealsController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\NomenklaturController;
use App\Http\Controllers\SalaryShortagesController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PegawaiDokumenController;
use App\Http\Controllers\PegawaiKKController;
use App\Http\Controllers\SKKController;		
use App\Imports\ShortStagesModel;

Auth::routes(['register' => false, 'reset' => false]);
// Auth::routes(['register' => true]);


Route::middleware(['auth', 'checkrole:user,admin,superadmin'])->group(
	function () {

		Route::get('/', [HomeController::class, 'index'])->name('home')->middleware(['auth']);
		Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth']);

		Route::get('/password/{id}', [UsersController::class, 'password']);
		Route::post('/passwordupdate', [UsersController::class, 'passwordupdate']);
	}
);

Route::middleware(['auth', 'checkrole:user,superadmin'])->group(
	function () {
		Route::resource('users', UsersController::class);
		Route::get('/users/{idusers}/delete', [UsersController::class, 'delete']);
	}
);

Route::middleware(['auth', 'checkrole:admin,superadmin'])->group(
	function () {
		Route::resource('users', UsersController::class);
		Route::get('/users/{idusers}/delete', [UsersController::class, 'delete']);
		Route::resource('pegawai', PegawaiController::class);
		Route::post('/pegawai/import', [PegawaiController::class, 'import'])->name('pegawai.import');
		Route::get(
			'/pegawai/{pegawai}/konfirmasi-hapus',
			[PegawaiController::class, 'confirmDelete']
		)->name('pegawai.confirm-delete');

		Route::get(
			'/pegawai/{pegawai}/keluarga',
			[PegawaiDokumenController::class, 'indexKeluarga']
		)->name('pegawai.keluarga.index');

		Route::get('/pegawai/{id}/uploadkk', [PegawaiKKController::class, 'uploadFormKK'])->name('pegawai.uploadkk');
		Route::post('/pegawai/uploadkk', [PegawaiKKController::class, 'processUploadKK'])->name('pegawai.uploadkk.process');
		Route::post('/pegawai/uploadkk/save', [PegawaiKKController::class, 'saveKK'])->name('pegawai.uploadkk.save');
		Route::get('/pegawai/{nip}/keluarga/edit', [PegawaiKKController::class, 'editKeluarga'])->name('pegawai.keluarga.edit');
		Route::put('/pegawai/{nip}/keluarga', [PegawaiKKController::class, 'updateKeluarga'])->name('pegawai.keluarga.update');

		Route::prefix('skk')->name('skk.')->group(function () {
			Route::get('/create/{keluargaPegawaiId}', [SKKController::class, 'create'])->name('create');
			Route::post('/store/{keluargaPegawaiId}', [SKKController::class, 'store'])->name('store');
			Route::get('/download/{id}', [SKKController::class, 'download'])->name('download');
			Route::get('/edit/{id}', [SKKController::class, 'edit'])->name('edit');
			Route::put('/update/{id}', [SKKController::class, 'update'])->name('update');
			Route::delete('/destroy/{id}', [SKKController::class, 'destroy'])->name('destroy');
			Route::get('/narasi/{id}', [SKKController::class, 'narasi'])->name('narasi');
		});

	}
);

Route::middleware(['auth', 'checkrole:admin,superadmin'])->group(function () {
    Route::get(
        '/pegawai/{nip}/dokumen/{jenis}/upload',
        [PegawaiDokumenController::class, 'createUpload']
    )->name('pegawai.dokumen.upload');

    Route::post(
        '/pegawai/{nip}/dokumen/{jenis}/upload',
        [PegawaiDokumenController::class, 'storeUpload']
    )->name('pegawai.dokumen.store');

    Route::get(
        '/pegawai/dokumen/{id}/download',
        [PegawaiDokumenController::class, 'download']
    )->name('pegawai.dokumen.download');

    Route::delete(
        '/pegawai/dokumen/{id}',
        [PegawaiDokumenController::class, 'destroy']
    )->name('pegawai.dokumen.destroy');

	Route::get(
		'/pegawai/dokumen/{id}/edit-metadata',
		[PegawaiDokumenController::class, 'editMetadata']
	)->name('pegawai.dokumen.edit-metadata');

	Route::put(
		'/pegawai/dokumen/{id}/edit-metadata',
		[PegawaiDokumenController::class, 'updateMetadata']
	)->name('pegawai.dokumen.update-metadata');
});

Route::middleware(['auth', 'checkrole:superadmin'])->group(
	function () {
		Route::resource('satker', SatkerController::class);
		Route::get('/satker/{idsatker}/delete', [SatkerController::class, 'delete']);
	}
);

Route::middleware(['auth', 'checkrole:user'])->group(
	function () {
		Route::controller(SalariesController::class)->group(function () {
			Route::get('/dibayarkanlist', 'dibayarkanlist')->name('dibayarkanlist');
			Route::get('/dibayarkan/{id}', 'dibayarkan')->name('dibayarkan');
			Route::get('/dibayarkanpdf/{id}', 'dibayarkanpdf')->name('dibayarkanpdf');
		});

		Route::controller(PotonganController::class)->group(function () {
			Route::get('/potongansslip', 'potongansslip')->name('potongansslip');
			Route::get('/potongans/{id}', 'potongans')->name('potongans');
			Route::get('/potonganspdf/{id}', 'potonganspdf')->name('potonganspdf');
		});

		Route::controller(AllowancesController::class)->group(function () {
			Route::get('/bersihlist', 'bersihlist')->name('bersihlist');
			Route::get('/bersih/{id}', 'bersih')->name('bersih');
			Route::get('/bersihpdf/{id}', 'bersihpdf')->name('bersihpdf');
		});

		Route::controller(SalaryShortagesController::class)->group(function () {
			Route::get('/kekuranganlist', 'kekuranganlist')->name('kekuranganlist');
			Route::get('/kekurangan/{id}', 'kekurangan')->name('kekurangan');
			Route::get('/kekuranganpdf/{id}', 'kekuranganpdf')->name('kekuranganpdf');
		});

		Route::controller(PresenceController::class)->group(function () {
			Route::get('/presensilist', 'presensilist')->name('presensilist');
			Route::get('/presensi/{id}', 'presensi')->name('presensi');
			Route::get('/presensiform/{id}', 'presensiform')->name('presensiform');
			Route::post('/presensiedit', 'presensiedit')->name('presensiedit');
		});

		Route::controller(PresensiumController::class)->group(function () {
			Route::get('/presensiumlist', 'presensiumlist')->name('presensiumlist');
			Route::get('/presensium/{id}', 'presensium')->name('presensium');
			Route::get('/presensiumform/{id}', 'presensiumform')->name('presensiumform');
			Route::post('/presensiumedit', 'presensiumedit')->name('presensiumedit');
		});

		Route::controller(GrandController::class)->group(function () {
			Route::get('/tungkinlist', 'tungkinlist')->name('tungkinlist');
			Route::get('/tungkin/{id}', 'tungkin')->name('tungkin');
			Route::get('/tungkinform/{id}', 'tungkinform')->name('tungkinform');
			Route::post('/tungkinedit', 'tungkinedit')->name('tungkinedit');
			Route::get('/tungkinpdf/{id}', 'tungkinpdf')->name('tungkinpdf');
		});

		Route::controller(MealsController::class)->group(function () {
			Route::get('/makanlist', 'makanlist')->name('makanlist');
			Route::get('/makan/{id}', 'makan')->name('makan');
			Route::get('/makanpdf/{id}', 'makanpdf')->name('makanpdf');
		});

		Route::controller(TransportController::class)->group(function () {
			Route::get('/kendaraanlist', 'kendaraanlist')->name('kendaraanlist');
			Route::get('/kendaraan/{id}', 'kendaraan')->name('kendaraan');
			Route::get('/kendaraanpdf/{id}', 'kendaraanpdf')->name('kendaraanpdf');
		});

		Route::controller(PegawaiController::class)->group(function () {
			Route::get('/profil-pegawai','profilSaya')->name('profil.profil-pegawai');
			Route::get('/profil-pegawai/dokumen/{id}/download','downloadDokumenSaya')->name('pegawai.profil-saya.download-dokumen');
		});
		Route::prefix('skk')->name('skk.')->group(function () {
			Route::get('/download/{id}', [SKKController::class, 'download'])->name('download');
		});
	}
);

Route::middleware(['auth', 'checkrole:admin'])->group(
	function () {
		Route::resource('months', MonthsController::class);
		Route::get('/months/{idmonths}/delete', [MonthsController::class, 'delete']);

		Route::resource('salaries', SalariesController::class);
		Route::controller(SalariesController::class)->prefix('salaries')->group(function () {
			Route::get('create/{month_id}', 'create');
			Route::get('show/{month_id}/{id}', 'show');
			Route::get('{month_id}/{id}/edit', 'edit');
			Route::get('{month_id}/{id}/delete', 'delete');
			Route::get('data/{month_id}', 'data');
			Route::post('import', 'import');
			Route::get('remove/{month_id}', 'remove');
		});

		Route::resource('potongans', PotonganController::class);
		Route::controller(PotonganController::class)->prefix('potongans')->group(function () {
			Route::get('create/{month_id}', 'create');
			Route::get('show/{month_id}/{id}', 'show');
			Route::get('{month_id}/{id}/edit', 'edit');
			Route::get('{month_id}/{id}/delete', 'delete');
			Route::get('data/{month_id}', 'data');
			Route::post('import', 'import');
			Route::get('remove/{month_id}', 'remove');
			Route::get('pdf/{month_id}', 'potonganspdfmonth');
		});

		Route::resource('allowances', AllowancesController::class);
		Route::controller(AllowancesController::class)->prefix('allowances')->group(function () {
			Route::get('create/{month_id}', 'create');
			Route::get('show/{month_id}/{id}', 'show');
			Route::get('{month_id}/{id}/edit', 'edit');
			Route::get('{month_id}/{id}/delete', 'delete');
			Route::get('data/{month_id}', 'data');
			Route::post('import', 'import');
			Route::get('remove/{month_id}', 'remove');
			Route::get('pdf/{month_id}', 'bersihpdfmonth');
		});

		Route::resource('salary-shortages', SalaryShortagesController::class);
		Route::controller(SalaryShortagesController::class)->prefix('salary-shortages')->group(function () {
			Route::get('create/{month_id}', 'create');
			Route::get('show/{month_id}/{id}', 'show');
			Route::get('{month_id}/{id}/edit', 'edit');
			Route::get('{month_id}/{id}/delete', 'delete');
			Route::get('data/{month_id}', 'data');
			Route::post('import', 'import');
			Route::get('remove/{month_id}', 'remove');
			Route::get('pdf/{month_id}', 'kekuranganpdfmonth');
		});

		Route::resource('presence', PresenceController::class);
		Route::controller(PresenceController::class)->prefix('presence')->group(function () {
			Route::get('create/{month_id}', 'create');
			Route::get('show/{month_id}/{id}', 'show');
			Route::get('{month_id}/{id}/edit', 'edit');
			Route::get('{month_id}/{id}/delete', 'delete');
			Route::get('data/{month_id}', 'data');
			Route::post('import', 'import');
			Route::get('remove/{month_id}', 'remove');
		});

		Route::resource('presensium', PresensiumController::class);
		Route::controller(PresensiumController::class)->prefix('presensium')->group(function () {
			Route::get('create/{month_id}', 'create');
			Route::get('show/{month_id}/{id}', 'show');
			Route::get('{month_id}/{id}/edit', 'edit');
			Route::get('{month_id}/{id}/delete', 'delete');
			Route::get('data/{month_id}', 'data');
			Route::post('import', 'import');
			Route::get('remove/{month_id}', 'remove');
		});

		Route::resource('grand', GrandController::class);
		Route::controller(GrandController::class)->prefix('grand')->group(function () {
			Route::get('create/{month_id}', 'create');
			Route::get('show/{month_id}/{id}', 'show');
			Route::get('{month_id}/{id}/edit', 'edit');
			Route::get('{month_id}/{id}/delete', 'delete');
			Route::get('data/{month_id}', 'data');
			Route::post('import', 'import');
			Route::get('remove/{month_id}', 'remove');
			Route::get('pdf/{month_id}', 'tungkinpdfmonth');
		});

		Route::resource('meals', MealsController::class);
		Route::controller(MealsController::class)->prefix('meals')->group(function () {
			Route::get('create/{month_id}', 'create');
			Route::get('show/{month_id}/{id}', 'show');
			Route::get('{month_id}/{id}/edit', 'edit');
			Route::get('{month_id}/{id}/delete', 'delete');
			Route::get('data/{month_id}', 'data');
			Route::post('import', 'import');
			Route::get('remove/{month_id}', 'remove');
			Route::get('pdf/{month_id}', 'makanpdfmonth');
		});

		Route::resource('transport', TransportController::class);
		Route::controller(TransportController::class)->prefix('transport')->group(function () {
			Route::get('create/{month_id}', 'create');
			Route::get('show/{month_id}/{id}', 'show');
			Route::get('{month_id}/{id}/edit', 'edit');
			Route::get('{month_id}/{id}/delete', 'delete');
			Route::get('data/{month_id}', 'data');
			Route::post('import', 'import');
			Route::get('remove/{month_id}', 'remove');
			Route::get('pdf/{month_id}', 'kendaraanpdfmonth');
		});

		Route::resource('nomenklatur', NomenklaturController::class);
		Route::get('/nomenklatur/{idnomenklatur}/delete', [NomenklaturController::class, 'delete']);
	}
);


Route::get('/bersihpdfshare/{encryptedParams}', [AllowancesController::class, 'bersihpdfshare'])->name('bersihpdfshare');
Route::get('/tungkinpdfshare/{encryptedParams}', [GrandController::class, 'tungkinpdfshare'])->name('tungkinpdfshare');
Route::get('/makanpdfshare/{encryptedParams}', [MealsController::class, 'makanpdfshare'])->name('makanpdfshare');
Route::get('/kendaraanpdfshare/{encryptedParams}', [TransportController::class, 'kendaraanpdfshare'])->name('transportpdfshare');
Route::get('/potonganspdfshare/{encryptedParams}', [PotonganController::class, 'potonganspdfshare'])->name('transportpdfshare');
Route::get('/kekuranganpdfshare/{encryptedParams}', [SalaryShortagesController::class, 'kekuranganpdfshare'])->name('kekuranganpdfshare');
