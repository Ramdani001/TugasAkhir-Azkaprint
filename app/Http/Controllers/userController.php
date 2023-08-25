<?php

namespace App\Http\Controllers;

use App\Models\CartModels;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class userController extends Controller
{
    public function index(){ 

        if(!empty(Auth::user()->idUser)){
            $idUserLogin = Auth::user()->id; 
        }
 
        $dataProduk = Produk::all();
        if(!empty(Auth::user()->idUser)){
            $userSama = CartModels::where(['idUser' => $idUserLogin, 'status' => 'Pay'])->count();
        }
        if(!empty(Auth::user()->idUser)){
            return view('userPages/layouts/dashboardUser', \compact('dataProduk', 'userSama'));
        }else{
            return view('userPages/layouts/dashboardUser', \compact('dataProduk'));
        }
    
    }

    public function profileIndex(){

        if(!empty(Auth::user()->idUser)){
            $idUserLogin = Auth::user()->id;
        }

        $dataProduk = Produk::all();
        if(!empty(Auth::user()->idUser)){
            $userSama = CartModels::where('idUser', $idUserLogin)->count();
        }
         
        return view('userPages/profilePages/pages/dashboardProfile', \compact('userSama'));
    }
 
    public function profileContent() {
        return view('userPages/profilePages/profileContent');
    }

    public function changePasswordContent() {
        return view('userPages/profilePages/chagePasswordContent');
    }
    
    public function historyContent() {
        return view('userPages/profilePages/historyContent');
    }

}
