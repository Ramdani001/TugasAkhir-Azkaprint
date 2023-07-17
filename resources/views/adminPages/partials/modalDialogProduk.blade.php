{{-- Modal Tambah Produk --}}
<button class="w-full h-screen top-0 left-0 bg-blue-800/30 absolute z-10 bgModal hidden transition-colors duration-700 ease-linear" id="bgModalProduk">

</button>

<div id="modalTambahProduk" class="h-screen w-full  absolute top-0 left-0 z-50 hidden transition-transform duration-700 ease-linear">
    <div class="flex justify-center mt-8">
        <div class="bg-slate-100 shadow-lg p-5 w-[500px] rounded-md shadow-black ">
            <h1 class="text-xl font-semibold">Tambah Data Produk</h1>
            <hr>
            <div class="mt-3">
                <form action="/createProduk1" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <input type="text" id="idProduk" name="idProduk" placeholder="Id Produk" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="namaProduk" name="namaProduk" placeholder="Nama Produk" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="tipeProduk" name="tipeProduk" placeholder="Tipe Produk" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="jumlahProduk" name="jumlahProduk" placeholder="Jumlah Produk" value="" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="hargaProduk" name="hargaProduk" placeholder="Harga Produk" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <div class="flex w-full mt-3">
                        <button type="button" onclick="modalProduk('Close')" class="py-1 w-full bg-gray-800 rounded-md text-white shadow-md mr-2 btnBatalModalProduk" id="btnBatalProduk">Batal</button>
                        <button type="submit" class="py-1 w-full bg-blue-800 rounded-md text-white shadow-md btnTmbhProduk" value="produk">Tambah</button>
                    </div>
                </form> 
            </div>
        </div>
    </div>
</div>
{{-- Modal Tambah Produk --}}

{{-- Modal Edit Produk --}}
<button class="w-full h-screen top-0 left-0 bg-blue-800/30 absolute z-10 bgModal hidden transition-colors duration-700 ease-linear" id="bgModalEdit">

</button>

<div id="modalEditProduk" class="h-screen w-full  absolute top-0 left-0 z-50 hidden transition-transform duration-700 ease-linear">
    <div class="flex justify-center mt-8">
        <div class="bg-slate-100 shadow-lg p-5 w-[500px] rounded-md shadow-black ">
            <h1 class="text-xl font-semibold">Edit Data Produk</h1>
            <hr>
            <div class="mt-3">
                <form action="/updateDataProduk" method="post" enctype="multipart/form-data">

                    @csrf
                    @method('PUT')

                    <input type="text" name="idPK" id="idPK">

                    <input type="text" id="idModalProduk" name="idProduk" placeholder="Id Produk" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="namaModalProduk" name="namaProduk" placeholder="Nama Produk" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="tipeModalProduk" name="tipeProduk" placeholder="Tipe Produk" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="jumlahModalProduk" name="jumlahProduk" placeholder="Jumlah Produk" value="" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="hargaModalProduk" name="hargaProduk" placeholder="Harga Produk" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <div class="flex w-full mt-3">
                        <button type="button" onclick="modalProduk('CloseEdit')" class="py-1 w-full bg-gray-800 rounded-md text-white shadow-md mr-2 btnBatalModalProduk" id="btnBatalProduk">Batal</button>
                        <button type="submit" class="py-1 w-full bg-blue-800 rounded-md text-white shadow-md">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit Produk --}}

{{-- Modal Hapus Produk --}}
<button class="w-full h-screen top-0 left-0 bg-blue-800/30 absolute z-10 bgModal hidden transition-colors duration-700 ease-linear" id="bgModalHapus">

</button>

<div id="modalHapusProduk" class="h-screen w-full  absolute top-0 left-0 z-50 hidden transition-transform duration-700 ease-linear">
    <div class="flex justify-center mt-8">
        <div class="bg-slate-100 shadow-lg p-5 w-[500px] rounded-md shadow-black ">
            <h1 class="text-xl font-semibold">Hapus Data Produk<"/h1>
            <hr>
            <div class="mt-3">
                <form action="/hapusDataProduk"  method="GET">
                    @csrf
                    <div>
                        <h1>Apakah Anda Yakin Akan Menghapus Data...??? 
                            <input type="text" name="idProduk" id="idProduk1">
                        </h1>
                    </div>
                    <div class="flex w-full mt-3">
                        <button type="button" onclick="modalProduk('CloseHapus')" class="py-1 w-full bg-gray-800 rounded-md text-white shadow-md mr-2 btnBatalModalProduk" id="btnBatalProduk">Tidak</button>
                        <button type="submit" class="py-1 w-full bg-blue-800 rounded-md text-white shadow-md">Ya</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Modal Hapus Produk --}}