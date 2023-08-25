<?php

namespace App\Http\Controllers;

use Midtrans;
use Midtrans\Snap;
use App\Models\User;
use Midtrans\Config;
use App\Models\Produk;
use App\Models\CartModels;
use Illuminate\Http\Request;

use App\Models\TransaksiModels;
use App\Models\DetailTransaksiModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class addToCart extends Controller 
{

    public function addToCart(Request $request){ 

        $idUserLogin = $request->idUserLogin;
        $idDetailProduk = $request->idDetailProduk;     
 
        $SameData = CartModels::with('getProduk')
        ->where('idUser', $idUserLogin)
        ->where('idProduk', $idDetailProduk)
        ->where('status', 'Pending')
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
            $addCart-> status = "Pending"; 
            $addCart->save();
        }

        // return redirect('/allProduk')->with('Success Add Cart', 'Data Tersimpan');

        $userSama = CartModels::where('idUser', $idUserLogin)->count();

        $produkSama = CartModels::where('idProduk', $idDetailProduk)->count();

        $dataListProduk["dataListProduk"] = CartModels::with('getProduk', 'getUser')->get();
        $dataProduk = Produk::all();

        return redirect('/allProduk')
            ->with('dataListProduk', $dataListProduk)
            ->with(compact('dataProduk', 'userSama', 'produkSama'));
    }

    public function cartView(){

        $dataListProduk['dataListProduk'] = CartModels::distinct('idProduk')
        // ->selectRaw('count(price_date)')
        ->where('status', 'Pending')
        ->with('getProduk')
        ->get(); 

        $dataProduk = Produk::all(); 

        if(!empty(Auth::user()->idUser)){
            $idUserLogin = Auth::user()->id;
        }

        if(!empty(Auth::user()->idUser)){
            $userSama = CartModels::where(['idUser'=> $idUserLogin, 'status'=> 'Pending'])->count();
        }

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


    function cart_pesan($id){

        $totalHarga = 0;
        
        $dataListPesanan =  CartModels::where('idUser', $id)->update(array('status' => 'Pesan'));

        $dataListPesanan = CartModels::where('idUser', $id)->get();
        $dataPesan = CartModels::where(['idUser' => $id, 'status' => 'Pesan'])->get();
        $namePembeli = CartModels::where(['idUser' => $id, 'status' => 'Pesan'])->first();

        $totalHarga = 0;
        $jumlahProduk = 0;

        foreach ($dataListPesanan as $item) {
            
            $jumlahProduk += $item->jumlah;
            
            $jumlahBarang = $item->jumlah;
            $harga = $item->getProduk->hargaProduk;
            $tempJumlah = $jumlahBarang * $harga;
            $totalHarga += $tempJumlah;
        }

        // $idTransaksi = "RTI-198989";
        
        $huruf = "TRI-";
        $idTransaksi = $huruf . rand(8,9999);

        // dd($idTransaksi);

        $transaksi = new TransaksiModels;
        $transaksi->idTransaksi = $idTransaksi;
        $transaksi->idUser = $id;
        $transaksi->jumlahProduk = $jumlahProduk;
        $transaksi->totalHarga = $totalHarga;
        $transaksi->statusTransaksi = "Pending";
        $transaksi->save();


        $dataKeranjang = CartModels::where(['idUser' => $id, 'status'=> 'Pesan'])->get();

        foreach($dataKeranjang as $dataKrnjng){
            
            $detailTransaksi = new DetailTransaksiModels;
            $detailTransaksi-> idTransaksi = $idTransaksi;
            $detailTransaksi-> idProduk = $dataKrnjng->idProduk;
            $detailTransaksi-> jumlah = $dataKrnjng->jumlah;
            $detailTransaksi->save();

        }

        $dataKeranjang = CartModels::where(['idUser' => $id, 'status'=> 'Pesan'])->delete();

            \Midtrans\Config::$serverKey = config('midtrans.server_key');
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => $idTransaksi, 
                    'gross_amount' => $totalHarga,
                ),
                'customer_details' => array(
                    'first_name' => $namePembeli->getUser->namaUser,
                    'last_name' => '',
                    'email' => $namePembeli->getUser->email,
                    'phone' => '08111222333',
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);
        // Transaksi


        return response()->json([
            'status'=>200,
            // 'dataKeranjang'=> $dataKeranjang
            // 'dataListPesanan'=> $dataListPesanan,
            // 'totalHarga'=> $totalHarga,
            // 'jumlahBarang'=> $jumlahProduk,
            // 'dataPesan'=> $dataPesan,
            // 'transaksi'=> $transaksi,
            'snapToken'=> $snapToken
        ]);
    }

    public function callback(Request $request){
        // return 200;
        $idUser = TransaksiModels::where('idTransaksi', $request->result['order_id'])->first();
        
        $statusNet = $request->result['status_code'];

        if($statusNet == "200"){
            $updateCart =  CartModels::where('idUser', $idUser->idUser)->update(array('status' => 'pay'));  
            
            $allTransaksi = TransaksiModels::where('idTransaksi', $request->result['order_id'])->first();
            $transaksi = TransaksiModels::where('idTransaksi', $request->result['order_id'])->first();
            $transaksi-> statusTransaksi = "Lunas";
            $transaksi->update();
        }

        return response()->json([ 
            'status'=>200,
            'allData'=>$allTransaksi,
            'request'=>$request->all()
        ]);

    }

}
