<?php

namespace App\Http\Controllers;

use App\Models\Pesan;
use Illuminate\Http\Request;

class SendEmail extends Controller
{
    public function SendEmail(Request $request){
        
        $namaLengkap = $request->namaLengkap;
        $email = $request->pengirim;
        $pesan = $request->pesanEmail;

        $kirim = new Pesan;
        $kirim->nama_pengirim = $namaLengkap;
        $kirim->email_pengirim = $email;  
        $kirim->pesan = $pesan;
        $kirim->save();

        if($kirim){
        // echo "Pesan email berhasil dikirim.";

        return redirect("/#kontakKami")->with("success", "Email Berhasil Dikirim");

        }else{
        // echo "Pesan email gagal dikirim.";
        return redirect("/#kontakKami")->with("error", "Email Gagal Dikirim");
        }
    }
}
