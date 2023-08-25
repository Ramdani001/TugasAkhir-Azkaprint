
@if ($path = request()->path() === "allProduk")
    <div class="fixed top-0 bg-blue-800 rounded-b-md w-full shadow-xl navbar z-50 transition-colors ease-in duration-700">
        <div class="h-16 flex flex-row items-center w-full">
            <div class="text-white font-semibold text-2xl mx-3 lg:w-full ml-7">
                <a href="/#heroSection">Azkaprint</a>
            </div>
            <div class="text-white text-xl mx-6 w-full">
                <div class="flex w-full md:justify-around">
                    <div class="hover:text-yellow-200 hover:underline ">
                        <a href="/#tentangKami">Tentang Kami</a> 
                    </div> 
                    <div class="hover:text-yellow-200 hover:underline ">
                        <a href="{{ '/allProduk' }}">Produk</a>
                    </div>
                    <div class="hover:text-yellow-200 hover:underline ">
                        <a href="/#FAQ">FAQ</a>
                    </div>
                    <div class="hover:text-yellow-200 hover:underline ">
                        <a href="/#kontakKami">Kontak Kami</a>
                    </div>
                </div> 
            </div>
            @if (!Auth::user())
            <a href="/login"> 
                <button class=" px-7 py-1 rounded-lg transition-colors ease-in duration-700 bg-blue-800 shadow-lg mr-4 btnLogin">
                    Login
                </button>
            </a>
            @endif
            @if (Auth::user())
                @php
                    $produkByid = $dataListProduk->groupBy('idProduk');
                    $idProduk = 0;
                @endphp
                    <div class="py-1 flex w-[250px] items-center justify-center">
                        @if (!Auth::user())
                        <a href="/login">
                            <button class=" px-7 py-1 rounded-lg transition-colors ease-in duration-700 bg-blue-800 text-white shadow-lg mr-4 btnLogin">
                                Login
                            </button>
                        </a>
                        @endif
                        @if (Auth::user())
                        <a href="/cartView">
                            <div class="bg-green-400 text-center rounded-full h-4 w-4 text-sm absolute ml-7 -mt-1">
                                <div class="">
                                    {{ $userSama }}
                                </div>
                            </div>
                            <button class="text-white ml-9 mr-3">
                                <i class="fa-solid fa-cart-shopping"></i>
                            </button>
                        </a>
                        <div class="text-white flex w-36">
                            <h2 class="w-full pr-1">
                                {{ Auth::user()->namaUser }}
                            </h2>
                            <button onclick="dropdownPrf()" class="cursor-pointer">
                                <img src="{{ 'img/profile/' }}{{ Auth::user()->profile }}" alt="profile" class="w-8 h-8 rounded-full mr-5">
                            </button>
                            <div id="dropdownProfile" class="bg-blue-800 hidden rounded-tl-md rounded-br-md rounded-bl-md w-[120px] h-full p-2 absolute ml-[20px] mt-10">
                                <a href="/profilePages">Profile</a>
                                <hr>
                                <a href="/logoutUser">Logout</a>
                            </div>
                        </div>
                    </div>
                    @endif
            @endif
            
        </div>
    </div> 
@else
    <div class="fixed top-0 bg-Transparent rounded-b-md w-full shadow-xl navbar z-50 transition-colors ease-in duration-700">
        {{-- Mobile --}}
        <div class="text-white md:hidden">
            <div class="grid grid-cols-2 justify-items-stretch shadow-md p-1">
                <h1 class="text-xl font-semibold">
                    AZKAPRINT
                </h1>
                <div class="justify-self-end pt-1" id="iconMenu">
                    <div id="icon1" class="border-2 w-7 mb-1 rounded-md transition-transform ease-in duration-700 " style="transform: translateY(16px) translateX(2px) rotate(-40deg); transform-origin: left top;">
                        <span></span>
                    </div>
                    <div id="icon2" class="border-2 w-7 mb-1 rounded-md" style="transform: translate(-1px) rotate(40deg)">
                        <span></span>
                    </div>
                    <div id="icon3" class="border-2 hidden w-7 mb-1 rounded-md">
                        <span></span>
                    </div>
                </div>
            </div>
            {{-- listMenu Mobile --}}
            <div id="listMenuMobile" class="bg-blue-400 shadow-md p-2 text-md font-semibold">
                <div class="p-2 active:border-b active:text-xl">
                    <a href="#">Home</a>
                </div>
                <div class="p-2  active:border-b active:text-xl">
                    <a>Tentang Kami</a>
                </div>
                <div class="p-2  active:border-b active:text-xl">
                    <a>Produk</a>
                </div>
                <div class="p-2  active:border-b active:text-xl">
                    <a>FAQ</a>
                </div>
                <div class="p-2  active:border-b active:text-xl">
                    <a>Kontak Kami</a>
                </div>
            </div>
            {{-- listMenu Mobile --}}
        </div>
        {{-- Mobile --}}
        <div class="h-16 md:flex flex-row items-center w-full hidden">
            <div class="text-white font-semibold text-2xl mx-3 lg:w-full ml-7">
                <a href="#heroSection">Azkaprint</a>
            </div>
            <div class="text-white text-xl mx-6 w-full">
                <div class="flex w-full md:justify-around">
                    <div class="hover:text-yellow-200 hover:underline ">
                        <a href="#tentangKami" class="">Tentang Kami</a> 
                    </div> 
                    <div class="hover:text-yellow-200 hover:underline ">
                        <a href="{{ '/allProduk' }}">Produk</a>
                    </div>
                    <div class="hover:text-yellow-200 hover:underline ">
                        <a href="#FAQ">FAQ</a>
                    </div>
                    <div class="hover:text-yellow-200 hover:underline ">
                        <a href="#kontakKami">Kontak Kami</a>
                    </div>
                </div> 
            </div>
             
            
            @if (!Auth::user())
            <a href="/login">
                <button class=" px-7 py-1 rounded-lg transition-colors ease-in duration-700 bg-blue-800 text-white shadow-lg mr-4 btnLogin">
                    Login
                </button>
            </a>
            @endif
            @if (Auth::user())
                <div class="py-1 flex w-[250px] items-center justify-center">
                    <a href="/cartView">
                        <div class="bg-green-400 text-center rounded-full h-4 w-4 text-sm absolute ml-7 -mt-1">
                            <div class="">
                                {{ $userSama }}
                            </div>
                        </div>
                        <button class="text-white ml-9 mr-3">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                    </a>
                    <div class="text-white flex w-36">
                        <h2 class="w-full pr-1">
                            {{ Auth::user()->namaUser }}
                        </h2>
                        <button onclick="dropdownPrf()" class="cursor-pointer">
                            <img src="{{ 'img/profile/' }}{{ Auth::user()->profile }}" alt="profile" class="w-8 h-8 rounded-full mr-5">
                        </button>
                        <div id="dropdownProfile" class="bg-blue-800 hidden rounded-tl-md rounded-br-md rounded-bl-md w-[120px] h-full p-2 absolute ml-[20px] mt-10">
                            <a href="/profilePages">Profile</a>
                            <hr>
                            <a href="/logoutUser">Logout</a>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

 

@endif
