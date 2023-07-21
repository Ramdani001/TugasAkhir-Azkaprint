<div class="ml-[13%] mt-4 mx-3">
    <div class="header flex flex-rows-2 w-full border-3">
        <div class="border w-full">
            <h1 class="text-xl font-semibold">Data Transaksi</h1>
        </div>
        <div class="ml-3">
            <div class="mb-2 relative w-[100%]">
                
            </div>
        </div>
    </div> 
    <div class="content mt-5">
        <div class="w-full rounded-md shadow-md">
            <table class="w-full pr-8">
                <thead class=" bg-white">
                    <tr class="border text-center">
                        <th>Id Transaksi</th>
                        <th>Nama Pemesan</th>
                        <th>Total Pembelian</th>
                        <th>Bukti Transfer</th>
                        <th>Status Transaksi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border text-center">
                        <td class="py-2">TRI-0001</td>
                        <td class="py-2">Rizkan Ramdani</td>
                        <td class="py-2">Rp. 154.000</td>
                        <td class="justify-center">
                            <img src="{{ 'img/transaksi/ilustrasi.png' }}" alt="buktiTransfer" class="w-10 mx-auto">
                        </td>
                        <td class="py-2">
                            <button class="px-7 py-1 bg-gray-800 text-white rounded-md shadow-md">Pending</button>
                        </td>
                        <td class="py-2">
                            <div class="grid grid-cols-2 gap-2">
                                <button class="bg-green-500 px-5 py-1 text-white rounded-md shadow-md">Detail</button>
                                <button class="bg-red-500 px-5 py-1 text-white rounded-md shadow-md">Hapus</button>
                            </div>
                        </td>
                    </tr>
                </tbody>
                {{-- <tbody> 
                    @foreach ($dataProduk as $produk)
                        <tr class="border text-center">
                            <td class="py-2 text-center">
                                <img src="{{ 'img/produk/' }}{{ $produk->fotoProduk }} " class="w-10 mx-auto">
                            </td>
                            <td class="py-2">
                                {{ $produk->idProduk }}
                            </td>
                            <td class="py-2">
                                {{ $produk->namaProduk }}
                            </td>
                            <td class="py-2">
                                {{ $produk->tipeProduk }}
                            </td>
                            <td class="py-2">
                                {{ $produk->jumlahProduk }}
                            </td>
                            <td class="py-2">
                                <?php // $harga = $produk->hargaProduk;
                                    //echo "Rp. ". number_format($harga, 0, ".", ".")."/Item";
                                ?>
                            </td>
                            <td class="py-2">
                                <button class="px-4 py-1 bg-green-400 text-white font-semibold rounded-md shadow-md" onclick="modalProduk('Edit', '{{ $produk->id }}')">Edit</button>
                                <button value="180" class="btnHapus px-4 py-1 bg-red-400 text-white font-semibold rounded-md shadow-md" onclick="modalProduk('Hapus', '{{ $produk->id }}')">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody> --}}
            </table>
        </div>
    </div>
</div>
@include('adminPages.partials.modalDialogProduk')