@extends('adminPages.main')

@section('contentAdmin')
    <div class="ml-[13%] mt-4 mx-3">
        <div class="">
            <h1 class="text-2xl font-semibold font-sans">Welcome To Dashboard</h1>
            <h5 class="italic text-sm font-serif text-slate-400">Home/ Project Dashboard</h5>
        </div>
        <div class="flex mt-3">
            <div class="bg-[url('../../public/img/bgTitleAdmin.jpg')] w-full rounded-md h-32 bg-cover shadow-md">
                 <img src="{{ 'img/ilustrasi3.png' }}" alt="ilustrasi" class="absolute w-44 -mt-7 ml-5">
                 <div class="ml-52 mt-5 text-white">
                    <h1 class="text-2xl font-semibold">Rizkan Ramdani</h1>
                    <p class="italic text-sm text-slate-300">
                        Hadapilah Dengan Senyuman, <br> Semuanya Akan Baik Pada Waktu Yang Tepat . . .
                    </p>
                 </div>
                 <div class="bg-white w-full mt-12 h-80 rounded-md shadow-md p-4">
                    <h1 class="text-md font-semibold font-sans">
                        Penjualan
                    </h1>
                    <p class="italic text-sm text-slate-400 mb-1">
                        Grafik untuk menampilkan penjualan setiap bulannya . . .
                    </p>
                    {{-- Chart Js --}}
                    <div class="w-full h-60 bg-red-500 rounded-md">

                    </div>
                 </div>
            </div>
            <div class="grid grid-col-2">
                <div class="bg-white w-80 ml-5 rounded-md h-80 shadow-md p-3">
                    <h1 class="text-md font-serif font-semibold ">Pesanan</h1>
                    <hr class="w-8 mb-3">
                    <?php
                        for($i=0; $i < 3; $i++){
                    ?>
                    <div class="flex rounded-md w-full h-16 shadow-md p-2 border mb-2">
                        <div class="bg-gray-400 rounded-full w-10 h-10">

                        </div>
                        <div class="ml-3">
                            <h1 class="text-md font-semibold">Rizkan</h1>
                            <p class="text-xs text-slate-400">
                                Pesanan : <span class=" italic">1 Produk</span>
                            </p>
                        </div>
                        <div class="text-xs italic self-start ml-14 text-slate-400">
                            <h5>07/13/2023</h5>
                        </div>
                    </div>
                    <?php } ?>

                </div>
                <div class="bg-white mt-3 w-80 ml-5 rounded-md h-32 shadow-md p-3">
                    <h1 class="text-sm font-semibold">Penjualan Hari Ini</h1>
                    <hr class="w-10 mb-3">
                    <h2 class="text-2xl font-semibold">123 Produk</h2>
                    <span class="text-xs text-slate-400">13/07/2023</span>
                </div>
            </div>
        </div>
    </div>
@endsection 