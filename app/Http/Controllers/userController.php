<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class userController extends Controller
{
    public function index(){

        $dataProduk = Produk::all();

        return view('userPages/layouts/dashboardUser', \compact('dataProduk'));
    }
}
