<?php

use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArduinoController;
use App\Http\Controllers\AuthAPIController;
use App\Http\Controllers\Arduino1Controller;
use App\Http\Controllers\APIWeaponController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\APIDashboardController;
use App\Http\Controllers\APIPersonnelController;
use App\Http\Controllers\APIUserController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Rute User Management tanpa autentikasi (untuk pendaftaran)
Route::post('/user/create', [APIUserController::class, 'store']);
Route::post('/login', [AuthAPIController::class, 'login']);

// Rute CRUD User Management dengan autentikasi
Route::get('/user', [APIUserController::class, 'index']);
Route::get('/user/show/{user}', [APIUserController::class, 'show']);
Route::put('/user/update', [APIUserController::class, 'update']);
Route::delete('/user/destroy/{user}', [APIUserController::class, 'destroy']);
Route::post('/user/update-password', [APIUserController::class, 'updatePassword']);

// Rute untuk logout
Route::post('/logout', [AuthAPIController::class, 'logout']);

// Rute lainnya dengan autentikasi
Route::get('dashboard', [APIDashboardController::class, 'index']);
Route::get('dashboard-show', [APIDashboardController::class, 'show']);

// Rute untuk data personnel
Route::get('personnel-data', [APIPersonnelController::class, 'getPersonnel']);

Route::get('personnel', [APIPersonnelController::class, 'PersonnelData']);
// Rute terkait Arduino
Route::post('load-cell-data', [ArduinoController::class, 'postLoadCellData']);
Route::post('rfid-data', [ArduinoController::class, 'postRFIDData']);
Route::get('data-from-arduino', [ArduinoController::class, 'getData']);

Route::get('load-cells-data', [APIWeaponController::class, 'getLoadCells']);
Route::get('check-load-cell/{loadCellID}', [APIWeaponController::class, 'checkLoadCell']);

// Rute terkait weapons
Route::get('weapons', [APIWeaponController::class, 'getDataWeapon']);
Route::get('load-cell-data', [APIWeaponController::class, 'getDataWeapon']);
Route::get('load-cell-data/{loadCellID}', [APIWeaponController::class, 'filterDataWeapon']);
Route::get('rfid-data', [APIPersonnelController::class, 'getDataRFID']);

// // Rute dengan autentikasi Sanctum
// Route::middleware('auth:sanctum')->group(function () {
//     Route::get('/user', [APIUserController::class, 'index']);
//     Route::post('/user/create', [APIUserController::class, 'store']);
//     Route::get('/user/show/{user}', [APIUserController::class, 'show']);
//     Route::put('/user/update', [APIUserController::class, 'update']);
//     Route::delete('/user/destroy/{user}', [APIUserController::class, 'destroy']);
//     Route::post('/user/update-password', [APIUserController::class, 'updatePassword']);

//     Route::post('/login', [AuthAPIController::class, 'login']);
//     Route::post('/logout', [AuthAPIController::class, 'logout'])->middleware('auth:sanctum');

//     Route::post('load-cell-data', [ArduinoController::class, 'postLoadCellData']);
//     Route::post('rfid-data', [ArduinoController::class, 'postRFIDData']);

//     Route::get('weapons', [APIweaponController::class, 'getDataWeapon']);

//     Route::get('load-cell-data', [APIWeaponController::class, 'getDataWeapon']);
//     Route::get('load-cell-data/{loadCellID}', [APIWeaponController::class, 'filterDataWeapon']);

//     Route::get('rfid-data', [APIPersonnelController::class, 'getDataRFID']);

//     Route::get('data-from-arduino', [ArduinoController::class, 'getData']);

//     Route::get('personnel-data',  [APIPersonnelController::class, 'getPersonnel']);

//     route::get('dashboard', [APIDashboardController::class, 'index']);
//     route::get('dashboard-show', [APIDashboardController::class, 'show']);

// });


// Route::post('login', [AuthController::class, 'login']);
// Route::middleware('auth:sanctum')->get('user', function (Request $request) {
//   route::resource('user', APIUserController::class);
//   return $request->user();
// });
