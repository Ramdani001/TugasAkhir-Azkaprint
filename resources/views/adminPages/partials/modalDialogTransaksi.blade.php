{{-- Modal Edit Transaksi --}}
<button class="w-full h-screen top-0 left-0 bg-blue-800/30 absolute z-10 bgModal hidden transition-colors duration-700 ease-linear" id="bgModalEditTransaksi">
</button>

<div id="modalDetailTransaksi" class="h-screen w-full absolute top-0 left-0 z-50 hidden transition-transform duration-700 ease-linear">
    <div class="flex justify-center mt-8">
        <div class="bg-slate-100 shadow-lg p-5 w-[500px] rounded-md shadow-black ">
            <h1 class="text-xl font-semibold">Edit Data Transaksi</h1>
            <hr>
            <div class="mt-3"> 
                <form action="/updateDataTransaksi" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" id="idPKTransaksi" name="idPKTransaksi" placeholder="Id Transaksi" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="idTransaksi" name="idTransaksi" placeholder="Id Transaksi" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="namaPemesan" name="namaPemesan" placeholder="Nama Transaksi" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="totalHarga" name="totalHarga" placeholder="Tipe Transaksi" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <select name="statusTransaksi" id="statusTransaksi">
                        <option value="Lunas">Lunas</option>
                    </select>

                    <input type="text" id="totalHarga" name="totalHarga" placeholder="Tipe Transaksi" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input type="text" id="buktiTransfer" name="buktiTransfer" placeholder="Jumlah Transaksi" value="" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <div class="flex w-full mt-3">
                        <button type="button" onclick="modalTransaksi('CloseDetail')" class="py-1 w-full bg-gray-800 rounded-md text-white shadow-md mr-2 btnBatalModalTransaksi" id="btnBatalTransaksi">Batal</button>
                        <button type="submit" class="py-1 w-full bg-blue-800 rounded-md text-white shadow-md">Edit</button>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>

{{-- Modal Edit Transaksi --}}

