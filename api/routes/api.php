<?php

use App\Http\Controllers\BarangApiController;
use App\Http\Controllers\PenjualanApiController;
use App\Http\Controllers\SatuanBarangApiController;
use App\Http\Controllers\DetailPenjualanApiController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/Barang', BarangApiController::class);
Route::apiResource('/Penjualan', PenjualanApiController::class);
Route::apiResource('/DetailPenjualan', DetailPenjualanApiController::class);
Route::apiResource('/SatuanBarang', SatuanBarangApiController::class);