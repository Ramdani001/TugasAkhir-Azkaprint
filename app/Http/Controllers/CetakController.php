<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\tblUser;
use Illuminate\Http\Request;
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
            return $pdf->stream('Laporan'. $namaData .'.pdf');

        }


        // return view('adminPages.cetak.laporan');

    }

}
