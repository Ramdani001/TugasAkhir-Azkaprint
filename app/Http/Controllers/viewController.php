<?php

namespace App\Http\Controllers;

use App\Models\tblUser;
use Illuminate\Http\Request;

class viewController extends Controller
{
    public function index(){
        return view('adminPages.main');
    }

    public function dataUser(){

        $dataUser = tblUser::all();

        return view('adminPages.layouts.dataUsers', \compact('dataUser'));
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

    // Landing Pages
    
    public function EditHeroSection(){
        return view('adminPages.layouts.landingPages.heroSection');
    }

    public function EditTopCategories(){
        return view('adminPages.layouts.landingPages.topCategories');
    }

    public function EditTentangKami(){
        return view('adminPages.layouts.landingPages.tentangKami');
    }

    public function EditProdukSection(){
        return view('adminPages.layouts.landingPages.produkSection');
    }

    public function EditFAQSection(){
        return view('adminPages.layouts.landingPages.FAQSection');
    }

}
