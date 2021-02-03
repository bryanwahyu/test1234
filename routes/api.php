<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('v1/login',[AuthController::class,'login']);
Route::group(['middleware' => ['auth:api']], function () {
    Route::get('v1/auth',[AuthController::class,'getdata']);
    Route::resource('v1/falkutas', FalkutasController::class);
    Route::resource('/v1/prodi', ProdiController::class);
    Route::resource('/v1/mahasiswa',MahasiswaController::class);
});
