<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AZKAPRINT</title>

    <link rel="icon" href="{{ 'img/logo_AzkaPrint.png' }}">

    <link rel="stylesheet" href="{{ 'style/swiper.css' }}" />

    {{-- Tailwindcss --}}  
    @vite('resources/css/app.css')

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ 'fontawesome/css/all.css' }}">

</head>
<body class=""> 

 
    <div class="grid grid-cols-7 gap-2">
        <div class="col-span-1">
            @include('userPages/profilePages/sidebar')
        </div>
        <div class="col-span-6">
            <div id="contentAdmin">

            </div>
            {{-- @yield('content') --}}
        </div>
    </div> 
    
    {{-- Jquery --}}
    <script src="{{ 'style/jquery.js' }}"></script>
    <script src="{{ 'style/jquery.min.js' }}"></script>


    <script>
        // SPA SideBar Admin
        $(document).ready(function() {
                const link = $('.spa-admin'),
                content = $('#contentAdmin');

                link.on('click', function(e) {
                    e.preventDefault()
                    
                    let route = $(this).attr('value');
                     
                    console.log(route);

                    $.get(route, function(data) {
                        content.html(data);
                    });
            });
        })
    </script>

</body>
</html>