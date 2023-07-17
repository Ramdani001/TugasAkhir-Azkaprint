<?php

use App\Http\Controllers\allProduk;
use App\Http\Controllers\userAdmin;
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
    // User
    Route::get('/dataUserSection', 'dataUser');

    // Produk
    Route::get('/produk', 'produk');

    // Barang
    Route::get('/dataBarang', 'dataBarang');

    // Keuangan
    Route::get('/dataKeuangan', 'dataKeuangan'); 

    // Landing Pages
    Route::get('/EditHeroSection', 'EditHeroSection');

    Route::get('/EditTopCategories', 'EditTopCategories');

    Route::get('/EditTentangKami', 'EditTentangKami');

    Route::get('/EditProdukSection', 'EditProdukSection');

    Route::get('/EditFAQSection', 'EditFAQSection');

});

// CRUD Data User Admin
Route::controller(userAdmin::class)->group(function() {
    Route::post('/createUser1', 'createUser');
    Route::get('/editDataUser/{id}', 'editUser');
    Route::put('/updateDataUser', 'updateUser');
    Route::get('/hapusDataUser', 'hapusUser');

    // Produk
    Route::post('/createProduk1', 'createDataProduk');
    Route::get('/editDataProduk/{id}', 'editProduk');
    Route::put('/updateDataProduk', 'updateProduk');
    Route::get('/hapusDataProduk', 'hapusProduk');

    // Barang
    Route::post('/createDataBarang', 'createDataBarang');
    Route::get('/editDataBarang/{id}', 'editBarang');
    Route::put('/updateDataBarang', 'updateBarang');
    Route::get('/hapusDataBarang', 'hapusBarang');
});