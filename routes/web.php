<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\ButuhBantuanController;
use App\Http\Controllers\DaftarAdminController;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\RegisterAdminController;
use App\Http\Controllers\SearchController;

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


// Route::get('/login', 'LoginController@index');
// Route::post('/login', 'LoginController@login');
// Route::get('/logout', 'LoginController@logout');

Route::get('/home',  [LoginController::class, 'index'])->name('index');

Route::post('/login', [AuthController::class, 'login'])->name('login');





Route::middleware(['auth:sanctum'])->group(function () {

  Route::get('/daftaradmin', [DaftarAdminController::class, 'index'])->name('daftaradmin.index');
  Route::get('/daftaradmin/create', [DaftarAdminController::class, 'create'])->name('daftaradmin.create');
  Route::post('/daftaradmin', [DaftarAdminController::class, 'store'])->name('daftaradmin.store');
  Route::get('/daftaradmin/edit/{id}', [DaftarAdminController::class, 'edit'])->name('daftaradmin.edit');
  Route::put('/daftaradmin/update/{id}', [DaftarAdminController::class, 'update'])->name('daftaradmin.update');
  Route::delete('/daftaradmin/{id}', [DaftarAdminController::class, 'destroy'])->name('daftaradmin.destroy');

  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

  Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
  Route::get('/api/dashboard', [DashboardController::class, 'getDashboard']);

  Route::get('/board',  [BoardController::class, 'ShowDataBoard'])->name('board');
  Route::get('/load-data', action: [BoardController::class, 'loadData'])->name('load-data');

  Route::get('/weapon',  [WeaponController::class, 'index'])->name('weapon');
  Route::get('/weapons/filter/{timeframe}', [WeaponController::class, 'filter'])->name('senjata.filter');


  Route::get('/personnel',  [PersonnelController::class, 'index'])->name('personnel');
  Route::get('/personnel/add-personnel',  [PersonnelController::class, 'create'])->name('personnel-add');
  Route::post('/personnel',  [PersonnelController::class, 'store'])->name('personnel-store');
  Route::get('/personnel/edit/{id}', [PersonnelController::class, 'edit'])->name('personnel-edit');
  Route::patch('/personnel/update/{id}', [PersonnelController::class, 'update'])->name('personnel-update');
  Route::delete('/personnel/delete/{id}',  [PersonnelController::class, 'destroy'])->name('personnel-delete');

  Route::get('/fetch-personnel', [PersonnelController::class, 'fetchPersonnel'])->name('fetch-personnel');
  route::get('/help', [ButuhBantuanController::class, 'index'])->name('help');

  // Route::match(['get', 'post'], '/search', [SearchController::class, 'index'])->name('search.index');
});

Route::get('setlocale/{locale}', function ($locale) {
  if (in_array($locale, ['en', 'id'])) {
    session(['locale' => $locale]);
  }
  return redirect()->back();
})->name('setlocale');

Route::get('setlocale/{locale?}', function ($locale = null) {
  if (!$locale) {
    $locale = app()->getLocale(); // Detect the user's preferred language
  }

  if (in_array($locale, ['en', 'id'])) {
    session(['locale' => $locale]);
  }

  return redirect()->back();
})->name('setlocale.optional');


// Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
// Route::get('/dashboard', [DashboardController::class, 'showDATAHome'])->middleware('auth')->name('dashboard');

// Route::get('/board',  [BoardController::class, 'ShowDataBoard'])->middleware('auth')->name('board');
// Route::get('/load-data', action: [BoardController::class, 'loadData'])->name('load-data');

// Route::get('/weapon',  [WeaponController::class, 'index'])->name('weapon');

// Route::get('/personnel',  [PersonnelController::class, 'index'])->name('personnel');
// Route::get('/personnel/add-personnel',  [PersonnelController::class, 'store'])->name('personnel-add');
// Route::get('/fetch-personnel', [PersonnelController::class, 'fetchPersonnel'])->name('fetch-personnel');
// // Route::get('/personnel-add',  [PersonnelController::class, 'create'])->name('personnel-add');

// Route::get('setlocale/{locale}', function ($locale) {
//   if (in_array($locale, ['en', 'id'])) {
//       session(['locale' => $locale]);
//   }
//   return redirect()->back();
// })->name('setlocale');

// Route::get('setlocale/{locale?}', function ($locale = null) {
//   if (!$locale) {
//       $locale = app()->getLocale(); // Detect the user's preferred language
//   }

//   if (in_array($locale, ['en', 'id'])) {
//       session(['locale' => $locale]);
//   }

//   return redirect()->back();
// })->name('setlocale');

// // routes/web.php
// use App\Http\Controllers\SearchController;

// Route::match(['get', 'post'], '/search', [SearchController::class, 'index'])->name('search.index');
