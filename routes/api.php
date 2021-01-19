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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix' => 'daftar'], function () {
    Route::match(['get', 'post'], '/produk/create', 'Produk\Akses\Link@Cipta');
    Route::match(['get', 'post'], '/produk', 'Produk\Akses\Link@Presentasi');
});

Route::group(['prefix' => 'akses'], function () {
    Route::match(['get', 'post'], '/code/produk/{nama}', 'Produk\Akses\Code@Presentasi');
    Route::match(['get', 'post'], '/code/produk/{nama}/create', 'Produk\Akses\Code@Cipta');
    Route::match(['get', 'post'], '/code/produk/{nama}/download', 'Produk\Akses\Code@Restorasi');
});

Route::group(['prefix' => 'bola'], function () {
    //team
    Route::match(['get', 'post'], '/team/create', 'Bola\Akses\Team@Cipta');
    Route::match(['get', 'post'], '/team/view', 'Bola\Akses\Team@Presentasi');
    //pemain
    Route::match(['get', 'post'], '/{team}/pemain/create', 'Bola\Akses\Pemain@Cipta');
    Route::match(['get', 'post'], '/{team}/pemain/view', 'Bola\Akses\Pemain@Presentasi');
    //jadwal
    Route::match(['get', 'post'], '/jadwal/create', 'Bola\Akses\Jadwal@Cipta');
    Route::match(['get', 'post'], '/jadwal/view', 'Bola\Akses\Jadwal@Presentasi');
    //Hasil
    Route::match(['get', 'post'], '/{idJadwal}/hasil/create', 'Bola\Akses\Hasil@Cipta');
    Route::match(['get', 'post'], '/{idJadwal}/hasil/view', 'Bola\Akses\Hasil@Presentasi');
});
