<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Produk;
use App\Models\User;
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

        $dataUser = new User;
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
        $dataUser = User::find($id);
        
        return response()->json([
            'status'=> 200,
            'DataUser'=> $dataUser
        ]);
    }

    public function updateUser(Request $request){

        $id = $request->input('idModalUser');
        $dataUser = User::find($id);
        // dd($request->idmembers);
  
        // dd($dataUser);
 
        $dataUser-> idUser = $request->idUserModal;
        $dataUser-> namaUser = $request->namaUserModal;
        $dataUser-> username = $request->usernameModal;
        $dataUser-> status = $request->status;
        $dataUser-> password = $request->passwordUserModal;
        $dataUser-> email = $request->emailModal; 

        // dd($request->profileUserModal);

        $fotoBaru = $request->profileUserModal;

        if( $fotoBaru != null){
            $this->validate($request, [
                'profileUserModal' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ]);
     
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('profileUserModal');
     
            $nama_file = time()."_".$file->getClientOriginalName();

              // isi dengan nama folder tempat kemana file diupload
              $tujuan_upload =public_path().'/img/profile';
              $file->move($tujuan_upload,$nama_file);
              
              $dataUser-> profile = $nama_file;
            // dd($dataUser);
        }else{
            $dataUser-> profile = $request->gambarLama;
            
        }
        $dataUser->update();

        return redirect('/admin')->with('Success User', 'Data Berhasil Diubah');

    }

    public function hapusUser(Request $request){
        $id = $request->idUser;

        $dataUser = User::where('id',$id);
        $dataUser->delete();

        return redirect('/admin')->with('Success User', 'Data Berhasil Di Hapus');

    }
 
    // Produk
    public function createDataProduk(Request $request){

        $this->validate($request, [
            'fotoProduk' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
 
        // menyimpan data file yang diupload ke variabel $file
        $file = $request->file('fotoProduk');
 
        $nama_file = time()."_".$file->getClientOriginalName();

          // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload =public_path().'/img/produk';
        $file->move($tujuan_upload,$nama_file);
        

        $dataProduk = new Produk;
        $dataProduk-> idProduk = $request->idProduk;
        $dataProduk-> namaProduk = $request->namaProduk;
        $dataProduk-> tipeProduk = $request->tipeProduk;
        $dataProduk-> jumlahProduk = $request->jumlahProduk;
        $dataProduk-> hargaProduk = $request->hargaProduk;
        $dataProduk-> fotoProduk = $nama_file;
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

        $fotoBaru = $request->fotoProdukBaru;

        if( $fotoBaru != null){
            $this->validate($request, [
                'fotoProdukBaru' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            ]);
     
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('fotoProdukBaru');
     
            $nama_file = time()."_".$file->getClientOriginalName();

              // isi dengan nama folder tempat kemana file diupload
              $tujuan_upload =public_path().'/img/produk';
              $file->move($tujuan_upload,$nama_file);
              
              $dataProduk-> fotoProduk = $nama_file;
            // dd($dataProduk);
        }else{
            $dataProduk-> fotoProduk = $request->fotoProdukLama;
            
        }

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
 