<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Produk;
use App\Models\tblUser;
use Illuminate\Http\Request;
use App\Models\TransaksiModels;
use Barryvdh\DomPDF\Facade\Pdf;

class CetakController extends Controller
{ 
    
    public function getFilterDataUser(Request $request){
        
        $dataAllUser = tblUser::all();
        $Status = $request->Status;
        if($Status == "Tahun"){
            
            $dataPerTahun = tblUser::whereYear('created_at', '=', $request->DataTahun)->get();
            
            $countPerTahun = tblUser::whereYear('created_at', '=', $request->DataTahun)->count();

            return response()->json([
                'DataFilterTahun'=> $dataPerTahun,
                'countPerTahun'=> $countPerTahun
                // 'DataAll'=> $dataAllUser
            ]);

        }else if($Status == "Bulan"){
            $dataPerBulan = tblUser::whereYear('created_at', '=', $request->dataTahun)
                            ->whereMonth('created_at', '=', $request->dataBulan)->get();

            $countPerBulan = tblUser::whereYear('created_at', '=', $request->dataTahun)
                            ->whereMonth('created_at', '=', $request->dataBulan)->count();

            return response()->json([
                'dataPerBulan'=> $dataPerBulan,
                'countPerBulan'=> $countPerBulan
            ]);

        }else if($Status = "Tanggal"){
            
            $DataFrom = $request->DataFrom;
            $DataTo = $request->DataTo;

            $dataPerTanggal = tblUser::whereDate('created_at', '>=', $DataFrom)
                      ->whereDate('created_at', '<=', $DataTo)
                      ->get();

            $countPerTanggal = tblUser::whereDate('created_at', '>=', $DataFrom)
                      ->whereDate('created_at', '<=', $DataTo)
                      ->count();

            return response()->json([
                'DataPerTanggal'=> $dataPerTanggal,
                'countPerTanggal'=> $countPerTanggal,
                'DateFrom'=> $DataFrom,
                'DateTo'=> $DataTo
            ]);

        }

    }

    public function getAllData(Request $request){
        $status = $request->Status;

       if($status == "DataUser"){
            $DataAll = tblUser::all();
            $CountDataAll = tblUser::all()->count();

            return response()->json([
                'DataAll'=> $DataAll,
                'CountDataAll'=> $CountDataAll
            ]);
       }else if($status == "DataTransaksi"){ 
            $DataAll = TransaksiModels::with('getUser')->get();
            $CountDataAll = TransaksiModels::all()->count();
        
            return response()->json([
                'DataAll'=>$DataAll
            ]);
       }else if($status == "DataProduk"){
            $DataAll = Produk::all();
            $CountDataAll = Produk::all()->count();

            return response()->json([
                'DataAll'=>$DataAll,
                'CountDataAll'=>$CountDataAll
            ]);

       }

    }

    public function cetakPdf($name, Request $request){

        $nameStatus = $name;

        if($nameStatus == "DataUser"){
            $date = Carbon::now();
            $today = Carbon::parse($date)->addMonths(1)->format('d F Y');

            $chData = "Data User";

            $namaData = "Data User";
            $titleData = "Semua Data";
            $dataUser = tblUser::all();

            $createdAt = tblUser::select('created_at')->get();

            foreach($createdAt as $item){
                $originalDateTime = $item['created_at'];
                $parsedDateTime = \Carbon\Carbon::parse($originalDateTime)->toIso8601String();
                $item['created_at'] = $parsedDateTime;

            } 

            $pdf = Pdf::loadView('adminPages.cetak.laporan', compact('namaData', 'nameStatus', 'dataUser', 'today', 'titleData', 'createdAt', 'chData'));
            return $pdf->stream('Laporan'. $namaData .'.pdf');

        }else if($nameStatus == "User-Tahun"){

            $date = Carbon::now();

            $today = Carbon::parse($date)->addMonths(1)->format('d F Y');
            $chData = "Data User";

            $dataUser = tblUser::whereYear('created_at', '=', $request->dataTahun)->get();
            $countPerTahun = tblUser::whereYear('created_at', '=', $request->dataTahun)->count();

            $dataTahun = $request->dataTahun;

            $namaData = "Data User";
            $titleData = "Tahun ". $dataTahun ." " ;

            $pdf = Pdf::loadView('adminPages.cetak.laporan', compact('namaData', 'nameStatus', 'dataUser', 'titleData', 'today', 'chData'));
            return $pdf->stream('Laporan'. $namaData .'-Tahun.pdf');

        }else if ($nameStatus == "User-Bulan"){

            $dataTahun1 = $request->dataTahun1;
            $dataBulan1 = $request->dataBulan1;

            $date = Carbon::now();

            $today = Carbon::parse($date)->addMonths(1)->format('d F Y');
            $chData = "Data User";

            $namaData = "Data User";
            $titleData = "Tahun :". $dataTahun1 ." - Bulan : ". $dataBulan1 ."" ;

            $dataUser = tblUser::whereYear('created_at', '=', $dataTahun1)
                        ->whereMonth('created_at', '=', $dataBulan1)
                        ->get();

            $pdf = Pdf::loadView('adminPages.cetak.laporan', compact('dataUser', 'namaData', 'titleData', 'today', 'chData'));
            return $pdf->stream('Laporan'. $namaData .'-Bulan.pdf');

        }else if($nameStatus == "User-Tanggal"){
            $dateFrom = $request->filterDateFromUser;
            $dateTo = $request->filterDateToUser;

            $date = Carbon::now();

            $today = Carbon::parse($date)->addMonths(1)->format('d F Y');
            $chData = "Data User";

            $namaData = "Data User";
            $titleData = "Tanggal : ". $dateFrom ." s/d ". $dateTo ."";

            $dataUser = tblUser::whereDate('created_at', '>=', $dateFrom)
                      ->whereDate('created_at', '<=', $dateTo)
                      ->get();

            $pdf = Pdf::loadView('adminPages.cetak.laporan', compact('dataUser', 'namaData', 'titleData', 'today', 'chData'));
            return $pdf->stream('Laporan'. $namaData .'perTanggal.pdf');

        }

        if($nameStatus == "Data Transaksi"){
            $date = Carbon::now();
            $today = Carbon::parse($date)->addDays(1)->format('d F Y');

            $chData = "Data Transaksi";

            $namaData = "Data Transaksi";
            $titleData = "Semua Data";
            $dataTransaksi = TransaksiModels::with('getUser')->get();

            $createdAt = TransaksiModels::select('created_at')->get();

            foreach($createdAt as $item){
                $originalDateTime = $item['created_at'];
                $parsedDateTime = \Carbon\Carbon::parse($originalDateTime)->toIso8601String();
                $item['created_at'] = $parsedDateTime;

                $pdf = Pdf::loadView('adminPages.cetak.laporan', compact('namaData', 'nameStatus', 'dataTransaksi', 'today', 'titleData', 'createdAt', 'chData'));
                return $pdf->stream('Laporan'. $namaData .'.pdf');
            }
        }else if($nameStatus == "Transaksi-Tahun"){
            $date = Carbon::now();

            $today = Carbon::parse($date)->addMonths(0)->addDays(1)->format('d F Y');
            $chData = "Data Transaksi";

            $dataTransaksi = TransaksiModels::whereYear('created_at', '=', $request->dataTahunTransaksi)->get();
            $countPerTahun = TransaksiModels::whereYear('created_at', '=', $request->dataTahunTransaksi)->count();

            $dataTahun = $request->dataTahunTransaksi;

            $namaData = "Data Transaksi";
            $titleData = "Tahun ". $dataTahun ." " ;

            $pdf = Pdf::loadView('adminPages.cetak.laporan', compact('namaData', 'nameStatus', 'dataTransaksi', 'titleData', 'today', 'chData'));
            return $pdf->stream('Laporan'. $namaData .'-Tahun.pdf');

        }else if($nameStatus == "Transaksi-Bulan"){
            
            $dataTahun1 = $request->dataTahun1;
            $dataBulan1 = $request->dataBulan1;

            $date = Carbon::now();

            $today = Carbon::parse($date)->addDays(1)->format('d F Y');
            $chData = "Data Transaksi";

            $namaData = "Data Transaksi";
            $titleData = "Tahun :". $dataTahun1 ." - Bulan : ". $dataBulan1 ."" ;

            $dataTransaksi = TransaksiModels::whereYear('created_at', '=', $dataTahun1)
                        ->whereMonth('created_at', '=', $dataBulan1)
                        ->get();

            $pdf = Pdf::loadView('adminPages.cetak.laporan', compact('dataTransaksi', 'namaData', 'titleData', 'today', 'chData'));
            return $pdf->stream('Laporan'. $namaData .'-Bulan.pdf');
        }else if($nameStatus == "Transaksi-Tanggal"){
            $dateFrom = $request->filterDateFrom;
            $dateTo = $request->filterDateTo;

            $date = Carbon::now();

            $today = Carbon::parse($date)->addDays(1)->format('d F Y');
            $chData = "Data Transaksi";

            $namaData = "Data Transaksi";
            $titleData = "Tanggal : ". $dateFrom ." s/d ". $dateTo ."";

            $dataTransaksi = TransaksiModels::whereDate('created_at', '>=', $dateFrom)
                      ->whereDate('created_at', '<=', $dateTo)
                      ->get();

            $pdf = Pdf::loadView('adminPages.cetak.laporan', compact('dataTransaksi', 'namaData', 'titleData', 'today', 'chData'));
            return $pdf->stream('Laporan'. $namaData .'perTanggal.pdf');
        }

        if($nameStatus == "Data Produk"){
            $date = Carbon::now();
            $today = Carbon::parse($date)->addDays(1)->format('d F Y');

            $dataProduk = Produk::all();
            $CountdataProduk = Produk::all()->count();

            $chData = "Data Produk";

            $namaData = "Data Produk"; 
            $titleData = "Semua Data";

            $pdf = Pdf::loadView('adminPages.cetak.laporan', compact('namaData', 'nameStatus', 'dataProduk', 'today', 'titleData','chData'));

            return $pdf->stream('Laporan'. $namaData .'.pdf');

        // return view('adminPages.cetak.laporan');
        }
    }

}
