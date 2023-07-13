
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
            <button class="px-7 py-1 rounded-lg transition-colors ease-in duration-700 bg-blue-800 text-white shadow-lg mr-4 btnLogin">
                Login
            </button>
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
            <button class="px-7 py-1 rounded-lg transition-colors ease-in duration-700 bg-blue-800 text-white shadow-lg mr-4 btnLogin">
                Login
            </button>
        </div>
    </div>    
@endif
