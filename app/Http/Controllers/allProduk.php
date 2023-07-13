<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class allProduk extends Controller
{
    public function index(){

        return view('userPages/layouts/allProduk');
    }

    public function stempel(){
        
        $name = "Stempel";
        $price = "Rp. 78,000";

        return view('userPages/layouts/produk/stempel', \compact('name', 'price'));
    }

    public function lanyard() {
        $name = "Lanyard";
        $price = "Rp. 13,000";

        return view('userPages/layouts/produk/lanyard', \compact('name', 'price'));

    }

    public function undangan() {
        $name = "Undangan";
        $price = "Rp. 300";

        return view('userPages/layouts/produk/undangan', \compact('name', 'price'));

    }

    public function idCard() {
        $name = "Id Card";
        $price = "Rp. 23,000";

        return view('userPages/layouts/produk/idCard', \compact('name', 'price'));

    }

    public function banner() {
        $name = "Banner";
        $price = "Rp. 18,000";

        return view('userPages/layouts/produk/idCard', \compact('name', 'price'));

    }

    public function xbanner() {
        $name = "X-Banner";
        $price = "Rp. 40,000";

        return view('userPages/layouts/produk/idCard', \compact('name', 'price'));

    }

}
