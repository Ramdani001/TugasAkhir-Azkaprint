<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendEmail extends Controller
{
    public function SendEmail(Request $request){
                
        $penerima = "rizkanramdani0@gmail.com";

        $namaLengkap = $request->namaLengkap;
        $subyek = 'Pesan Website Dari : '. $namaLengkap .'';
        $pesanEmail = $request->pesanEmail;

        $pengirim = $request->pengirim;

        $pesanEmail = wordwrap($pesanEmail,70);

        $header="From: ". $pengirim ."\r\n";

        $header.="MIME-Version: 0\r\n";

        $header.="Content-Type: text/html; charset=ISO-8859-1\r\n";

        // dd($penerima,$subyek,$pesanEmail,$header);

        $kirim = mail($penerima,$subyek,$pesanEmail,$header);


        if($kirim){
        // echo "Pesan email berhasil dikirim.";

        redirect("/")->with("Succes Kirim Email", "Email Berhasil Dikirim");

        }else{
        // echo "Pesan email gagal dikirim.";
        redirect("/")->with("Succes Kirim Email", "Email Gagal Dikirim");
        }
    }
}
