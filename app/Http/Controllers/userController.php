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
            $userSama = CartModels::where('idUser', $idUserLogin)->count();
        }
        
        return view('userPages/layouts/dashboardUser', \compact('dataProduk', 'userSama'));
    }
}
