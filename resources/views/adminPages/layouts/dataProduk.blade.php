<div class="ml-[13%] mt-4 mx-3">
    <div class="header flex flex-rows-2 w-full border-3">
        <div class="border w-full">
            <h1 class="text-xl font-semibold">Data Produk</h1>
        </div>
        <div class="ml-3">
            <div class="mb-2 relative w-[100%]">
                <label for="12" class="cursor-pointer shadow-md text-white bg-blue-400 px-8 py-1 mb-2 rounded-md btnTambah">
                    Tambah
                </label>
                {{-- @include('adminPages.partials.modalDataBarang') --}}
            </div>
            @include('adminPages.partials.modalTambahBarang')
        </div>
    </div>
    <div class="content mt-5">
        <div class="w-full rounded-md shadow-md">
            <table class="w-full pr-8">
                <thead class=" bg-white">
                    <tr class="border text-center">
                        <th>ID Produk</th>
                        <th>Nama Produk</th>
                        <th>Type Produk</th>
                        <th>Jumlah Produk</th>
                        <th>Harga Produk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border text-center">
                        <td class="py-2">STM-009</td>
                        <td class="py-2">Stempel</td>
                        <td class="py-2">Stempel D1</td>
                        <td class="py-2">20</td>
                        <td class="py-2">Rp. 78.000</td>
                        <td class="py-2">
                            <button class="px-4 py-1 bg-green-400 text-white font-semibold rounded-md shadow-md">Edit</button>
                            <button class="px-4 py-1 bg-red-400 text-white font-semibold rounded-md shadow-md">Hapus</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>