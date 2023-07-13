<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewController extends Controller
{
    public function index(){
        return view('adminPages.layouts.dashboardAdmin');
    }

    public function dataUser(){
        return view('adminPages.layouts.dataUsers');
    }

    public function produk(){
        return view('adminPages.layouts.dataProduk');
    }

    public function dataBarang(){
        return view('adminPages.layouts.dataBarang');
    }

    public function dataKeuangan(){
        return view('adminPages.layouts.dataKeuangan');
    }

}
