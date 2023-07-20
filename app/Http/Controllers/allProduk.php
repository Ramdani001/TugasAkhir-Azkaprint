<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class allProduk extends Controller
{
    public function index(){

        $dataProduk = Produk::all();

        return view('userPages/layouts/allProduk', \compact('dataProduk'));
    }

    public function stempel(){ 

        $stempel = "Stempel"; 

        $dataStempel =  Produk::where('tipeProduk', $stempel)->get();

        return view('userPages/layouts/produk/stempel', \compact('dataStempel'));
    }
 
    public function lanyard() { 
        $lanyard = "Lanyard";
        $dataLanyard = Produk::where('tipeProduk', $lanyard)->get();

        
        return view('userPages/layouts/produk/lanyard', \compact('dataLanyard'));

    }

    public function undangan() {
         
        $undangan = "Undangan";
        $dataUndangan = Produk::where('tipeProduk', $undangan)->get();

        return view('userPages/layouts/produk/undangan', \compact('dataUndangan'));

    }

    public function idCard() {
        
        $idCard = "IdCard";
        $dataIdCard = Produk::where('tipeProduk', $idCard)->get();

        return view('userPages/layouts/produk/idCard', \compact('dataIdCard'));

    }

    public function banner() {
        $Bbanner = "Banner";
        $dataBanner = Produk::where('tipeProduk', $Bbanner)->get(); 

        return view('userPages/layouts/produk/banner', \compact('dataBanner'));

    } 

    public function xbanner() {
        $XBanner = "XBanner";
        $dataXBanner = Produk::where('tipeProduk', $XBanner)->get();

        return view('userPages/layouts/produk/xbanner', \compact('dataXBanner'));

    }

    // Detail All Produk
    public function detailAllProduk($id){
        $dataAllDetail = Produk::where('id',$id)->first();


        return response()->json([
            'status'=> 200,
            'dataAllDetail'=> $dataAllDetail
        ]);

    }
    
    // Detail Produk
    public function detailProduk($id){
        $dataDetailstempel = Produk::where('id',$id)->first();


        return response()->json([
            'status'=> 200,
            'dataDetailstempel'=> $dataDetailstempel
        ]);

    }
    
    // Detail Produk Undangan
    public function detailUndangan($id){
        $dataDetailUndangan = Produk::where('id',$id)->first();


        return response()->json([
            'status'=> 200,
            'dataDetailUndangan'=> $dataDetailUndangan
        ]);

    }

    public function detailBanner($id){
        $dataDetailBanner = Produk::where('id',$id)->first();

        return response()->json([
            'status'=> 200,
            'dataDetailBanner'=> $dataDetailBanner
        ]);

    }
    public function detailXBanner($id){
        $dataDetailXBanner = Produk::where('id',$id)->first();

        return response()->json([
            'status'=> 200,
            'dataDetailXBanner'=> $dataDetailXBanner
        ]);

    }

    public function detailLanyard($id){
        $dataDetailLanyard = Produk::where('id',$id)->first();

        return response()->json([
            'status'=> 200,
            'dataDetailLanyard'=> $dataDetailLanyard
        ]);

    }

    public function detailIdCard($id){
        $dataDetailIdCard = Produk::where('id',$id)->first();

        return response()->json([
            'status'=> 200,
            'dataDetailIdCard'=> $dataDetailIdCard
        ]);

    }

}
