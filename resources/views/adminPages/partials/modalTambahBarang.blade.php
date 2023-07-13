{{-- Tambah Data Barang --}}
<input type="checkbox" id="12" class="peer fixed appearance-none opacity-0">
{{-- modalUser --}}
<label for="12" class=" pointer-events-none invisible fixed inset-0 flex cursor-pointer pt-5 z-50 justify-center overflow-hidden overscroll-contain bg-slate-700/30 opacity-0 transition-all duration-300 ease-in-out peer-checked:pointer-events-auto peer-checked:opacity-100 peer-checked:visible peer-checked:[&>*]:translate-y-0 peer-checked:[&>*]:scale-100">
    {{-- modalUser Box --}}
    <label for="" class="max-h-[calc(100vh - $em)] h-[420px] max-w-lg scale-0 overflow-y-auto overscroll-contain rounded-md bg-white p-6 text-black shadow-2xl transition">
        <h3 class="text-lg font-bold" >Tambah Data Barang</h3>
        <div class="py-4">
            <form action="" method="post" enctype="multipart/form-data" class="">
                @csrf
                <input type="text" placeholder="Id Barang" class="w-full mt-2 border-slate-400 border mb-2 p-2 shadow-sm rounded-md bg-slate-200" name="idBarang" id="idBarangs" readonly>

                <input type="text" placeholder="Nama Barang" class="w-full mt-2 border-slate-400 border mb-2 p-2 shadow-sm rounded-md" name="namaBarang" id="namaBarang">

                <select name="tipeBarang" id="tipeBarang">
                    <option value="">-- Select Tipe --</option>
                    <option value="Stempel">Stempel</option>
                    <option value="Undangan">Undangan</option>
                    <option value="Spanduk">Spanduk</option>
                    <option value="Lanyard">Lanyard</option>
                    <option value="Id Card">Id Card</option>
                </select>

                {{-- <input type="text" placeholder="Tipe Barang" class="w-full mt-2 border-slate-400 border mb-2 p-2 shadow-sm rounded-md" name="tipeBarang"> --}}

                <input type="number" placeholder="Jumlah Barang" class="w-full mt-2 border-slate-400 border mb-2 p-2 shadow-sm rounded-md" name="jumlahBarang">

                <div class="mt-7 w-[100%] border text-center">
                    <button class="bg-blue-500 px-4 w-[40%] py-2 text-white rounded-md shadow-md hover:bg-blue-600 peer-checked:visible">Batal</button>
                    <button class="bg-green-500 w-[40%] px-4 py-2 text-white rounded-md shadow-md hover:bg-green-600">Tambah</button>
                </div>
            </form>
        </div>
    </label>
</label> 
{{-- Tambah Data Barang --}}

