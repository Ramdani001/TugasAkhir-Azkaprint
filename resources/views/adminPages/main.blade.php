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
    
        .swiper-slide:nth-child(1) {
          /* background-color: rgb(206, 17, 17); */
          background-image: url('{{ "img/stempel.jpg" }}')
        }
    
        .swiper-slide:nth-child(2) {
          background-color: rgb(0, 140, 255);
        }
    
        .swiper-slide:nth-child(3) {
          background-color: rgb(10, 184, 111);
        }
    
        .swiper-slide:nth-child(4) {
          background-color: rgb(211, 122, 7);
        }
    
        .swiper-slide:nth-child(5) {
          background-color: rgb(118, 163, 12);
        }
    
        .swiper-slide:nth-child(6) {
          background-color: rgb(180, 10, 47);
        }
    
        .swiper-slide:nth-child(7) {
          background-color: rgb(35, 99, 19);
        }
    
        .swiper-slide:nth-child(8) {
          background-color: rgb(0, 68, 255);
        }
    
        .swiper-slide:nth-child(9) {
          background-color: rgb(218, 12, 218);
        }
    
        .swiper-slide:nth-child(10) {
          background-color: rgb(54, 94, 77);
        }
    </style>
    {{-- Swiper Style --}}

</head>
<body class="bg-slate-200">
    @include('sweetalert::alert')
    
    <div class="flex flex-rows-2 w-full h-full border-3 border-red-500">
        <div class="">
            @include('adminPages/partials/Sidebar')
        </div>
        <div class="w-full">
            @include('adminPages/partials/Topside')
            <div>
                <div id="contentAdmin">

                </div>
                
            </div>
        </div>
    </div>
 
    {{-- Jquery --}}
    <script src="{{ 'style/jquery.js' }}"></script>
    <script src="{{ 'style/jquery.min.js' }}"></script>

    {{-- Fontawesome --}}
    <script src="{{ 'fontawesome/js/all.js' }}"></script>

    {{-- SweetAlert --}}
    <script src="{{ 'vendor/sweetalert/sweetalert.all.js' }}"></script>
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
        }
    ?>
    

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

</body>
</html>