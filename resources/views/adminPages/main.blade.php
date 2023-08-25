<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Admin</title>

    <link rel="icon" href="{{ 'img/logo_AzkaPrint.png' }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Tailwindcss --}} 
    @vite('resources/css/app.css') 

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ 'fontawesome/css/all.css' }}">

    {{-- Swiper --}}
    <link rel="stylesheet" href="{{ 'style/swiper.css' }}" />

    {{-- Loading --}}
    <link rel="stylesheet" href="{{ 'style/loading/loader.css' }}">
 
    {{-- Swiper Style --}}
    <style>
        .swiper {
            position: absolute;
            margin-top: -80px;
            box-shadow: 2px 2px rgba(0, 0, 0, 0.452);
            width: 240px;
            height: 320px;
        }
    
        .swiper-slide {
          display: flex;
          align-items: center;
          justify-content: center;
          border-radius: 18px;
          font-size: 22px;
          font-weight: bold;
          color: #fff;
        }
    </style>
    {{-- Swiper Style --}}

</head>
<body class="bg-slate-200">
    {{-- Auth Admin --}}
    
    {{-- Loading --}}
    <div class="loading bg-blue-400/50 w-full h-screen z-50 absolute text-center hidden" id="loading">
        <div class="h-full w-full font-serif text-5xl text-white pt-[20%] font-semibold">
            <h1 class="text-white typeWriter bg-gray-400/40x">
                Azkaprint . . .
            </h1>
        </div>
    </div>
    {{-- Loading --}}

    <div class="flex flex-rows-2 w-full h-full border-3 border-red-500">
        <div class=""> 
            @include('adminPages/partials/Sidebar')
        </div>
        
        <div class="w-full">
            @include('adminPages/partials/Topside') 
            <div>
                <div id="contentAdmin">
                    @if (Auth::user()->status === 'Manager')
                        @yield('contentManager');
                        {{-- <div id="contentManager">
                        </div> --}}
                    @endif

                </div>
                
            </div>
        </div>
    </div>

    {{-- Jquery --}}
    <script src="{{ 'style/jquery.js' }}"></script>
    <script src="{{ 'style/jquery.min.js' }}"></script>

    {{-- Fontawesome --}}
    <script src="{{ 'fontawesome/js/all.js' }}"></script>

    {{-- Loading --}}
    <script src="{{ 'style/loading/loader.js' }}"></script>

    {{-- SweetAlert --}}
    <script src="{{ 'vendor/sweetalert/sweetalert.all.js' }}"></script>
    @if (Auth::user()->status === 'Admin')
        <script>
                    
            const content = $('#contentAdmin');
            let route = "transaksiAdmin";
            $.get(route, function(data) {
                content.html(data);
            });
        </script>   
    @endif
    {{-- Auth Admin --}}

    <?php
        if($message = Session()->has('Success User')){
            // alert()->success(Session::get('Success'));
            alert()->question('Title','Lorem Lorem Lorem');
            echo '<script>
                alert("'.Session::get('Success User').'")
                    console.log('.$message.');
                </script>'
            ?>
            <script>
                
                const content = $('#contentAdmin');
                let route = localStorage.getItem("Value Route");
                $.get(route, function(data) {
                    content.html(data);
                });
            </script>
    <?php 
        }elseif ($message = Session()->has('Success Produk')) {
           // alert()->success(Session::get('Success'));
           alert()->question('Title','Lorem Lorem Lorem');
            echo '<script>
                alert("'.Session::get('Success Produk').'")
                    console.log('.$message.');
                </script>'
    ?>
         <script>
                
            const content = $('#contentAdmin');
            let route = localStorage.getItem("Value Route");
            $.get(route, function(data) {
                content.html(data);
            });
        </script>
    <?php 
        }elseif ($message = Session()->has('Success Update Produk')) {
           // alert()->success(Session::get('Success'));
           alert()->question('Title','Lorem Lorem Lorem');
            echo '<script>
                alert("'.Session::get('Success Update Produk').'")
                    console.log('.$message.');
                </script>'
    ?>
         <script>
                
            const content = $('#contentAdmin');
            let route = localStorage.getItem("Value Route");
            $.get(route, function(data) {
                content.html(data);
            });
        </script>
    <?php 
        }elseif ($message = Session()->has('Success Barang')) {
           // alert()->success(Session::get('Success'));
           alert()->question('Title','Lorem Lorem Lorem');
            echo '<script>
                alert("'.Session::get('Success Barang').'")
                    console.log('.$message.');
                </script>'
    ?>
         <script>
                
            const content = $('#contentAdmin');
            let route = localStorage.getItem("Value Route");
            $.get(route, function(data) {
                content.html(data);
            });
        </script>
    <?php 
        }elseif ($message = Session()->has('Success Update Barang')) {
           // alert()->success(Session::get('Success'));
           alert()->question('Title','Lorem Lorem Lorem');
            echo '<script>
                alert("'.Session::get('Success Update Barang').'")
                    console.log('.$message.');
                </script>'
    ?>
         <script>
                
            const content = $('#contentAdmin');
            let route = localStorage.getItem("Value Route");
            $.get(route, function(data) {
                content.html(data);
            });
        </script>
    <?php 
        }elseif ($message = Session()->has('Success Update Barang')) {
           // alert()->success(Session::get('Success'));
           alert()->question('Title','Lorem Lorem Lorem');
            echo '<script>
                alert("'.Session::get('Success Update Barang').'")
                    console.log('.$message.');
                </script>'
    ?>
         <script>
                
            const content = $('#contentAdmin');
            let route = localStorage.getItem("Value Route");
            $.get(route, function(data) {
                content.html(data);
            });
        </script>
    <?php 
        }elseif ($message = Session()->has('Succes Kirim Email')) {
           // alert()->success(Session::get('Success'));
           alert()->question('Title','Lorem Lorem Lorem');
            echo '<script>
                alert("'.Session::get('Succes Kirim Email').'")
                    console.log('.$message.');
                </script>'
    ?>
         <script>
                
            const content = $('#contentAdmin');
            let route = localStorage.getItem("Value Route");
            $.get(route, function(data) {
                content.html(data);
            });
        </script>
    <?php 
        }elseif($message = Session()->has('Success Hapus')) {
            alert()->question('Title','Lorem Lorem Lorem');
            echo '<script>
                alert("'.Session::get('Success Hapus').'")
                    console.log('.$message.');
                </script>'
    ?>
    <script>
        const content = $('#contentAdmin');
        let route = "transaksiAdmin";
        $.get(route, function(data) {
            content.html(data);
        });
    </script>

    <?php } ?>
    

    <script>
        // SPA SideBar Admin
        $(document).ready(function() {
                const link = $('.spa-admin'),
                content = $('#contentAdmin');

                link.on('click', function(e) {
                    e.preventDefault()
                    // let route = $(this).attr('value');
                    let route = $(this).attr('value');
                    // var $path = path(route);

                    $.get(route, function(data) {
                    content.html(data);
                     
                    if(route === 'dataUser'){
                        $('.side1').removeClass('hidden');
                        $('.side').addClass('hidden');
                        $('.dashboard1').removeClass('hidden');
                        $('.dashboard').addClass('hidden');
                        $('.sideData').addClass('pt-2').removeClass('pt-10');
                        $('.dropdown').addClass('mt-10');
                    }else if(route == 'dataProduk'){
                        
                    }
                });
            });
        })
    </script>

    {{-- Script User --}}
    <script src="{{ 'style/swiper.js' }}"></script>
    <script src="{{ 'style/scriptUser.js' }}"></script>

    {{-- Script Produk --}}
    <script src="{{ 'style/scriptProduk.js' }}"></script>

    {{-- Script Barang --}}
    <script src="{{ 'style/scriptBarang.js' }}"></script>

    {{-- Landing Page --}}
    {{-- Hero & Navbar Section --}}
    <script src="{{ 'style/scriptHeroSection.js' }}"></script>

   <?php
       if(Auth::user()->status === 'Manager'){
    ?>
         {{-- Chart Js --}}
            <script>
                // var dataGrafik;

                var dataChart = [];
                var labelGrafik = [];
                var labelChart = [];
                var ctx = document.getElementById('myChart').getContext('2d');
                var chart;

                async function getGrafik(){
                    var dataGrafik = 0;
                    const result = $.ajax({
                        type: "GET",
                        url: "/getGrafik",
                    
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.log(xhr.responseText);
                            console.log(thrownError);
                        }
                        
                    })
                    // console.log(result);
                    return result; 
                }

                document.addEventListener("DOMContentLoaded", async function () {
                    
                    var penjualan = [];
                    var dataGrafik = await getGrafik();

                    for ($i = 0; $i < dataGrafik.dataBaru; $i++) {
                        dataChart.push(dataGrafik.penjualan[$i]['totalHarga']);
                    }

                    for($i = 0; $i < dataGrafik.jmlhChart; $i++){
                        labelGrafik.push(dataGrafik.filterDate[$i]);
                    }
                    
                    var labels = labelGrafik;
                    var data = dataChart;
                    // console.log("Get Grafik", dataGrafik);
                    
                    // Menyiapkan array warna yang akan digunakan untuk setiap bar
                    var backgroundColors = [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(255, 159, 64, 0.7)'
                    ];
                    
                    // Menyiapkan array untuk menyimpan objek dataset
                    var datasets = [{
                    //   label: [labels,],
                    data: data,
                    backgroundColor: backgroundColors,
                    borderWidth: 1
                    }];
            
                    chart = new Chart(ctx, {
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
                        },
                        plugins: {
                            legend:{
                                display: false
                            }
                        },
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItem){
                                    return tooltipItem.yLabel;
                                }
                            }
                        }
                    }
                    });
        
                });
                
            </script>
            {{-- Chart Js --}}
       <?php }?>
   


</body>
</html>