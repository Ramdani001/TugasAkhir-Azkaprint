<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Azkaprint</title>

    <link rel="icon" href="{{ 'img/logo_AzkaPrint.png' }}">

    {{-- Tailwindcss --}}
    @vite('resources/css/app.css')

    {{-- Fontawesome --}}
    <link rel="stylesheet" href="{{ 'fontawesome/css/all.css' }}">

    {{-- Swiper --}}
    <link rel="stylesheet" href="{{ 'style/swiper.css' }}" />

</head>
<body>

    <div class="bg-slate-300 w-full h-screen pt-10">
        <div class="bg-white w-[900px] h-[550px] mx-auto rounded-md shadow-lg p-3 grid grid-cols-2 gap-2">
            <div class=" w-full h-[90%]">
                {{-- Login --}}
                @include('validate/login/login')
            </div>
            <div class="w-full h-[90%]"> 
                {{-- Register --}}
                @include('validate/register/register')
            </div>
            <button class="transition-all duration-700 ease-linear bg-blue-900 px-8 py-1 absolute z-50 ml-[377px] mt-1 btnChangeRegister text-white rounded-md shadow-md btnChange" id="btnChange" onclick="changeButton('register')">Register</button>
            <button class="transition-all duration-700 ease-linear bg-blue-900 px-8 py-1 absolute hidden z-50 text-center btnChangeLogin ml-[377px] mt-1 text-white rounded-md shadow-md btnChange" id="btnChange" onclick="changeButton('login')">Login</button>
            {{-- Button --}}
            {{-- Button --}}
            <div class=" bg-[url('../../public/img/user/bgLogin.jpg')] bg-cover bg-center no-repeat absolute ml-[442px] z-10 w-[434px] h-[527px] bgPemisah transition-all duration-700 ease-linear">

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
        if($message = Session()->has('LoginError')){
            // alert()->success(Session::get('Success'));
            alert()->question('Title','Lorem Lorem Lorem');
            echo '<script>
                alert("'.Session::get('LoginError').'")
                    console.log('.$message.');
                </script>';
        } 
    ?> 

    <script>
            function changeButton($value){

                if($value == 'register'){

                    let prefix = "USR-"; 

                    // Generate a random suffix
                    let suffix = "";
                    for (let i = 0; i < 4; i++) {
                    suffix += Math.floor(Math.random() * 10);
                    }
            
                    // Combine the prefix and suffix to form the code
                    let code = prefix + suffix; 
                    $('#idUser').val(code);

                    $('.bgPemisah').removeClass('ml-[442px]')
                    $('.btnChangeRegister').addClass('hidden');
                    $('.btnChangeLogin').removeClass('hidden');
                    console.log($value);
                }else if($value == 'login'){
                    $('.bgPemisah').addClass('ml-[442px]')
                    $('.btnChangeRegister').removeClass('hidden');
                    $('.btnChangeLogin').addClass('hidden');
                    console.log($value);
                }
            }
    </script> 

    <script src="{{ 'style/login/register.js' }}"></script>
    @include('sweetalert::alert')
</body>
</html>