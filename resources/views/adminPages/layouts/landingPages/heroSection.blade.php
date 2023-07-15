<div class="ml-[13%] mt-4 mx-3">
    {{-- Navbar --}}
    <h1>Navbar On Scrolling & All Produk Pages</h1>
    <div class=" bg-blue-800 rounded-b-md w-full shadow-xl navbar z-50 transition-colors ease-in duration-700 mb-5">
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
            <button class="px-7 py-1 rounded-lg transition-colors ease-in duration-700 bg-yellow-400 text-white shadow-lg mr-4 btnLogin">
                Login
            </button>
        </div>
    </div>
    {{-- Form Input Nvbar --}}
    <div class="bg-slate-200 rounded-md shadow-md w-full h-full p-2">
        <form action="" method="post">
            <div class="flex justify-around">
                <div class="">
                    <h1>Nama Brand</h1>
                    <input type="text" name="nameBrand" id="nameBrand" class="border-2 border-slate-200 bg-white shadow-md">
                </div>
                <div class="">
                    <h1>Background Navbar</h1>
                    <input type="color" name="bgNav" id="bgNav" class="border-2 border-slate-200 bg-white shadow-md">
                </div>
                <div class="">
                    <h1>List Menu</h1>
                    <div class="grid grid-cols-2">
                        <div>
                            <h3>Menu 1</h3>
                            <input type="text" name="tentangKamiMenu" id="tentangKamiMenu" class="border-2 border-slate-200 bg-white shadow-md">
                        </div>
                        <div class="">
                            <h3>Menu 2</h3>
                            <input type="text" name="produkMenu" id="produkMenu" class="border-2 border-slate-200 bg-white shadow-md">
                        </div>
                        <div>
                            <h3>Menu 3</h3>
                            <input type="text" name="FAQMenu" id="FAQMenu" class="border-2 border-slate-200 bg-white shadow-md">
                        </div>
                        <div>
                            <h3>Menu 4</h3>
                            <input type="text" name="kontakKamiMenu" id="kontakKamiMenu" class="border-2 border-slate-200 bg-white shadow-md">
                        </div>
                    </div>
                </div>
                <div class="">
                    <h1>Button Login</h1>
                    <div>
                        <h3 class="text-sm mt-1">Background</h3>
                        <input type="color" name="bgBtnLogin" id="bgBtnLogin" class="border-2 border-slate-200 bg-white shadow-md">
                    </div>
                </div>
            </div>
            <button class="py-1 px-6 bg-blue-800 text-white rounded-md shadow-md">Update</button>
        </form>
    </div>
    {{-- ENd Form Input Nvbar --}}
    {{-- End Navbar --}}

    {{-- Hero Section --}}
    <div class="h-[500px] mt-5 mb-6">
        <div id="heroSection" class="bg-[url('../../public/img/bgHero.jpeg')] bg-cover bg-center w-full h-80 pt-5 pb-[9%] px-[3%] text-white">
            <div class=" w-[35%] shadow-xl bg-white bg-opacity-10 p-3 py-4 rounded-xl shadow-black">
                <h1 class="text-2xl text-blue-600">
                    AZKA
                    <span class="text-xl text-yellow-400">PRINT</span>
                </h1>
                <p class="text-justify mt-1">
                    Bersiaplah untuk menjelajahi dunia barang-barang berkualitas dengan harga terbaik. 
                    Kami siap membantu Anda menemukan produk yang tepat dengan mudah.
                </p>
        
                <button class="px-10 py-1 rounded-md shadow-black shadow-md bg-yellow-400 mt-[20%] ml-[33%]">Jelajahi</button>
        
            </div>
        </div>
        {{-- Form Input Nvbar --}}
        <div class="bg-slate-100 rounded-md shadow-md w-full p-2 mt-3 mb-6">
            <form action="" method="post">
                <div class="flex justify-around"> 
                    <div class="">
                        <h1>Judul Section</h1>
                        <input type="text" name="judulSection" id="judulSection" class="border-2 border-slate-200 bg-white shadow-md">
                        <h1>Keterangan Section</h1>
                        <textarea name="textSection" id="" cols="30" rows="5" class="border-2 border-slate-200 bg-white shadow-md">

                        </textarea>
                    </div>
                    <div class="">
                        <h1>Background Hero Section</h1>
                        <input type="file" name="bgHeroSection" id="bgHeroSection" class="border-2 border-slate-200 bg-white shadow-md">
                    </div>
                    <div class="">
                        <h1>Button Login</h1>
                        <div>
                            <h3 class="text-sm mt-1">Background</h3>
                            <input type="color" name="bgBtnHero" id="bgBtnHero" class="border-2 border-slate-200 bg-white shadow-md">
                            <h3 class="text-sm mt-1">Text Tombol</h3>
                            <input type="text" name="textBtnHero" id="textBtnHero" class="border-2 border-slate-200 bg-white shadow-md">
                        </div>
                    </div>
                </div>
                <button class="py-1 px-6 bg-blue-800 text-white rounded-md shadow-md">Update</button>
            </form>
        </div>
        {{-- ENd Form Input Nvbar --}}
    </div>
    {{-- End Hero Section --}}