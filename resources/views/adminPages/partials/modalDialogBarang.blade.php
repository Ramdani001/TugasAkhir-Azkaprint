{{-- Modal Tambah Produk --}}
<button class="w-full h-screen top-0 left-0 bg-blue-800/30 absolute z-10 bgModal hidden transition-colors duration-700 ease-linear" id="bgModalBarang">

</button>

<div id="modalTambahBarang" class="h-screen w-full  absolute top-0 left-0 z-50 hidden transition-transform duration-700 ease-linear">
    <div class="flex justify-center mt-8">
        <div class="bg-slate-100 shadow-lg p-5 w-[500px] rounded-md shadow-black "> 
            <h1 class="text-xl font-semibold">Tambah Data Barang</h1>
            <hr> 
            <div class="mt-3">
                <form action="/createDataBarang" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="text" id="idBarang" name="idBarang" placeholder="Id Barang" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="namaBarang" name="namaBarang" placeholder="Nama Barang" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="tipeBarang" name="tipeBarang" placeholder="Tipe Barang" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="jumlahBarang" name="jumlahBarang" placeholder="Jumlah Barang" value="" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    {{-- <input type="text" id="hargaBarang" name="hargaBarang" placeholder="Harga Barang" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1"> --}}

                    <div class="flex w-full mt-3">
                        <button type="button" onclick="modalBarang('Close')" class="py-1 w-full bg-gray-800 rounded-md text-white shadow-md mr-2 btnBatalModalBarang" id="btnBatalBarang">Batal</button>
                        <button type="submit" class="py-1 w-full bg-blue-800 rounded-md text-white shadow-md btnTmbhBarang">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- Modal Tambah Barang --}}

{{-- Modal Edit Barang --}}
<button class="w-full h-screen top-0 left-0 bg-blue-800/30 absolute z-10 bgModal hidden transition-colors duration-700 ease-linear" id="bgModalEdit">
</button>

<div id="modalEditBarang" class="h-screen w-full  absolute top-0 left-0 z-50 hidden transition-transform duration-700 ease-linear">
    <div class="flex justify-center mt-8">
        <div class="bg-slate-100 shadow-lg p-5 w-[500px] rounded-md shadow-black ">
            <h1 class="text-xl font-semibold">Edit Data Barang</h1>
            <hr>
            <div class="mt-3">
                <form action="/updateDataBarang" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" id="idPKBarang" name="idPKBarang" placeholder="Id Barang" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="idModalBarang" name="idBarang" placeholder="Id Barang" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="namaModalBarang" name="namaBarang" placeholder="Nama Barang" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="tipeModalBarang" name="tipeBarang" placeholder="Tipe Barang" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="jumlahModalBarang" name="jumlahBarang" placeholder="Jumlah Barang" value="" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <div class="flex w-full mt-3">
                        <button type="button" onclick="modalBarang('CloseEdit')" class="py-1 w-full bg-gray-800 rounded-md text-white shadow-md mr-2 btnBatalModalBarang" id="btnBatalBarang">Batal</button>
                        <button type="submit" class="py-1 w-full bg-blue-800 rounded-md text-white shadow-md">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Edit Barang --}}

{{-- Modal Hapus Barang --}}
<button class="w-full h-screen top-0 left-0 bg-blue-800/30 absolute z-10 bgModal hidden transition-colors duration-700 ease-linear" id="bgModalHapus">

</button>

<div id="modalHapusBarang" class="h-screen w-full  absolute top-0 left-0 z-50 hidden transition-transform duration-700 ease-linear">
    <div class="flex justify-center mt-8">
        <div class="bg-slate-100 shadow-lg p-5 w-[500px] rounded-md shadow-black ">
            <h1 class="text-xl font-semibold">Hapus Data Barang<"/h1>
            <hr>
            <div class="mt-3">
               <form action="/hapusDataBarang" method="get">
                    @csrf 

                    <div>
                        <h1>Apakah Anda Yakin Akan Menghapus Data...??? 
                            <input type="text" name="idBarang" id="idBarang1">
                        </h1>
                    </div>
                    <div class="flex w-full mt-3">
                        <button type="button" onclick="modalBarang('CloseHapus')" class="py-1 w-full bg-gray-800 rounded-md text-white shadow-md mr-2 btnBatalModalBarang" id="btnBatalBarang">Tidak</button>
                        <button type="submit" class="py-1 w-full bg-blue-800 rounded-md text-white shadow-md">Ya</button>
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>
{{-- Modal Hapus Barang --}}