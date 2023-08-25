<?php

namespace App\Http\Controllers;

use App\Models\TransaksiModels;
use App\Models\DetailTransaksiModels;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class TransaksiController extends Controller
{
    public function hapusTransaksi(Request $request){
        // dd($request->idTransaksi);

        $idTransaksi = $request->idTransaksi;

        $transaksi = TransaksiModels::where('id', $idTransaksi);
        
        $whereTransaksi = TransaksiModels::where('id', $idTransaksi)->first();

        $detailCart = DetailTransaksiModels::where('idTransaksi', $whereTransaksi->idTransaksi);
        
        $detailCart->delete();

        $transaksi->delete();

        // dd($detailCart);

        if($transaksi && $detailCart){
            return redirect('/admin')->with('Success Hapus', 'Berhasil Hapus Data');
        }else{
            return redirect('/admin')->with('Gagal Hapus', 'Gagal Hapus Data');
        }

    }

    public function detailTransaksi($idTransaksi){
 
        $detailProduk = DetailTransaksiModels::with('getProduk')->get();
        $detailProduk = DetailTransaksiModels::where('idTransaksi', $idTransaksi)->with('getProduk')->get();
        $detailTransaksi = TransaksiModels::where('idTransaksi', $idTransaksi)->with('getUser')->first();
        $jumlahField = DetailTransaksiModels::where('idTransaksi', $idTransaksi)->count();

        return response()->json([
            'status'=> 200,
            'detailProduk' => $detailProduk,
            'jumlahField' => $jumlahField,
            'detailProduk' => $detailProduk,
            'detailTransaksi' => $detailTransaksi
        ]);
    }

} 