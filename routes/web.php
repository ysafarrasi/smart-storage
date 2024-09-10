<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BoardController;
use App\Http\Controllers\WeaponController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PersonnelController;

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

Route::get('/dashboard', [DashboardController::class, 'showDATAHome'])->name('dashboard');

Route::get('/board',  [BoardController::class, 'ShowDataBoard'])->name('board');
Route::get('/load-data', [BoardController::class, 'loadData'])->name('load-data');

Route::get('/weapon',  [WeaponController::class, 'ShowDataWeapon'])->name('weapon');
Route::get('/personnel',  [PersonnelController::class, 'index'])->name('personnel');

Route::post('/personnel',  [PersonnelController::class, 'store']);
Route::get('/fetch-personnel', [PersonnelController::class, 'fetchPersonnel'])->name('fetch-personnel');

Route::get('/personnel-add',  [PersonnelController::class, 'create'])->name('personnel-add');
