<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\MonthsController;
use App\Http\Controllers\SalariesController;
use App\Http\Controllers\AllowancesController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\GrandController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes(['register' => false, 'reset' => false]);
// Auth::routes(['register' => true]);
Route::middleware(['auth', 'checkrole:user,admin'])->group(
	function () {
		Route::get('/', function () {
			return view('/home');
		});
		Route::get('/home', [HomeController::class, 'index'])->name('home');
		Route::get('/password/{id}', [UsersController::class, 'password']);
		Route::post('/passwordupdate', [UsersController::class, 'passwordupdate']);

		Route::controller(SalariesController::class)->group(function () {
			Route::get('/dibayarkanlist', 'dibayarkanlist')->name('dibayarkanlist');
			Route::get('/dibayarkan/{id}', 'dibayarkan')->name('dibayarkan');
			Route::get('/dibayarkanpdf/{id}', 'dibayarkanpdf')->name('dibayarkanpdf');
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
		});
	}
);

Route::middleware(['auth', 'checkrole:admin'])->group(
	function () {
		Route::get('/unggahgaji', [HomeController::class, 'unggahgaji'])->name('unggahgaji');

		Route::resource('users', UsersController::class);
		Route::get('/users/{idusers}/delete', [UsersController::class, 'delete']);
		Route::get('/passwordhash', [UsersController::class, 'passwordhash']);

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
	}
);
