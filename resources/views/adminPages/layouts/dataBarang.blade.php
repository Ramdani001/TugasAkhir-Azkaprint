<div class="ml-[13%] mt-4 mx-3">
    <div class="header flex flex-rows-2 w-full border-3">
        <div class="border w-full">
            <h1 class="text-xl font-semibold">Data Barang</h1>
        </div>
        <div class="ml-3">
            <div class="mb-2 relative w-[100%]">
                <button class="cursor-pointer shadow-md text-white bg-blue-400 px-8 py-1 mb-2 rounded-md btnTambahBrng" onclick="modalBarang('Tambah')" value="dataBarang">
                    Tambah
                </button>
            </div>
        </div>
    </div>
    <div class="content mt-5">
        <div class="w-full rounded-md shadow-md">
            <table class="w-full pr-8">
                <thead class=" bg-white">
                    <tr class="border text-center">
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Type Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Tanggal Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataBarang as $barang)
                        <tr class="border text-center">
                            <td class="py-2">
                                {{ $barang->idBarang }}
                            </td>
                            <td class="py-2">
                                {{ $barang->namaBarang }}
                            </td>
                            <td class="py-2">
                                {{ $barang->tipeBarang }}
                            </td>
                            <td class="py-2">
                                {{ $barang->jumlahBarang }}
                            </td>
                            <td class="py-2">
                                {{ $barang->created_at }}
                            </td>
                            <td class="py-2">
                                <button class="px-4 py-1 bg-green-400 text-white font-semibold rounded-md shadow-md" onclick="modalBarang('Edit', '{{ $barang->id }}')">Edit</button>
                                <button class="btnHapus px-4 py-1 bg-red-400 text-white font-semibold rounded-md shadow-md" onclick="modalBarang('Hapus', '{{ $barang->id }}')" value="970">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@include('adminPages.partials.modalDialogBarang')