<?php

namespace App\Http\Controllers;

use App\Models\tblUser; 
use Illuminate\Http\Request;

class userAdmin extends Controller
{ 
    public function createUser(Request $request ){

        $dataUser = new tblUser;
        $dataUser-> idUser = $request->idUsers;
        $dataUser-> namaUser = $request->namaUsers;
        $dataUser-> username = $request->username;
        $dataUser-> password = $request->password;
        $dataUser-> status = $request->status;
        $dataUser-> email = $request->email;
        $dataUser-> profile = $request->profile;
        $dataUser->save();

        $idUsers = $request->idUsers; 
        
        return response()->json([
            'status'=> 200,
            'Id User'=> $idUsers
        ]);
    }

    public function editUser($id){
        // var_dump($id);

        // $idUsers = $id;
        $dataUser = tblUser::find($id);
        
        return response()->json([
            'status'=> 200,
            'DataUser'=> $dataUser
        ]);
    }

    public function updateUser(Request $request){

        $id = $request->input('idModalUser');
        $dataUser = tblUser::find($id);
        // dd($request->idmembers);
 
        // dd($dataUser);

        $dataUser-> idUser = $request->idUserModal;
        $dataUser-> namaUser = $request->namaUserModal;
        $dataUser-> username = $request->usernameModal;
        $dataUser-> status = $request->status;
        $dataUser-> password = $request->passwordUserModal;
        $dataUser-> email = $request->emailModal; 
        $dataUser-> profile = $request->profileUserModal;
        $dataUser->update();

        return redirect('/admin')->with('Success User', 'Data Berhasil Di Ubah');

    }

}
