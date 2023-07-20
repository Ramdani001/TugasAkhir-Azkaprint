<?php

use App\Http\Controllers\addToCart;
use App\Http\Controllers\allProduk;
use App\Http\Controllers\LoginRegisController;
use App\Http\Controllers\SendEmail;
use App\Http\Controllers\userAdmin;
use App\Http\Controllers\viewController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ValidateController; 
use Illuminate\Support\Facades\Route;  

//User  


// Login & Register
Route::controller(LoginRegisController::class)->group(function() {
    Route::post('/authLogin', 'authenticate');
    Route::post('/authRegist', 'register');
    Route::get('/logoutUser', 'logout');
});
 
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
    
    // Detail All Produk
    Route::get('/detailAllProduk/{id}', 'detailAllProduk');
    // Detail Stempel
    Route::get('/detailStempel/{id}', 'detailProduk');
    // Detail Undangan
    Route::get('/detailProdukUndangan/{id}', 'detailUndangan');
    // Detail Banner
    Route::get('/detailProdukBanner/{id}', 'detailBanner');
    // Detail XBanner
    Route::get('/detailProdukXBanner/{id}', 'detailXBanner');
    // Detail Lanyard
    Route::get('/detailProdukLanyard/{id}', 'detailLanyard');
    // Detail IdCard
    Route::get('/detailProdukIdCard/{id}', 'detailIdCard');
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

Route::controller(SendEmail::class)->group(function() {
    Route::post('/kirimEmail', 'SendEmail');
});

// Login Register
Route::controller(ValidateController::class)->group(function() {
    Route::get('/login', 'loginIndex');
});

Route::controller(addToCart::class)->group(function() {
    Route::post('/addToCart', 'addToCart'); 
    Route::get('/cartView', 'cartView');
}); 