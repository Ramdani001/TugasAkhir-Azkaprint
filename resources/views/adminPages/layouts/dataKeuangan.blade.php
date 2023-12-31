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
            <div class="bg-red-400 w-44 h-32 rounded-md shadow-md hover:scale-105 cursor-pointer hover:shadow-xl hover:bg-red-500"  name="menuDataTransaksi" id="menuDataTransaksi">
                <h1 class="text-xl font-semibold mt-5 text-center">
                    DATA TRANSAKSI
                </h1>
                <h2 class="text-center font-semibold text-3xl mt-2">
                    <i class="fa-solid fa-address-book"></i>
                </h2>
            </div>
            <div class="bg-green-400 w-44 h-32 rounded-md shadow-md hover:scale-105 cursor-pointer hover:shadow-xl hover:bg-green-500" name="menuDataProduk" id="menuDataProduk">
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

{{-- Modal Table User --}}
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
                <a href="/cetakPdf/{{ 'DataUser' }}" target="_blank" class="bg-blue-400 px-4 py-2 font-semibold rounded-md shadow-md text-white mr-2">
                    Cetak Semua
                    <i class="fa-solid fa-print"></i>
                </a>
                <button onclick="periodeCetak('Tahun')" class="bg-blue-400 px-4 py-2 font-semibold rounded-md shadow-md text-white mr-2" name="cetakPeriodeTahun">
                    Cetak Periode Tahun
                    <i class="fa-solid fa-print"></i>
                </button>
                <button onclick="periodeCetak('Bulan')" class="bg-blue-400 px-4 py-2 font-semibold rounded-md shadow-md text-white mr-2">
                    Cetak Periode Bulan
                    <i class="fa-solid fa-print"></i>
                </button>
                <button onclick="periodeCetak('Tanggal')" class="bg-blue-400 px-4 py-2 font-semibold rounded-md shadow-md text-white mr-2">
                    Cetak Periode Tanggal
                    <i class="fa-solid fa-print"></i>
                </button>
            </div>

            <table class="border w-full h-full mx-auto" id="tabelDataUser">
                <thead>
                    <tr class="text-center border-b bg-blue-500">
                        <th class="py-2">No</th>
                        <th class="py-2">Id User</th>
                        <th class="py-2">Nama User</th>
                        <th class="py-2">Status User</th>
                        <th class="py-2">Email</th>
                        <th class="py-2">Created</th>
                    </tr>
                </thead>
                <tbody class="text-center py-2">

                </tbody>
                
            </table>
            
        </div>
    </div>

    {{-- Print OrderBy Tahun --}}
    <div class="bg-gray-500/40 absolute top-0 left-0 w-full h-full hidden" name="bgModalUserSecondTahun" id="bgModalUserSecondTahun">
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
            <div class="mx-auto w-full grid grid-cols-2 gap-5 px-2 mt-3">
               <form action="/cetakPdf/{{ 'User-Tahun' }}" target="_blank">
                    <select name="dataTahun" id="dataTahun" class="border mb-1 shadow-md text-sm h-[100%] px-5 py-1">
                        <option value="">-- Tahun --</option>
                            <?php
                                for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                                echo "<option value='$i'> $i </option>";
                                }
                            ?>
                    </select>
                    <button type="submit" name="cetakTahunUser" id="cetakTahunUser" class="bg-blue-400 px-4 py-1 font-semibold rounded-md shadow-md text-white">
                        CETAK
                        <i class="fa-solid fa-print"></i>
                    </button>
               </form>
            </div>

        </div>
    </div>
    {{-- Print OrderBy Tahun --}}

    {{-- Bulan --}}
    {{-- Print OrderBy Bulan --}}
    <div class="bg-gray-500/40 absolute top-0 left-0 w-full h-full hidden" name="bgModalUserBulan" id="bgModalUserBulan">
        <div class="bg-white absolute left-0 top-0 w-[50%] h-[18%] ml-[25%] mt-[15%] hidden rounded-md shadow-md" name="contentModalUserBulan" id="contentModalUserBulan">
            <div class="flex p-2 border-b-2">
                <div class="w-[96%] font-semibold text-xl">
                    <h2 class="">Periode Bulan</h2>
                </div>
                <div class="font-semibold text-xl cursor-pointer" name="closeModalSecondBulan" id="closeModalSecondBulan">
                    X
                </div>
            </div>

            {{-- Form Filter Cetak --}}
            <form action="/cetakPdf/{{ 'User-Bulan' }}" target="_blank" class="mx-auto w-full grid grid-cols-3 gap-5 px-2 mt-3">
                    <select name="dataTahun1" id="dataTahun1" class="border mb-1 shadow-md text-sm h-[100%] px-5 py-1">
                        <option value="">-- Tahun --</option>
                            <?php
                                for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                                echo "<option value='$i'> $i </option>";
                                }
                            ?>
                    </select>
    
                    {{-- Bulan --}}
                    <select name="dataBulan1" id="dataBulan1" class="border mb-1 shadow-md text-sm h-[100%] px-5 py-1">
                        <option value="">-- Bulan --</option>
                        <option value="1">Januari</option>
                        <option value="2">Februari</option>
                        <option value="3">Maret</option>
                        <option value="4">April</option>
                        <option value="5">Mei</option>
                        <option value="6">Juni</option>
                        <option value="7">Juli</option>
                        <option value="8">Agustus</option>
                        <option value="9">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                    <button type="submit" name="btnCetakBulan" id="btnCetakBulan" class="bg-blue-400 px-4 py-1 font-semibold rounded-md shadow-md text-white">
                        CETAK
                        <i class="fa-solid fa-print"></i>
                    </button>
            </form>

        </div>
    </div>
    {{-- Print OrderBy Bulan --}}
    {{-- Bulan --}}

    {{-- Tanggal --}}
    {{-- Print OrderBy Tanggal --}}
    <div class="bg-gray-500/40 absolute top-0 left-0 w-full h-full hidden" name="bgModalUserTanggal" id="bgModalUserTanggal">
        <div class="bg-white absolute left-0 top-0 w-[50%] h-[20%] ml-[25%] mt-[15%] hidden rounded-md shadow-md" name="contentModalUserTanggal" id="contentModalUserTanggal">
            <div class="flex p-2 border-b-2">
                <div class="w-[96%] font-semibold text-xl">
                    <h2 class="">Periode Tanggal</h2>
                </div>
                <div class="font-semibold text-xl cursor-pointer" name="closeModalSecondTanggal" id="closeModalSecondTanggal">
                    X
                </div>
            </div>

            {{-- Form Filter Cetak --}}
            <form action="/cetakPdf/{{ 'User-Tanggal' }}" target="_blank" class="mx-auto w-full grid grid-cols-2 gap-5 px-2 mt-3">
                <div class="grid grid-cols-2 gap-2">
                    <div> 
                        <label> Date From : </label>
                        <input type="date" name="filterDateFromUser" id="filterDateFromUser" class="border shadow-md">
                    </div>
                    <div>
                        <label> Date To : </label>
                        <input type="date" name="filterDateToUser" id="filterDateToUser" class="border shadow-md">
                    </div>
                </div>
                <button type="submit" name="btnCetakTglUser" id="btnCetakTglUser" class="bg-blue-400 px-4 py-1 font-semibold rounded-md shadow-md text-white w-full h-full">
                    CETAK
                    <i class="fa-solid fa-print"></i>
                </button>
            </form>

        </div>
    </div>
    {{-- Print OrderBy Tanggal --}}
    {{-- Tanggal --}}


</div>
{{-- Modal Table User --}}

{{-- Transaksi --}}
{{-- Modal Table Transaksi --}}
<div class="absolute w-full h-screen p-3 bg-blue z-30 bg-blue-400/60 top-0 left-0 hidden" name="bgModalTableTransaksi" id="bgModalTableTransaksi">
    <div class="bg-white w-[80%] h-full mx-auto shadow-md rounded-md">
        <div class="flex flex-row w-full border-b-2">
            <div class="w-[95%]">
                <h3 class="font-semibold w-[180px] p-2">Data Transaksi</h3>
            </div>
            <div class="justify-end p-2 text-2xl font-semibold cursor-pointer" name="closeModalTransaksi" id="closeModalTransaksi">
                X
            </div>
        </div>

        <div class="p-3">

            <div class="mb-2 flex">
                <a href="/cetakPdf/{{ 'Data Transaksi' }}" class="bg-blue-400 px-4 py-2 font-semibold rounded-md shadow-md text-white mr-2" target="_blank">
                    Cetak Semua 
                    <i class="fa-solid fa-print"></i>
                </a>
                <button onclick="periodeCetakTransaksi('Tahun')" class="bg-blue-400 px-4 py-2 font-semibold rounded-md shadow-md text-white mr-2" name="cetakPeriodeTahun">
                    Cetak Periode Tahun
                    <i class="fa-solid fa-print"></i>
                </button>
                <button onclick="periodeCetakTransaksi('Bulan')" class="bg-blue-400 px-4 py-2 font-semibold rounded-md shadow-md text-white mr-2">
                    Cetak Periode Bulan
                    <i class="fa-solid fa-print"></i>
                </button>
                <button onclick="periodeCetakTransaksi('Tanggal')" class="bg-blue-400 px-4 py-2 font-semibold rounded-md shadow-md text-white mr-2">
                    Cetak Periode Tanggal
                    <i class="fa-solid fa-print"></i>
                </button>
            </div>

            <table class="border w-full h-full mx-auto"  id="tabelDataTransaksi">
                <thead>
                    <tr class="text-center border-b bg-blue-500">
                        <th class="py-2">No</th>
                        <th class="py-2">Id Transaksi</th>
                        <th class="py-2">Nama Pemesan</th>
                        <th class="py-2">Jumlah Item</th>
                        <th class="py-2 text-left">Total Bayar</th>
                        <th class="py-2">Status Transaksi</th>
                        <th class="py-2">Tanggal Transaksi</th>
                    </tr>
                </thead>
                <tbody class="text-center py-2">

                </tbody>
            </table>

        </div>
    </div>

    {{-- Print OrderBy Tahun --}}
    <div class="bg-gray-500/40 absolute top-0 left-0 w-full h-full hidden" name="bgModalTransaksiSecondTahun" id="bgModalTransaksiSecondTahun">
        <div class="bg-white absolute left-0 top-0 w-[50%] h-[18%] ml-[25%] mt-[15%] hidden rounded-md shadow-md" name="contentModalTransaksiSecond" id="contentModalTransaksiSecond">
            <div class="flex p-2 border-b-2">
                <div class="w-[96%] font-semibold text-xl">
                    <h2 class="">Periode Tahun</h2>
                </div>
                <div class="font-semibold text-xl cursor-pointer" name="closeModalSecondTransaksi" id="closeModalSecondTransaksi">
                    X
                </div>
            </div>
 
            {{-- Form Filter Cetak --}}
            <form action="/cetakPdf/{{ 'Transaksi-Tahun' }}" target="_blank" class="mx-auto w-full grid grid-cols-2 gap-5 px-2 mt-3">
                <select name="dataTahunTransaksi" id="dataTahunTransaksi" class="border mb-1 shadow-md text-sm h-[100%] px-5 py-1">
                    <option value="">-- Tahun --</option>
                        <?php
                            for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                            echo "<option value='$i'> $i </option>";
                            }
                        ?>
                </select>
                <button id="cetakTahunTransaksi" class="bg-blue-400 px-4 py-1 font-semibold rounded-md shadow-md text-white">
                    CETAK
                    <i class="fa-solid fa-print"></i>
                </button>
            </form>

        </div>
    </div>
    {{-- Print OrderBy Tahun --}}

    {{-- Bulan --}}
    {{-- Print OrderBy Bulan --}}
    <div class="bg-gray-500/40 absolute top-0 left-0 w-full h-full hidden" name="bgModalTransaksiSecondBulan" id="bgModalTransaksiSecondBulan">
        <div class="bg-white absolute left-0 top-0 w-[50%] h-[18%] ml-[25%] mt-[15%] hidden rounded-md shadow-md" name="contentModalTransaksiBulan" id="contentModalTransaksiBulan">
            <div class="flex p-2 border-b-2">
                <div class="w-[96%] font-semibold text-xl">
                    <h2 class="">Periode Bulan</h2>
                </div>
                <div class="font-semibold text-xl cursor-pointer" name="closeModalSecondTransaksiBulan" id="closeModalSecondTransaksiBulan">
                    X
                </div>
            </div>

            {{-- Form Filter Cetak --}}
            <form action="/cetakPdf/{{ 'Transaksi-Bulan' }}" target="_blank"  class="mx-auto w-full grid grid-cols-3 gap-5 px-2 mt-3">
                <select name="dataTahun1" id="dataTahun1" class="border mb-1 shadow-md text-sm h-[100%] px-5 py-1">
                    <option value="">-- Tahun --</option>
                        <?php
                            for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                            echo "<option value='$i'> $i </option>";
                            }
                        ?>
                </select>
                
                <select name="dataBulan1" id="dataBulan1" class="border mb-1 shadow-md text-sm h-[100%] px-5 py-1">
                    <option value="">-- Bulan --</option>
                    <option value="1">Januari</option>
                    <option value="2">Februari</option>
                    <option value="3">Maret</option>
                    <option value="4">April</option>
                    <option value="5">Mei</option>
                    <option value="6">Juni</option>
                    <option value="7">Juli</option>
                    <option value="8">Agustus</option>
                    <option value="9">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
                <button type="submit" class="bg-blue-400 px-4 py-1 font-semibold rounded-md shadow-md text-white">
                    CETAK
                    <i class="fa-solid fa-print"></i>
                </button>
            </form>

        </div>
    </div>
    {{-- Print OrderBy Bulan --}}
    {{-- Bulan --}}

    {{-- Tanggal --}}
    {{-- Print OrderBy Tanggal --}}
    <div class="bg-gray-500/40 absolute top-0 left-0 w-full h-full hidden" name="bgModalTransaksiTanggal" id="bgModalTransaksiTanggal">
        <div class="bg-white absolute left-0 top-0 w-[50%] h-[20%] ml-[25%] mt-[15%] hidden rounded-md shadow-md" name="contentModalTransaksiTanggal" id="contentModalTransaksiTanggal">
            <div class="flex p-2 border-b-2">
                <div class="w-[96%] font-semibold text-xl">
                    <h2 class="">Periode Tanggal</h2>
                </div>
                <div class="font-semibold text-xl cursor-pointer" name="closeModalSecondTransaksiTanggal" id="closeModalSecondTransaksiTanggal">
                    X
                </div>
            </div>

            {{-- Form Filter Cetak --}}
            <form action="/cetakPdf/{{ 'Transaksi-Tanggal' }}" target="_blank" class="mx-auto w-full grid grid-cols-2 gap-5 px-2 mt-3" >
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label> Date From : </label>
                        <input type="date" name="filterDateFrom" id="filterDateFrom" class="border shadow-md">
                    </div>
                    <div>
                        <label> Date To : </label>
                        <input type="date" name="filterDateTo" id="filterDateTo" class="border shadow-md">
                    </div>
                </div>
                <button type="submit" class="bg-blue-400 px-4 py-1 font-semibold rounded-md shadow-md text-white w-full h-full">
                    CETAK
                    <i class="fa-solid fa-print"></i>
                </button>
            </form>

        </div>
    </div>
    {{-- Print OrderBy Tanggal --}}
    {{-- Tanggal --}}


</div>
{{-- Modal Table Transaksi --}} 


{{-- Produk --}}
{{-- Modal Table Produk --}}
<div class="absolute w-full h-full p-3 bg-blue z-30 bg-blue-400/60 top-0 left-0 hidden" name="bgModalTableProduk" id="bgModalTableProduk">
    <div class="bg-white w-[80%] h-[120%] mx-auto shadow-md rounded-md">
        <div class="flex flex-row w-full border-b-2">
            <div class="w-[95%]">
                <h3 class="font-semibold w-[180px] p-2">Data Produk</h3>
            </div>
            <div class="justify-end p-2 text-2xl font-semibold cursor-pointer" name="closeModalProduk" id="closeModalProduk">
                X
            </div>
        </div>

        <div class="p-3">

            <div class="mb-2 flex">
                <a href="/cetakPdf/{{ 'Data Produk' }}" target="_blank" class="bg-blue-400 px-4 py-2 font-semibold rounded-md shadow-md text-white mr-2">
                    Cetak Semua
                    <i class="fa-solid fa-print"></i>
                </a>
                
                {{-- Form Filter Cetak --}}
                <button onclick="periodeCetakTransaksi('FilterProduk')" class="bg-blue-400 px-4 py-2 font-semibold rounded-md shadow-md text-white mr-2">
                    Type Filter
                    <i class="fa-solid fa-print"></i>
                </button>
                
            </div>
            <div class="bg-gray-500/40 absolute top-0 left-0 w-full h-full hidden" name="bgModalFilterType" id="bgModalFilterType">
                <div class="bg-white absolute left-0 top-0 w-[50%] h-[18%] ml-[25%] mt-[15%] hidden rounded-md shadow-md" name="contentModalFilterType" id="contentModalFilterType">
                    <div class="flex p-2 border-b-2">
                        <div class="w-[96%] font-semibold text-xl">
                            <h2 class="">Filter By Type Produk</h2>
                        </div>
                        <div class="font-semibold text-xl cursor-pointer" name="closeModalSecondTransaksiBulan" id="closebgModalTransaksiSecondBulan">
                            X
                        </div>
                    </div>
        
                    {{-- Form Filter Cetak --}}
                    <form action="/cetakPdf/{{ 'Produk-Filter' }}" target="_blank"  class="mx-auto w-full grid grid-cols-2 gap-5 px-2 mt-3">
                
                        <select name="dataFilter" id="dataFilter" class="border mb-1 shadow-md text-sm h-[100%] px-5 py-1">
                            <option value="">-- Filter --</option>
                            <option value="stempel">Stempel</option>
                            <option value="undangan">Undangan</option>
                            <option value="banner">Banner</option>
                            <option value="xbanner">XBanner</option>
                            <option value="Lanyard">Lanyard</option>
                            <option value="IdCard">IdCard</option>
                             
                        </select>
                        <button type="submit" class="bg-blue-400 px-4 py-1 font-semibold rounded-md shadow-md text-white">
                            CETAK
                            <i class="fa-solid fa-print"></i>
                        </button>
                    </form>
        
                </div>
            </div>
        
            <table id="tabelDataProduk" class="border w-full h-full mx-auto table">
                <thead>
                    <tr class="text-center border-b bg-blue-500">
                        <th class="py-2">No</th>
                        <th class="py-2">Id Produk</th>
                        <th class="py-2">Nama Produk</th>
                        <th class="py-2">Jumlah Produk</th>
                        <th class="py-2">Harga Produk</th>
                        <th class="py-2">Tanggal Masuk</th>
                    </tr>
                </thead>
                <tbody class="text-center py-2">

                </tbody>
                
            </table>
            
        </div>
    </div>


</div>
{{-- Modal Table Produk --}}

 
{{-- Script --}}
    <script>
        function formatDate(inputDate) {
            var date = new Date(inputDate);
            var day = date.getDate();
            var month = date.getMonth() + 1; // Bulan dimulai dari 0, jadi tambahkan 1
            var year = date.getFullYear();

            // Format tanggal dan bulan agar selalu dua digit
            if (day < 10) {
                day = '0' + day;
            }
            if (month < 10) {
                month = '0' + month;
            }

            return day + '-' + month + '-' + year;
        }
    </script>

    <script>
        // Modal User
        var DataAll = [];
        var AllDataUser = [];

        $('#menuDataUser').on('click', function() {
            $('#bgModalTableUser').removeClass('hidden');
            $('#closeModalUser').removeClass('hidden');
            console.log("Modal Tabel User"); 
            $data = "DataUser";
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'Status': $data
                },
                url: '/getAllData',
                success: function(response){
                    console.log("Data Hasil Filter = ", response.DataAll);
                    console.log("Count Data Hasil Filter = ", response.CountDataAll);
                    for (let i = 0; i < response.CountDataAll; i++) {
                        DataAll.push(response.DataAll);
                    }

                    if (Array.isArray(response.DataAll)) {
                        AllDataUser = response.DataAll;
                    }

                    $.each(AllDataUser, function(index, item) {        
                        var row = $('<tr>');
                        row.append($('<td>').text(index+1));
                            row.append($('<td>').text(item.idUser));
                            row.append($('<td>').text(item.namaUser));
                            row.append($('<td>').text(item.status));
                            row.append($('<td>').text(item.email));
                            row.append($('<td>').text(formatDate(item.created_at)));
                     
                        $('#tabelDataUser tbody').append(row);
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                    console.log(thrownError);
                }
            })

            $('#closeModalUser').on('click', function() {
                AllDataUser = [];
                $('#tabelDataUser tbody').empty();

                $('#closeModalUser').addClass('hidden');
                $('#bgModalTableUser').addClass('hidden');
                
            });    
        });

        $('#closeModalSecond').on('click', function() {
            $('#bgModalUserSecondTahun').addClass('hidden');
        });

        $('#closeModalSecondBulan').on('click', function() {
            $('#bgModalUserBulan').addClass('hidden');
        });

        $('#closeModalSecondTanggal').on('click', function() {
            $('#bgModalUserTanggal').addClass('hidden');
        });

        // Transaksi
        $('#menuDataTransaksi').on('click', function() {
            $('#bgModalTableTransaksi').removeClass('hidden');
            $('#closeModalTransaksi').removeClass('hidden');

            $data = "DataTransaksi";
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'Status': $data
                },
                url: '/getAllData',
                success: function(response){
                    // console.log("Data Hasil Filter = ", response.DataAll);
                    // console.log("Count Data Hasil Filter = ", response.CountDataAll);
                    for (let i = 0; i < response.CountDataAll; i++) {
                        DataAll.push(response.DataAll);
                    }
                        console.log(response);
                    if (Array.isArray(response.DataAll)) {
                        AllDataUser = response.DataAll; 
                    } 

                    $.each(AllDataUser, function(index, item) {        
                        var row = $('<tr>');
                        row.append($('<td>').text(index+1));
                            row.append($('<td>').text(item.idTransaksi));
                            row.append($('<td>').text(item.get_user['namaUser']));
                            row.append($('<td>').text(item.jumlahProduk));
                            // row.append($('<td>').text(item.totalHarga));
                            row.append($('<td>').text(item.totalHarga.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' })).addClass('text-left'));
                            row.append($('<td>').text(item.statusTransaksi));
                            row.append($('<td>').text(formatDate(item.created_at)));
                     
                        $('#tabelDataTransaksi tbody').append(row);
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                    console.log(thrownError);
                }
            })

            $('#closeModalTransaksi').on('click', function() {

                DataAll = [];
                AllDataUser = [];

                $('#tabelDataTransaksi tbody').empty();

                $('#closeModalTransaksi').addClass('hidden');
                $('#bgModalTableTransaksi').addClass('hidden');
            });    
        });

        $('#closeModalSecondTransaksi').on('click', function() {
            $('#bgModalTransaksiSecondTahun').addClass('hidden');
        });

        $('#closeModalSecondTransaksiBulan').on('click', function() {
            $('#bgModalTransaksiSecondBulan').addClass('hidden');
        });

        $('#closeModalSecondTransaksiTanggal').on('click', function() {
            $('#bgModalTransaksiTanggal').addClass('hidden');
        });

        // Produk
        $('#menuDataProduk').on('click', function() {
            $('#bgModalTableProduk').removeClass('hidden');
            $('#closeModalProduk').removeClass('hidden');
            
            $data = "DataProduk";
            $.ajax({
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    'Status': $data
                },
                url: '/getAllData',
                success: function(response){
                    console.log("Data Hasil Filter = ", response.DataAll);
                    console.log("Count Data Hasil Filter = ", response.CountDataAll);
                    for (let i = 0; i < response.CountDataAll; i++) {
                        DataAll.push(response.DataAll);
                    }
                        console.log(response);
                    if (Array.isArray(response.DataAll)) {
                        AllDataUser = response.DataAll; 
                    } 

                   
                    $.each(AllDataUser, function(index, item) {

                        var row = $('<tr class="text-center">');
                        row.append($('<td>').text(index+1));
                            row.append($('<td>').text(item.idProduk));
                            row.append($('<td>').text(item.namaProduk));
                            row.append($('<td>').text(item.jumlahProduk));
                            row.append($('<td>').text(item.hargaProduk.toLocaleString('id-ID', { style: 'currency', currency: 'IDR' })).addClass('text-left'));
                            row.append($('<td>').text(formatDate(item.created_at)));
                     
                        $('#tabelDataProduk tbody').append(row);
                    });
                    console.log("All Data = ",AllDataUser);
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                    console.log(thrownError);
                }
            })

            $('#closeModalProduk').on('click', function() {
                DataAll = [];
                AllDataUser = [];

                $('#tabelDataProduk tbody').empty();

                $('#closeModalProduk').addClass('hidden');
                $('#bgModalTableProduk').addClass('hidden');
            });    
        });

        $('#closeModalSecondProduk').on('click', function() {
            $('#bgModalProdukSecondTahun').addClass('hidden');
        });

        $('#closeModalSecondBulanProduk').on('click', function() {
            $('#bgModalProdukBulan').addClass('hidden');
        });

        $('#closeModalSecondTanggalProduk').on('click', function() {
            $('#bgModalProdukTanggal').addClass('hidden');
        });
        $('#closeModalFilterType').on('click', function() {
            $('#bgModalFilterType').addClass('hidden');
            $('#contentModalFilterType').addClass('hidden');
        });
        
        // Periode Tahun
        function periodeCetak(e){
            if(e == 'Tahun'){
                $('#bgModalUserSecondTahun').removeClass('hidden'); 
                $('#contentModalUserSecond').removeClass('hidden');

                console.log("Data Table User Tahun");
            }else if (e == 'Bulan'){
                $('#bgModalUserBulan').removeClass('hidden');
                $('#contentModalUserBulan').removeClass('hidden');
                
                console.log("Periode Table User Bulan");

                $('#btnCetakBulan').on('click', function() {

                    $dataTahun1 = $('#dataTahun1').val();
                    $dataBulan1 = $('#dataBulan1').val();

                    console.log("Cetak Data Tahun =", $dataTahun1 ,"&","Bulan = ", $dataBulan1);
                    
                });

            }else if (e == 'Tanggal'){
                $('#bgModalUserTanggal').removeClass('hidden');
                $('#contentModalUserTanggal').removeClass('hidden');
                
                console.log("Periode Table User Tanggal");

                // $('#btnCetakTglUser').on('click', function() {
                //     console.log("Cetak Per Tanggal Data User");

                //     $dataFromUser = $('#filterDateFromUser').val();
                //     $dataToUser = $('#filterDateToUser').val();

                //     console.log("Date From =", $dataFromUser ,"Date To = ", $dataToUser);

                //     $.ajax({
                //         type: 'POST',
                //         headers: {
                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //         },
                //         data: {
                //             'Status': 'Tanggal',
                //             'DataFrom': $dataFromUser,
                //             'DataTo': $dataToUser
                //         },
                //         url: 'getFilterDataUser',
                        
                //         success: function(response){
                            
                //             console.log("Hasil Data Filter PerTanggal = ", response.DataPerTanggal);

                //             console.log("Jumlah Data Pertanggal = ", response.countPerTanggal);

                //         },

                //         error: function (xhr, ajaxOptions, thrownError) {
                //             console.log(xhr.responseText);
                //             console.log(thrownError);
                //         }
                //     })

                // });

            }
        }

        
        // Modal Transaksi
        function periodeCetakTransaksi(e){

            if(e == 'Tahun'){
                $('#bgModalTransaksiSecondTahun').removeClass('hidden');
                $('#contentModalTransaksiSecond').removeClass('hidden');

                console.log("Periode Tahun");

                
            }else if (e == 'Bulan'){
                $('#bgModalTransaksiSecondBulan').removeClass('hidden');
                $('#contentModalTransaksiBulan').removeClass('hidden');
                console.log("Periode Bulan");
            }else if (e == 'Tanggal'){
                $('#bgModalTransaksiTanggal').removeClass('hidden');
                $('#contentModalTransaksiTanggal').removeClass('hidden');
                console.log("Periode Tanggal");
            }else if(e == 'FilterProduk'){
                $('#bgModalFilterType').removeClass('hidden');
                $('#contentModalFilterType').removeClass('hidden');
                console.log("Filter Type Active");
            }

        }

    </script>
{{-- Script --}}