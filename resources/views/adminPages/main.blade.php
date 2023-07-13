<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Admin</title>

    <link rel="icon" href="{{ 'img/logo_AzkaPrint.png' }}">

    {{-- Tailwindcss --}}
    @vite('resources/css/app.css')

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ 'fontawesome/css/all.css' }}">

</head>
<body class="bg-slate-200">
   
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

    <script>
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
            let route = $(this).attr('value');
            // var $path = path(route);

            console.log(route);

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

     {{-- Modal Tambah User --}}
     <script>
        
        function modal(e){
            if(e == 'Tambah'){
                console.log("Value : " + e);
                
                // Show Modal
                $('#bgModal').removeClass('hidden');
                $('#modalTambahUser').removeClass('hidden');

            }else if(e == 'Edit'){
                console.log("Value : " + e);

                // Show Modal
                $('#bgModalEdit').removeClass('hidden');
                $('#modalEditUser').removeClass('hidden');

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
     </script>

</body>
</html>