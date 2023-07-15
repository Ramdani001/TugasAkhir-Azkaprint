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
        }
    ?>
    
    <script>

    $(document).on('click', '.btnEdituser', function(){
        console.log("Berhasil Edit");
        // console.log(id);
        var id = $(this).val();
        console.log(id);
        const content = $('#contentAdmin');
            $.ajax({ 
                type: "POST",
                url: "/updateDataUser",
                success: function(response){
                    localStorage.setItem("Value Route", id);
                    let route = localStorage.getItem("Value Route");

                    $.get(route, function(data) {
                        content.html(data);
                    });

                // let route = localStorage.getItem("Value Route");
                console.log("Value Route", id);
                // console.log(response.Message);
                }
            })
    });


    $(document).on('click', '.tmbhUser', function() {
        var id = $(this).val();

        // console.log(id);
        const content = $('#contentAdmin');
            $.ajax({ 
                type: "POST",
                url: "/createUser1",
                data: { 
                    idUsers: $('#idUser').val(), 
                    namaUsers: $('#namaUser').val(),
                    username: $('#username').val(),
                    password: $('#password').val(),
                    profile: $('#profile').val(),
                    status: $('#status').val(),
                    email: $('#email').val(),
                    _token: $('meta[name="csrf-token"]').attr('content') 
                },
                success: function(response){
                    localStorage.setItem("Value Route", id);
                    let route = localStorage.getItem("Value Route");

                    $.get(route, function(data) {
                        content.html(data);
                    });
                    
                // let route = localStorage.getItem("Value Route");
                console.log("Value Route", id);
                console.log(response);
                }
            })
            
        })

        function dropdownProduk(){
         $dropdown = document.getElementById("dropdown-produk");
         $dropdown.classList.toggle("hidden");
         $dropdown.classList.toggle("block");
        }

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

     {{-- Modal Dialog --}}
     <script>
        // Modal Dialog User
        function modal(e, b){
            
            if(e == 'Tambah'){
                console.log("Value : " + e);
                
                // Show Modal
                $('#bgModal').removeClass('hidden');
                $('#modalTambahUser').removeClass('hidden');

            }else if(e == 'Edit'){
                console.log("Value : " + e + b);

                // Show Modal 
                $('#bgModalEdit').removeClass('hidden');
                $('#modalEditUser').removeClass('hidden');

                $.ajax({  
                    type: "GET",
                    url: "/editDataUser/"+b,
                    success: function(response){
                        console.log("Response")
                        console.log(response.DataUser);

                        $('#idModalUser').val(response.DataUser.id);
                        $('#profileUserModal').val(response.DataUser.profile);
                        $('#idUserModal').val(response.DataUser.idUser);
                        $('#namaUserModal').val(response.DataUser.namaUser);
                        $('#passwordUserModal').val(response.DataUser.password);
                        $('#usernameModal').val(response.DataUser.username);
                        $('#statusModal').val(response.DataUser.status);
                        $('#emailModal').val(response.DataUser.email);

                    }
                })

            }else if(e == 'Close'){
                    console.log("Close Modal");
                    $('#bgModal').addClass('hidden');
                    $('#modalTambahUser').addClass('hidden');
            }else if(e == 'CloseEdit'){
                $('#bgModalEdit').addClass('hidden');
                $('#modalEditUser').addClass('hidden');
            }else if(e == "Hapus"){
                console.log("Value : " + e);

                const id = $('.btnHapus').val();

                // Show Modal
                $('#idUser1').val(" Id User = "+ id);
                $('#bgModalHapus').removeClass('hidden');
                $('#modalHapusUser').removeClass('hidden');
            }else if(e == 'CloseHapus'){
                $('#bgModalHapus').addClass('hidden');
                $('#modalHapusUser').addClass('hidden');
            }
        }

        // Modal Dialog Produk
        function modalProduk(e){
            if(e == 'Tambah'){
                console.log("Value : " + e);
                
                // Show Modal
                $('#bgModalProduk').removeClass('hidden');
                $('#modalTambahProduk').removeClass('hidden');

            }else if(e == 'Edit'){
                console.log("Value : " + e);

                // Show Modal
                $('#bgModalEdit').removeClass('hidden');
                $('#modalEditProduk').removeClass('hidden');

            }else if(e == 'Close'){
                    console.log("Close Modal");
                    $('#bgModalProduk').addClass('hidden');
                    $('#modalTambahProduk').addClass('hidden');

            }else if(e == 'CloseEdit'){
                $('#bgModalEdit').addClass('hidden');
                $('#modalEditProduk').addClass('hidden');
            }else if(e == "Hapus"){
                console.log("Value : " + e);

                const id = $('.btnHapus').val();

                // Show Modal
                $('#idProduk1').val(" Id User = "+ id);
                $('#bgModalHapus').removeClass('hidden');
                $('#modalHapusProduk').removeClass('hidden');
                
            }else if(e == 'CloseHapus'){
                $('#bgModalHapus').addClass('hidden');
                $('#modalHapusProduk').addClass('hidden');
            }
        }

        // Modal Dialog Barang 
        function modalBarang(e){
            if(e == 'Tambah'){
                console.log("Value : " + e);
                
                // Show Modal
                $('#bgModalBarang').removeClass('hidden');
                $('#modalTambahBarang').removeClass('hidden');

            }else if(e == 'Edit'){
                console.log("Value : " + e);

                // Show Modal
                $('#bgModalEdit').removeClass('hidden');
                $('#modalEditBarang').removeClass('hidden');

            }else if(e == 'Close'){
                    console.log("Close Modal");
                    $('#bgModalBarang').addClass('hidden');
                    $('#modalTambahBarang').addClass('hidden');

            }else if(e == 'CloseEdit'){
                $('#bgModalEdit').addClass('hidden');
                $('#modalEditBarang').addClass('hidden');
            }else if(e == "Hapus"){
                console.log("Value : " + e);

                const id = $('.btnHapus').val();

                // Show Modal
                $('#idBarang1').val(" Id User = "+ id);
                $('#bgModalHapus').removeClass('hidden');
                $('#modalHapusBarang').removeClass('hidden');
                
            }else if(e == 'CloseHapus'){
                $('#bgModalHapus').addClass('hidden');
                $('#modalHapusBarang').addClass('hidden');
            }
        }
     </script>

        {{-- Swiper --}}
         <script src="{{ 'style/swiper.js' }}"></script>

        <script>
            var swiper = new Swiper(".mySwiper", {
                effect: "cards",
                grabCursor: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
            });
        </script>

</body>
</html>