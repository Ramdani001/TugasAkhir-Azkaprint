<div class="pl-[14%] mt-4 w-full h-[85vh] text-white">
    
    <div class="bg-white w-[99%] h-[77vh] rounded-md shadow-md grid grid-rows-4">
        <h1 class="text-center text-3xl font-semibold text-black my-2">
            CETAK LAPORAN
        </h1>
        <div class="grid grid-cols-3 gap-4 justify-items-center items-center border-2 row-span-3">
            <div class="bg-blue-400 w-44 h-32 rounded-md shadow-md hover:scale-105 cursor-pointer hover:shadow-xl hover:bg-blue-500" name="menuDataUser" id="menuDataUser">
                <h1 class="text-2xl font-semibold mt-5 text-center">
                    DATA USER
                </h1>
                <h2 class="text-center font-semibold text-3xl mt-2">
                    <i class="fa-solid fa-user"></i>
                </h2>
            </div>
            <div class="bg-red-400 w-44 h-32 rounded-md shadow-md hover:scale-105 cursor-pointer hover:shadow-xl hover:bg-red-500">
                <h1 class="text-xl font-semibold mt-5 text-center">
                    DATA TRANSAKSI
                </h1>
                <h2 class="text-center font-semibold text-3xl mt-2">
                    <i class="fa-solid fa-address-book"></i>
                </h2>
            </div>
            <div class="bg-green-400 w-44 h-32 rounded-md shadow-md hover:scale-105 cursor-pointer hover:shadow-xl hover:bg-green-500">
                <h1 class="text-2xl font-semibold mt-5 text-center">
                    DATA PRODUK
                </h1>
                <h2 class="text-center font-semibold text-3xl mt-2">
                    <i class="fa-solid fa-boxes-stacked"></i>
                </h2>
            </div>
        </div>
    </div>
</div>

{{-- Modal Table --}}
<div class="absolute w-full h-screen p-3 bg-blue z-30 bg-blue-400/60 top-0 left-0 hidden" name="bgModalTableUser" id="bgModalTableUser">
    <div class="bg-white w-[80%] h-full mx-auto shadow-md rounded-md">
        <div class="flex flex-row w-full border-b-2">
            <div class="w-[95%]">
                <h3 class="font-semibold w-[180px] p-2">Data User</h3>
            </div>
            <div class="justify-end p-2 text-2xl font-semibold cursor-pointer" name="closeModalUser" id="closeModalUser">
                X
            </div>
        </div>

        <div class="p-3">

            <div class="mb-2 flex">
                <button class="bg-blue-400 px-4 py-2 font-semibold rounded-md shadow-md text-white mr-2">
                    Cetak Semua
                    <i class="fa-solid fa-print"></i>
                </button>
                <button onclick="periodeCetak()" class="bg-blue-400 px-4 py-2 font-semibold rounded-md shadow-md text-white mr-2" name="cetakPeriodeTahun">
                    Cetak Periode Tahun
                    <i class="fa-solid fa-print"></i>
                </button>
                <button class="bg-blue-400 px-4 py-2 font-semibold rounded-md shadow-md text-white mr-2">
                    Cetak Periode Bulan
                    <i class="fa-solid fa-print"></i>
                </button>
                <button class="bg-blue-400 px-4 py-2 font-semibold rounded-md shadow-md text-white mr-2">
                    Cetak Periode Tanggal
                    <i class="fa-solid fa-print"></i>
                </button>
            </div>

            <table class="border w-full h-full mx-auto">
                <tr class="text-center border-b bg-blue-500">
                    <th class="py-2">No</th>
                    <th class="py-2">Id Transaksi</th>
                    <th class="py-2">Nama Pemesan</th>
                    <th class="py-2">Jumlah Item</th>
                    <th class="py-2">Total Bayar</th>
                    <th class="py-2">Status Transaksi</th>
                </tr>
                <tr class="text-center py-2">
                    <td class="py-2">No</td>
                    <td class="py-2">Id Transaksi</td>
                    <td class="py-2">Nama Pemesan</td>
                    <td class="py-2">Jumlah Item</td>
                    <td class="py-2">Total Bayar</td>
                    <td class="py-2">Status Transaksi</td>
                </tr>
                
            </table>
            
        </div>
    </div>

    {{-- Print OrderBy --}}
    <div class="bg-gray-500/40 absolute top-0 left-0 w-full h-full hidden" name="bgModalUserSecond" id="bgModalUserSecond">
        <div class="bg-white absolute left-0 top-0 w-[50%] h-[18%] ml-[25%] mt-[15%] hidden rounded-md shadow-md" name="contentModalUserSecond" id="contentModalUserSecond">
            <div class="flex p-2 border-b-2">
                <div class="w-[96%] font-semibold text-xl">
                    <h2 class="">Periode Tahun</h2>
                </div>
                <div class="font-semibold text-xl cursor-pointer" name="closeModalSecond" id="closeModalSecond">
                    X
                </div>
            </div>

            {{-- Form Filter Cetak --}}
            <form class="mx-auto w-full grid grid-cols-2 gap-5 px-2 mt-3">
                <select name="dataTahun" id="dataTahun" class="border mb-1 shadow-md text-sm h-[100%] px-5 py-1">
                    <option value="">-- Tahun --</option>
                        <?php
                            for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                            echo "<option value='$i'> $i </option>";
                            }
                        ?>
                </select>
                <button class="bg-blue-400 px-4 py-1 font-semibold rounded-md shadow-md text-white">
                    CETAK
                    <i class="fa-solid fa-print"></i>
                </button>
            </form>

        </div>
    </div>
    {{-- Print OrderBy --}}

</div>
{{-- Modal Table --}}
 
{{-- Script --}}
    <script>
        // Modal User
        $('#menuDataUser').on('click', function() {
            $('#bgModalTableUser').removeClass('hidden');
            $('#closeModalUser').removeClass('hidden');

            $('#closeModalUser').on('click', function() {
                $('#closeModalUser').addClass('hidden');
                $('#bgModalTableUser').addClass('hidden');
            });    
        });

        $('#closeModalSecond').on('click', function() {
            $('#bgModalUserSecond').addClass('hidden');
        });
        
        // Periode Tahun

        function periodeCetak(){
            $('#bgModalUserSecond').removeClass('hidden');
            $('#contentModalUserSecond').removeClass('hidden');
        }

        // Modal Transaksi


        // Modal Produk

    </script>
{{-- Script --}}