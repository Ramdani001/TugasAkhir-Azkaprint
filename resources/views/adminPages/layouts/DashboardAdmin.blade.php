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
                    <div class="w-[800px]">
                        <canvas id="myChart"></canvas>
                      </div>
                    {{-- <canvas id="myChart" width="100%" class=" h-60 rounded-md"></canvas> --}}
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

    <script src="{{ 'style/chart.js' }}"></script>
    {{-- <script src="{{'path/to/chartjs/dist/chart.umd.js'}}"></script> --}}
    <script>
        document.addEventListener("DOMContentLoaded", function () {
          var ctx = document.getElementById('myChart').getContext('2d');
          var labels = ['HJanuari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
          var data = [12, 19, 3, 123, 2, 3, 200, 120, 430, 10, 23, 11];
          
          // Menyiapkan array warna yang akan digunakan untuk setiap bar
          var backgroundColors = [
            'rgba(255, 99, 132, 0.7)',
            'rgba(54, 162, 235, 0.7)',
            'rgba(255, 206, 86, 0.7)',
            'rgba(75, 192, 192, 0.7)',
            'rgba(153, 102, 255, 0.7)',
            'rgba(255, 159, 64, 0.7)',
            'rgba(255, 99, 132, 0.7)',
            'rgba(54, 162, 235, 0.7)',
            'rgba(255, 206, 86, 0.7)',
            'rgba(75, 192, 192, 0.7)',
            'rgba(153, 102, 255, 0.7)',
            'rgba(255, 159, 64, 0.7)'
          ];
          
          // Menyiapkan array untuk menyimpan objek dataset
          var datasets = [{
            label: 'Januari',
            data: data,
            backgroundColor: backgroundColors,
            borderWidth: 1
          }];
    
          new Chart(ctx, {
            type: 'bar',
            data: {
              labels: labels,
              datasets: datasets,
            },
            options: {
              responsive: true,
              scales: {
                y: {
                  beginAtZero: true
                }
              }
            }
          });
        });
      </script>
       

@endsection 