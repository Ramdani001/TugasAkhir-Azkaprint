<?php

namespace App\Http\Controllers;

use App\Models\CartModels;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class addToCart extends Controller 
{
    public function addToCart(Request $request){ 

        $idUserLogin = $request->idUserLogin;
        $idDetailProduk = $request->idDetailProduk;     

        $SameData = CartModels::with('getProduk')
        ->where('idUser', $idUserLogin)
        ->where('idProduk', $idDetailProduk)
        ->first();

        if($SameData){
            $carModel =  CartModels::where('idUser', $idUserLogin)
            ->where('idProduk', $idDetailProduk)->update([
                'jumlah'=>$SameData->jumlah+1,
            ]); 
        }else{
            $addCart = new CartModels;
            $addCart-> idProduk = $idDetailProduk;
            $addCart-> idUser = $idUserLogin;
            $addCart-> jumlah = 1;  
            $addCart->save();
        }

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

        // $produkSama = CartModels::where('idProduk', $idDetailProduk)->count();

        // $dataListProduk['dataListProduk'] =CartModels::with('getProduk')->get();
        $dataListProduk['dataListProduk'] = CartModels::distinct('idProduk')
        // ->selectRaw('count(price_date)')
        ->with('getProduk')
        ->get(); 

        // dd($dataListProduk['dataListProduk']);
        $dataProduk = Produk::all();

        if(!empty(Auth::user()->idUser)){
            $idUserLogin = Auth::user()->id;
        }

        if(!empty(Auth::user()->idUser)){
            $userSama = CartModels::where('idUser', $idUserLogin)->count();
        }


        // $ListProduk = Produk::where('id', $idProduk)->count();



        return view('userPages/layouts/cartView',$dataListProduk, \compact('dataProduk', 'userSama'));
    } 

    public function cartTmbh($id){
        $hasilProduk = CartModels::where('id', $id)->first();

        
        $hasilProduk-> jumlah = $hasilProduk->jumlah + 1;
        $hasilProduk->update();
        
        $dataListProdukBaru["dataListProdukBaru"] = CartModels::with('getProduk', 'getUser')->get();


        return response()->json([
            'status'=> 200,
            'hasilProduk'=> $hasilProduk,
            'dataListProdukBaru'=>$dataListProdukBaru
        ]);
   
    }

    public function cartKrng($id){
        $hasilProdukKrng = CartModels::where('id', $id)->first();

        
        if($id > 0){
            $hasilProdukKrng-> jumlah = $hasilProdukKrng->jumlah - 1;
            $hasilProdukKrng->update();
            
            $dataListProdukBaruKrng["dataListProdukBaruKrng"] = CartModels::with('getProduk', 'getUser')->get();


            return response()->json([
                'status'=> 200,
                'hasilProdukKrng'=> $hasilProdukKrng,
                'dataListProdukBaruKrng'=>$dataListProdukBaruKrng
            ]);
        }else if($id <= 0){

            $hasilProdukKrng-> jumlah = 0;
            $hasilProdukKrng->update();

            return response()->json([
                'status'=> 200,
                'jumlah'=> 0
            ]);
        }
    }

}
