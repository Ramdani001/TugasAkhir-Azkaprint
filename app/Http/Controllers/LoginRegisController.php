<?php

namespace App\Http\Controllers;

use App\Models\tblUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisController extends Controller
{
  
    public function login(Request $request){
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                dd("Berhasil");
                return redirect()->intended('/');
            }

        return back()->with('LoginError', "Username Atau Password Salah !!!");

    } 

    public function register(Request $request){

        $this->validate($request, [
            'profile' => 'required|file|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $file = $request->file('profile');

        $nama_file = time()."_".$file->getClientOriginalName();

        // Move File from temp to file address

        $tujuan_upload = public_path().'/img/profile';
        $file->move($tujuan_upload, $nama_file); 
        
        $password = Hash::make($request->password);

        $dataRegist = new User();
        $dataRegist-> idUser = $request->idUser;
        $dataRegist-> namaUser = $request->namaUser;
        $dataRegist-> username = $request->username;
        $dataRegist-> password = $password;
        $dataRegist-> status = $request->status;
        $dataRegist-> email = $request->email;
        $dataRegist-> profile = $nama_file;
        $dataRegist->save();

        // $message = "Selamat Datang, $request->namaProfile";
        
        // return response()->json([
        //     'status'=>200,
        //     // 'dataRegist' => $dataRegist,
        //     'message'=> $message
        // ]);
    }

}
