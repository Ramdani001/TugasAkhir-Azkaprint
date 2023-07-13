<?php

use App\Http\Controllers\allProduk;
use App\Http\Controllers\userController;
use App\Http\Controllers\viewController;
use Illuminate\Support\Facades\Route;  

//User 

// Route Dashboard User
Route::controller(userController::class)->group(function() {
    Route::get('/', 'index');
});

// Route Filter Produk
Route::controller(allProduk::class)->group(function() {
    Route::get('/allProduk', 'index');
    Route::get('/stempel', 'stempel');
    Route::get('/lanyard', 'lanyard');
    Route::get('/undangan', 'undangan');
    Route::get('/idCard', 'idCard');
    Route::get('/banner', 'banner');
    Route::get('/xbanner', 'xbanner');
});

// Admin
Route::controller(viewController::class)->group(function() {
    Route::get('/admin', 'index');
    Route::get('/dataUser', 'dataUser');
    Route::get('/dataProduk', 'dataProduk');
    Route::get('/dataBarang', 'dataBarang');
    Route::get('/dataKeuangan', 'dataKeuangan');
});