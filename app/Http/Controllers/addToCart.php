<?php

namespace App\Http\Controllers;

use App\Models\CartModels;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        // $dataCart = CartModels::all();

        // Mengelompokkan data berdasarkan idproduk dan menghitung jumlah data dalam setiap grup
        // $dataSama = CartModels::select('idProduk', 'idUser', 'jumlah')
        // ->selectRaw('COUNT(*) as total')
        // ->groupBy('idProduk', 'idUser', 'jumlah')
        // ->get();

        // foreach ($dataSama as $data) {
        //     dd(  "ID Produk: " . $data->idProduk . " Total Data: " . $data->total . "\n");
        // echo "ID Produk: " . $data->idProduk . ", Nama Produk: " . $data->idUser . ", jumlah: " . $data->jumlah . ", Total Data: " . $data->total . "\n";
        // }

        
        // $dataSama = CartModels::select('Cart.idproduk', 'Cart.idUser', DB::raw('COALESCE(Cart.total, 1) as total'))
        // ->leftJoin(DB::raw('(SELECT idProduk, COUNT(*) as total FROM Cart GROUP BY idProduk) as subquery'), 'Cart.idProduk', '=', 'subquery.idProduk')
        // ->get();

        // foreach ($dataSama as $data) {
        //     dd(  "ID Produk: " . $data->idProduk . " Total Data: " . $data->total . "\n");
        // echo "ID Produk: " . $data->idproduk . ", Nama Produk: " . $data->namaProduk . ", Deskripsi: " . $data->deskripsi . ", Total Data: " . $data->total . "\n";
        // }
 
        // $userSama = CartModels::where('idUser', $idUserLogin)->count();

        // $produkSama = CartModels::where('idProduk', $idDetailProduk)->count();

        $dataListProduk['dataListProduk'] =CartModels::with('getProduk')->get();
        $dataProduk = Produk::all();

        // $ListProduk = Produk::where('id', $idProduk)->count();



        return view('userPages/layouts/cartView',$dataListProduk, \compact('dataProduk'));
    } 


}
