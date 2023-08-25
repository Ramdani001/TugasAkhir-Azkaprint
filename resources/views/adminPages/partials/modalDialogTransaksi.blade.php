{{-- Modal Edit Transaksi --}}
<button class="w-full h-screen top-0 left-0 bg-blue-800/30 absolute z-10 bgModal hidden transition-colors duration-700 ease-linear" id="bgModalDetailTransaksi">
</button>

<div id="modalDetailTransaksi" class="h-screen w-full absolute top-0 left-0 z-50 hidden transition-transform duration-700 ease-linear">
    <div class="flex justify-center mt-8">
        <div class="bg-slate-100 shadow-lg p-5 w-[500px] rounded-md shadow-black ">
            <h1 class="text-xl font-semibold">Detail Data Transaksi</h1>
            <hr>
            <div class="mt-3"> 
 
                    <input readonly type="text" id="idPKTransaksi" name="idPKTransaksi" placeholder="IdPK Transaksi" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1" hidden>

                    <input readonly type="text" id="idTransaksiModal" name="idTransaksiModal" placeholder="Id Transaksi" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input readonly type="text" id="namaPemesan" name="namaPemesan" placeholder="Nama Pemesan" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input readonly type="text" id="jumlahPesanan" name="jumlahPesanan" placeholder="Jumlah Pesanan" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">

                    <input readonly type="text" id="totalBayar" name="totalBayar" placeholder="Total Bayar" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">
                    
                    <input readonly type="text" id="statusTransaksi" name="statusTransaksi" placeholder="Status Pemesanan" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1">
                    
                    {{-- <input readonly type="text" id="tglPemesanan" name="tglPemesanan" placeholder="Tanggal Pemesanan" class="border-2 my-2 rounded-sm shadow-md bg-white w-full px-3 py-1"> --}}

                    <div>
                        <h1>List Produk</h1> 
                        <div class="text-md font-semibold overflow-y-auto h-32" id="listProduk" name="listProduk">
                            <ul class="text-sm font-normal" id="listDetailProduk">
                                
                                    {{-- <li class="grid grid-cols-3">
                                        <h2>Id Produk: {{ $produk->getProduk['idProduk'] }} </h2>
                                        <h2>Name: {{ $produk->getProduk['namaProduk'] }}</h2>
                                        <span class="text-xs text-slate-500 align-end justify-self-end pr-3">Jumlah :  {{ $produk->jumlah }} </span>
                                    </li> --}}
                                
                            </ul>
                        </div>
                    </div>

                    <div class="flex w-full mt-3">
                        <button type="button" onclick="modalTransaksi('CloseDetail')" class="py-1 w-full bg-gray-800 rounded-md text-white shadow-md mr-2 btnBatalModalTransaksi" id="btnBatalTransaksi">Kembali</button>
                    </div>
                
            </div>
        </div> 
    </div>
</div>

{{-- Modal Edit Transaksi --}}

