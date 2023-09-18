<?php

use App\Http\Controllers\addToCart;
use App\Http\Controllers\allProduk;
use App\Http\Controllers\SendEmail;
use App\Http\Controllers\userAdmin;
use Illuminate\Support\Facades\Route;  
use App\Http\Controllers\userController;
use App\Http\Controllers\viewController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\ValidateController; 
use App\Http\Controllers\LoginRegisController;

//User   


// Login & Register
Route::controller(LoginRegisController::class)->group(function() {
    Route::post('/authLogin', 'authenticate');
    Route::post('/authRegist', 'register');
    Route::get('/logoutUser', 'logout');

    // Forgot Password
    Route::post('/forgot-password', 'forgotPassword');
    Route::get('/reset/{token}', 'resetPassword'); 
    Route::post('/reset/{token}', 'postPassword');
 
}); 
 
// Route Dashboard User
Route::controller(userController::class)->group(function() {
    Route::get('/', 'index');
  
    // Profile Pages
    Route::get('/profilePages', 'profileIndex');

    // Spa Profile
    Route::get('/profileContent', 'profileContent');
    Route::get('/changePasswordContent', 'changePasswordContent');
    Route::get('/historyContent', 'historyContent');
    // Spa Profile

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
    Route::get('/getGrafik', 'getGrafik');
    Route::post('/getFilter', 'getFilter');
    Route::post('/bulanTahunFilter', 'bulanTahun');
    // =====
 
    Route::get('/transaksiAdmin', 'transaksiAdmin');

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
    Route::get('/cartTmbh/{id}', 'cartTmbh');
    Route::get('/cartKrng/{id}', 'cartKrng');

    Route::get('/cart_pesan/{id}', 'cart_pesan');
    Route::get('/percobaan', 'percobaan');
});
  
Route::controller(TransaksiController::class)->group(function() {
    Route::post('/hapusTransaksi', 'hapusTransaksi');
    Route::get('detailTransaksi/{idTransaksi}', 'detailTransaksi');
});

// Cetak Laporan
Route::controller(CetakController::class)->group(function() {
    Route::post('/getFilterDataUser', 'getFilterDataUser');
    Route::post('/getAllData', 'getAllData');
    Route::get('/cetakPdf/{name}', 'cetakPdf');
});