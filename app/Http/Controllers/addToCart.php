<?php

namespace App\Http\Controllers;

use App\Models\CartModels;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class addToCart extends Controller 
{
    public function addToCart(Request $request){ 

        $idUserLogin = $request->idUserLogin;
        $idDetailProduk = $request->idDetailProduk; 
        $jumlah = 1;

        $addCart = new CartModels;
        $addCart-> idProduk = $idDetailProduk;
        $addCart-> idUser = $idUserLogin;
        $addCart-> jumlah = $jumlah; 
        $addCart->save();

        // return redirect('/allProduk')->with('Success Add Cart', 'Data Tersimpan');

        $userSama = CartModels::where('idUser', $idUserLogin)->count();

        $produkSama = CartModels::where('idProduk', $idDetailProduk)->count();

        $dataListProduk["dataListProduk"] = CartModels::with('getProduk', 'getUser')->get();
        $dataProduk = Produk::all();

        // $dataUsersDetail["dataUsersDetail"] =CartModels::with('getUser')->get();
        // $getCart = CartModels::all();
        
        // return view('userPages/layouts/allProduk' , $dataListProduk, \compact('dataProduk', 'userSama'));
        // return redirect('/allProduk', $dataListProduk, \compact('dataProduk', 'userSama'))->with('Logout Berhasil', "Anda Berhasil Keluar");

        return redirect('/allProduk')
            ->with('dataListProduk', $dataListProduk)
            ->with(compact('dataProduk', 'userSama', 'produkSama'));
    }

    public function cartView(){
        return view('userPages/layouts/cartView');
    }


}
