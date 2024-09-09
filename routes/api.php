<?php

use App\Models\Weapon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArduinoController;
use App\Http\Controllers\Arduino1Controller;
use App\Http\Controllers\APIWeaponController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\APIDashboardController;
use App\Http\Controllers\APIPersonnelController;

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

Route::post('/load-cell-data', [ArduinoController::class, 'postLoadCellData']);
Route::post('/rfid-data', [ArduinoController::class, 'postRFIDData']);

Route::get('/load-cell-data', [APIWeaponController::class, 'getDataWeapon']);
Route::get('/load-cell-data/{loadCellID}', [APIWeaponController::class, 'filterDataWeapon']);

Route::get('/rfid-data', [APIPersonnelController::class, 'getDataRFID']);

Route::get('/data-from-arduino', [ArduinoController::class, 'getData']);

Route::get('/personnel-data',  [APIPersonnelController::class, 'getPersonnel']);

Route::resource('/dashboard-status',  [APIDashboardController::class, 'show']);
