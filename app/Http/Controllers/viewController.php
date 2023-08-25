<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\CartModels;
use App\Models\Produk;
use App\Models\TransaksiModels;
use App\Models\DetailTransaksiModels;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class viewController extends Controller
{  
    public function index(){

        $dataTransaksi = TransaksiModels::all();
        $produkJual = TransaksiModels::select('jumlahProduk')->get();
        $dataDateTransaksi = TransaksiModels::select('created_at')->get();

        for ($i=0; $i < $dataTransaksi->count(); $i++) { 
            $dateBaru = TransaksiModels::select('created_at')->get();
            // dd($dateBaru[$i]->created_at);
            
            $filterYear = Carbon::createFromFormat('Y-m-d H:i:s', $dateBaru[$i]->created_at)->format('Y');
            $filterMonth = Carbon::createFromFormat('Y-m-d H:i:s', $dateBaru[$i]->created_at)->format('m');
            $filterDay = Carbon::createFromFormat('Y-m-d H:i:s', $dateBaru[$i]->created_at)->format('d'); 
        }

  
        return view('adminPages.layouts.DashboardAdmin', \compact('dataTransaksi', 'dataDateTransaksi', 'dateBaru' ,'filterYear', 'filterMonth', 'filterDay', 'produkJual'));

    }

    public function getGrafik(){
        $dataBaru = TransaksiModels::all()->count();
        $penjualan = TransaksiModels::select('totalHarga')->get();

        $chartTransaksi = TransaksiModels::all();
        $jmlhChart = TransaksiModels::all()->count();

        $filterDateArray = [];

        for ($i=0; $i < $jmlhChart; $i++){
            $filterDate = Carbon::createFromFormat('Y-m-d H:i:s', $chartTransaksi[$i]->created_at)->format('Y-m-d');
            $filterDateArray[] = $filterDate;
        }

        $harga = [];
        $hargaFilter = [];

        return response()->json([
            'status'=> 200,
            'penjualan' => $penjualan,
            'dataBaru'=> $dataBaru,
            'chartTransaksi'=> $chartTransaksi,
            'jmlhChart'=> $jmlhChart,
            'filterDate'=>$filterDateArray
            // 'hargaFilter'=> $hargaFilter
        ]);
    }

    public function getFilter(Request $request){

        $dateFrom = $request->dateFrom;
        $dateTo = $request->dateTo;
        // $date = TransaksiModels::where("DATE(created_at) ='".date('Y-m-d')."'");

        // $filterDate = TransaksiModels::whereBetween('created_at', [$dateFrom, $dateTo])
        //             ->get();

        $filterDate = TransaksiModels::whereDate('created_at', '>=', $dateFrom)
                      ->whereDate('created_at', '<=', $dateTo)
                      ->get();
                      
        $filterDateCount = TransaksiModels::whereDate('created_at', '>=', $dateFrom)
                      ->whereDate('created_at', '<=', $dateTo)
                      ->count();

        return response()->json([
            'status'=> 200,
            'filter'=> $filterDate,
            'dateFrom'=>$dateFrom,
            'dateTo'=>$dateTo,
            'filterDateCount'=>$filterDateCount
        ]);

    }

    public function bulanTahun(Request $request){

        $data = $request->dataFilter;
        $dataLength = count($request->dataFilter);

        $filterTahun = TransaksiModels::orderBy('id', 'ASC');
        
        // Kondisi Get Data
        
        if ($dataLength == 1){
            $filterTahun->whereYear('created_at', '=', $data);
        }else if ($dataLength == 2){

            $tahun = $data[0];
            $bulan = $data[1];

            $filterTahun->whereYear('created_at', '=', $tahun)
                        ->whereMonth('created_at', '=', $bulan);

        }

        // Kondisi Get Data

        $dataOrderFilter = $filterTahun->get();
        $jmlhOrderFilter = count($dataOrderFilter);

        return response()->json([
            'status'=> 200,
            'data'=> $data,
            'dataLength'=> $dataLength,
            'dataOrderFilter'=> $dataOrderFilter,
            'jmlhOrderFilter'=> $jmlhOrderFilter
        ]); 
    }

    public function transaksiAdmin(){ 

        $dataTransaksi = TransaksiModels::with('getUser', 'getDetail')->get();
        
        return view('adminPages/layouts/dataTransaksi', \compact('dataTransaksi'));
    }

    public function dataUser(){ 

        $dataUser = User::all();

        return view('adminPages.layouts.dataUsers', \compact('dataUser'));
    }
 
    public function produk(){

        $dataProduk = Produk::all();

        return view('adminPages.layouts.dataProduk', \compact('dataProduk'));
    }

    public function dataBarang(){
         
        $dataBarang = Barang::all();
        
        return view('adminPages.layouts.dataBarang', \compact('dataBarang'));

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
