<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Produk;
use App\Models\tblUser; 
use Illuminate\Http\Request;

class userAdmin extends Controller
{ 
    public function createUser(Request $request ){

        $this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
        $tujuan_upload =public_path().'/img/profile';
		$file->move($tujuan_upload,$nama_file);

        $dataUser = new tblUser;
        $dataUser-> idUser = $request->idUser;
        $dataUser-> namaUser = $request->namaUser;
        $dataUser-> username = $request->username;
        $dataUser-> password = $request->password;
        $dataUser-> status = $request->status;
        $dataUser-> email = $request->email;
        $dataUser-> profile = $nama_file;
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

    public function hapusUser(Request $request){
        $id = $request->idUser;

        $dataUser = tblUser::where('id',$id);
        $dataUser->delete();

        return redirect('/admin')->with('Success User', 'Data Berhasil Di Hapus');

    }

    // Produk
    public function createDataProduk(Request $request){

        $dataProduk = new Produk;
        $dataProduk-> idProduk = $request->idProduk;
        $dataProduk-> namaProduk = $request->namaProduk;
        $dataProduk-> tipeProduk = $request->tipeProduk;
        $dataProduk-> jumlahProduk = $request->jumlahProduk;
        $dataProduk-> hargaProduk = $request->hargaProduk;
        $dataProduk->save();

        return redirect('/admin')->with('Success Produk', 'Data Berhasil Di Tambahkan');
    }

    public function editProduk($id){
        // var_dump($id);

        // $idUsers = $id;
        $dataProduk = Produk::find($id);
        
        return response()->json([
            'status'=> 200,
            'dataProduk'=> $dataProduk
        ]);
    }

    public function updateProduk(Request $request){
        $id = $request->input('idPK');
        $dataProduk = Produk::find($id);
        // dd($request->idmembers);
  
        // dd($dataProduk);

        $dataProduk-> idProduk = $request->idProduk;
        $dataProduk-> namaProduk = $request->namaProduk;
        $dataProduk-> tipeProduk = $request->tipeProduk;
        $dataProduk-> jumlahProduk = $request->jumlahProduk;
        $dataProduk-> hargaProduk = $request->hargaProduk;
        $dataProduk->update();

        return redirect('/admin')->with('Success Update Produk', 'Data Berhasil Di Ubah');
    }

    public function hapusProduk(Request $request){
        $id = $request->input('idProduk');

        $dataProduk = Produk::where('id',$id);
        $dataProduk->delete();

        return redirect('/admin')->with('Success Update Produk', 'Data Berhasil Di Hapus');
    }

    public function createDataBarang(Request $request){
        // dd($request->namaBarang);

        $dataBarang = New Barang;
        $dataBarang -> idBarang = $request->idBarang;
        $dataBarang -> namaBarang = $request->namaBarang;
        $dataBarang -> tipeBarang = $request->tipeBarang;
        $dataBarang -> jumlahBarang = $request->jumlahBarang;
        $dataBarang->save();

        return redirect('/admin')->with('Success Barang', 'Data Berhasil Ditambahkan');

    }

    public function editBarang($id){
         // var_dump($id);

        // $idUsers = $id;
        $dataBarang = Barang::find($id);
        
        return response()->json([
            'status'=> 200,
            'dataBarang'=> $dataBarang
        ]);
    }

    public function updateBarang(Request $request){
        $id = $request->input('idPKBarang');
        $dataBarang = Barang::find($id);
 
        $dataBarang-> idBarang = $request->idBarang;
        $dataBarang-> namaBarang = $request->namaBarang;
        $dataBarang-> tipeBarang = $request->tipeBarang;
        $dataBarang-> jumlahBarang = $request->jumlahBarang;
        $dataBarang->update();

        return redirect('/admin')->with('Success Update Barang', 'Data Berhasil Di Ubah');
    }

    public function hapusBarang(Request $request){
        $id = $request->input('idBarang');

        $dataBarang = Barang::where('id',$id);
        $dataBarang->delete();

        return redirect('/admin')->with('Success Update Barang', 'Data Berhasil Di Hapus');
    }

}