<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GrandController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MonthsController;
use App\Http\Controllers\SatkerController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\SalariesController;
use App\Http\Controllers\PotonganController;
use App\Http\Controllers\AllowancesController;
use App\Http\Controllers\MealsController;
use App\Http\Controllers\TransportController;
use App\Http\Controllers\NomenklaturController;

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
	}
);

Route::middleware(['auth', 'checkrole:superadmin'])->group(
	function () {
		Route::resource('satker', SatkerController::class);
		Route::get('/satker/{idsatker}/delete', [SatkerController::class,'delete']);
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

		Route::controller(PresenceController::class)->group(function () {
			Route::get('/presensilist', 'presensilist')->name('presensilist');
			Route::get('/presensi/{id}', 'presensi')->name('presensi');
			Route::get('/presensiform/{id}', 'presensiform')->name('presensiform');
			Route::post('/presensiedit', 'presensiedit')->name('presensiedit');
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

		Route::resource('grand', GrandController::class);
		Route::controller(GrandController::class)->prefix('grand')->group(function () {
			Route::get('create/{month_id}', 'create');
			Route::get('show/{month_id}/{id}', 'show');
			Route::get('{month_id}/{id}/edit', 'edit');
			Route::get('{month_id}/{id}/delete', 'delete');
			Route::get('data/{month_id}', 'data');
			Route::post('import', 'import');
			Route::get('remove/{month_id}', 'remove');
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
		});

		Route::resource('nomenklatur', NomenklaturController::class);
		Route::get('/nomenklatur/{idnomenklatur}/delete', [NomenklaturController::class, 'delete']);
	}
);


