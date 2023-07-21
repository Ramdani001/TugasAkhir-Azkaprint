
@if ($path = request()->path() === "allProduk")
    <div class="fixed top-0 bg-blue-800 rounded-b-md w-full shadow-xl navbar z-50 transition-colors ease-in duration-700">
        <div class="h-16 flex flex-row items-center w-full">
            <div class="text-white font-semibold text-2xl mx-3 w-full ml-7">
                <a href="{{ '/' }}">Azkaprint</a> 
            </div> 
            <div class="text-white text-xl mx-6 w-full">
                <div class="flex w-full justify-around">
                    <div class="hover:text-yellow-200 hover:underline">
                        <a href="#">Tentang Kami</a> 
                    </div> 
                    <div class="hover:text-yellow-200 hover:underline">
                        <a href="{{ '/allProduk' }}">Produk</a>
                    </div>
                    <div class="hover:text-yellow-200 hover:underline">
                        <a href="#">FAQ</a>
                    </div>
                    <div class="hover:text-yellow-200 hover:underline">
                        <a href="#">Kontak Kami</a>
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

                {{-- @foreach ($produkByid as $idProduk => $produkGroup)
                    <div>
                        <h1>idProduk: </h1>
                        <input type="text" value="{{ $idProduk }}">
                        <h2>Jumlah Produk: </h2>
                        <input type="text" value="{{ $produkGroup->count() }}">
                    </div>
                @endforeach --}}
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
                            {{-- @foreach ($produkByid as $idProduk => $produkGroup) --}}
                                <div class="">
                                    {{ $userSama }}
                                </div>
                            {{-- @endforeach --}}
                        </div>
                        <button class="text-white ml-9 mr-3">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </button>
                    </a>
                    <div class="text-white flex w-36">
                        <h2 class="w-full pr-1">
                            {{ Auth::user()->namaUser }}
                        </h2>
                        <div class="h-8 w-8 bg-gray-400 rounded-full">

                        </div>
                    </div>
                </div>
                    @endif
            @endif
            
        </div>
    </div>
@else
    <div class="fixed top-0 bg-Transparent rounded-b-md w-full shadow-xl navbar z-50 transition-colors ease-in duration-700">
        <div class="h-16 flex flex-row items-center w-full">
            <div class="text-white font-semibold text-2xl mx-3 w-full ml-7">
                <a href="#heroSection">Azkaprint</a>
            </div>
            <div class="text-white text-xl mx-6 w-full">
                <div class="flex w-full justify-around">
                    <div class="hover:text-yellow-200 hover:underline">
                        <a href="#tentangKami">Tentang Kami</a> 
                    </div> 
                    <div class="hover:text-yellow-200 hover:underline">
                        <a href="{{ '/allProduk' }}">Produk</a>
                    </div>
                    <div class="hover:text-yellow-200 hover:underline">
                        <a href="#FAQ">FAQ</a>
                    </div>
                    <div class="hover:text-yellow-200 hover:underline">
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
                    <button class="text-white ml-9 mr-3 btnCard">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </button>
                    <div class="text-white flex w-36">
                        <h2 class="w-full pr-1">
                            {{ Auth::user()->namaUser }}
                        </h2>
                        <div class="h-8 w-8 bg-gray-400 rounded-full">

                        </div>
                    </div>
                </div>
                <a href="/logoutUser">Logout</a>
            @endif
        </div>
    </div>    
@endif
