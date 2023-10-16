<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\User;
use Illuminate\Support\Str;
use App\Mail\ForgotPassword;
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
        
        return back()->with('error', "Username Atau Password Salah !!!");
    } 

    public function redirectDash(){
        $redirect = '';

        if(Auth::user() && Auth::user()->status == 'Admin'){
            $redirect = '/admin';
        }else if(Auth::user() && Auth::user()->status == 'Manager'){
            $redirect = '/admin';
        }else if(Auth::user() && Auth::user()->status == 'Users'){
            $redirect = '/';
        }

        return $redirect;

    }

    public function register(Request $request){

        $cek = $this->validate($request, [ 
            'profile' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $cekEmail = User::where('email', $request->email)->first();
        // dd($cekEmail);

        if(!$cekEmail){
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
            return redirect()->back()->with('success', 'Anda Berhasil Register!');
        }else{
            return redirect()->back()->with('warning', 'Email Sudah Terdaftar!!!');
        }


    }

    // Forgot Password
    public function forgotPassword(Request $request){
        
        $user = User::getEmailSingle($request->email);
        // dd($user);
        
        if(!empty($user)){ 
            
            $user->remember_token = Str::random(30);
            $user->save();

            Mail::to($user->email)->send(New ForgotPassword($user));

            return redirect()->back()->with('success', 'Link Reset Password sudah di kirim ke email, harap di periksa');

        }else{
            return redirect()->back()->with('error', 'Email Belum Terdaftar');
        }

    }

    public function resetPassword($remembernToken){
        
        $user = User::getResetSingle($remembernToken);

        if(!empty($user)){
            $data['user'] = $user;
            return view('validate.resetPassword', $data);
        }else{
            abort(404);
        }

    }
    public function postPassword($token, Request $request){

        if($request->password == $request->confirmPassword){
 
            $user = User::getResetSingle($token);
            $user->password = Hash::make($request->password);
            $user->remember_token = Str::random(30);
            $user->save();
            echo '<script>
                    console.log('. $user .');
                  </script>
                ';
            return redirect('/login')->with('success', 'Password Berhasil Di Ganti!!!');

        }else{
            return redirect()->back()->with('error', 'Password Tidak Sama!!!');
        }

        

    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('Logout Berhasil', "Anda Berhasil Keluar");

    }

}
