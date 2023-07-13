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

<style>
    .swiper {
      width: 340px;
      height: 420px;
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

</head>
<body class="bg-slate-200">
    @include('userPages/partials/navbar')

    {{-- Body Content --}}
    @yield('content')
    {{-- End Body Content --}}

    {{-- Footer --}}
    @include('userPages/partials/footerSection')

    {{-- Jquery --}}
    <script src="{{ 'style/jquery.js' }}"></script>
    <script src="{{ 'style/jquery.min.js' }}"></script>

    {{-- Script Change Color Scrolling Navbar --}}
    @if ($path = request()->path() !== "allProduk")
      <script>
        $(document).ready(function(){  
            $(window).scroll(function(){
                var scroll = $(window).scrollTop();
                if (scroll > 300) {
                    $(".navbar").addClass('bg-blue-800 ', 'opacity-50').removeClass('bg-Transparent', 'opacity-10');
                    $(".btnLogin").removeClass('bg-blue-800').addClass('bg-yellow-400', 'shadow-md');
                }
                else if(scroll < 300){
                    $(".navbar").removeClass('bg-blue-800');;
                    $(".navbar").addClass('bg-Transparent');

                    $(".btnLogin").removeClass('bg-yellow-400').addClass('bg-blue-800', 'text-white');
                }
            })
        })
      </script>   
      @elseif($path = request()->path() === "allProduk")
      <script>
        $(document).ready(function(){  
            $(".navbar").addClass('bg-blue-800 ', 'opacity-50').removeClass('bg-Transparent', 'opacity-10');
            $(".btnLogin").removeClass('bg-blue-800').addClass('bg-yellow-400', 'shadow-md');
        })
      </script>   
          
    @endif
    
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

      {{-- SPA AllProduk --}}
      <script>
        $(document).ready(function() {
          const link = $('.spa-route'),
                content = $('#contentProduk');

          link.on('click', function(e) {
            e.preventDefault()
            let route = $(this).attr('value');
            // console.log(route);

            $.get(route, function(data) {
              content.html(data);
            });
          });
        })

        // Smooth Scroll
        $(function() {
          $('a[href*=\\#]:not([href=\\#])').on('click', function() {
              var target = $(this.hash);
              target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
              if (target.length) {
                  $('html,body').animate({
                      scrollTop: target.offset().top
                  }, 1500);
                  return false;
              }
          });
      });
      </script>

</body>
</html>