<div class="bg-blue-950 h-screen w-40 shadow-md fixed">
    <div class="text-xl h-14 border-b text-white border-gray-500/30 text-center pt-[10%]">
        AZKAPRINT
    </div>
    <div class="p-3 text-slate-200">
        <h2 class="text-sm text-slate-300">Admin</h2>
        <hr class="w-4 ">
        <div class="mt-1">
            <button value="admin" class="spa-admin mt-1 dashboard bg-slate-200 text-black py-1 pl-2 rounded-md pr-[66px] -rounded-tr-lg">
                Dashboard
            </button>
            <button class="text-white font-normal mt-2">Transaksi</button>

            <div class="mt-1 relative sideData" id="">
                <h2 class="text-sm text-slate-300">Data</h2>
                <hr class="w-4">
                <div class="mt-2">
                    
                    <button value="dataUserSection" class="mb-4 w-[150px] hidden spa-admin side1 bg-slate-200 text-black py-1 pl-2 rounded-md absolute pr-12 -rounded-tr-lg">Data Users</button>
                    <button value="dataUserSection" class="mb-4 spa-admin side">Data Users</button>


                    <div id="dropdown" class="mb-4 dropdown inline-block relative">
                        <button onclick="dropdownProduk()" class="rounded inline-flex items-center">
                          <span class="mr-1">Data Gudang</span>
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                        </button>
                        <ul id="dropdown-produk" class="hidden">
                          <li onclick="" class="spa-admin py-2 px-4 whitespace-no-wrap cursor-pointer mb-4 w-[150px] hidden  spa-admin produkMenu1 bg-slate-200 text-black pl-2 rounded-m  " value="produk">
                              Data Produk
                          </li>
                          <li onclick="" class="spa-admin py-2 px-4 block whitespace-no-wrap cursor-pointer mb-4 w-[150px] spa-admin produkMenu hover:bg-slate-200 hover:text-black hover:rounded-md" value="produk">
                              Data Produk
                          </li>

                          <li onclick="" class="spa-admin  py-1 px-4 block whitespace-no-wrap hover:bg-slate-200 hover:text-black cursor-pointer spa-admin hover:rounded-md" value="dataBarang">
                              Data Barang
                          </li>
                        </ul>
                      </div>
                    <button value="dataKeuangan" class="mb-4 spa-admin">Data Keuangan</button>
                </div>
            </div>
            <hr class="text-slate-300">
            <div class="mt-4">
                <h2 class="text-sm text-slate-300">Landing Pages</h2>
                <hr class="w-4 ">
                <div class="mt-4">
                    <div class="mb-4 spa-admin cursor-pointer" value="EditHeroSection">Hero Section</div>
                    <div class="mb-4 spa-admin cursor-pointer" value="EditTopCategories">Top Categories </div>
                    <div class="mb-4 spa-admin cursor-pointer" value="EditTentangKami">Tentang Kami </div>
                    <div class="mb-4 spa-admin cursor-pointer" value="EditProdukSection">Produk </div>
                    <div class="mb-4 spa-admin cursor-pointer" value="EditFAQSection">FAQ </div>
                </div>
            </div>
        </div>
    </div>
</div>

