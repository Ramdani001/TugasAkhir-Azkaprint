<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginRegisController extends Controller
{
  
    public function authenticate (Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        
          
        // dd(Auth::attempt($credentials));
         
            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
     
                $route = $this->redirectDash();

                return redirect()->intended($route); 

                // return redirect($route);

            }
        
        

        return back()->with('LoginError', "Username Atau Password Salah !!!");
    } 

    public function redirectDash(){
        $redirect = '';

        if(Auth::user() && Auth::user()->status == 'Admin'){
            $redirect = '/admin';
        }else if(Auth::user() && Auth::user()->status == 'Manajer'){
            $redirect = '/admin';
        }else if(Auth::user() && Auth::user()->status == 'Users'){
            $redirect = '/';
        }

        return $redirect;

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

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('Logout Berhasil', "Anda Berhasil Keluar");

    }

}
