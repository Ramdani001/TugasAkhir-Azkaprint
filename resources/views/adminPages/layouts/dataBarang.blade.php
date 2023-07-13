<div class="ml-[13%] mt-4 mx-3">
    <div class="header flex flex-rows-2 w-full border-3">
        <div class="border w-full">
            <h1 class="text-xl font-semibold">Data Barang</h1>
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
                        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Type Barang</th>
                        <th>Jumlah Barang</th>
                        <th>Tanggal Masuk</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border text-center">
                        <td class="py-2">UI8789</td>
                        <td class="py-2">Tinta Biru</td>
                        <td class="py-2">Bahan</td>
                        <td class="py-2">15</td>
                        <td class="py-2">12/09/2023</td>
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