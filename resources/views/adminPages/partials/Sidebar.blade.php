<div class="bg-blue-950 h-screen w-40 shadow-md fixed">
    <div class="text-xl h-14 border-b text-white border-gray-500/30 text-center pt-[10%]">
        AZKAPRINT
    </div>
    <div class="p-3 text-slate-200">
        <h2 class="text-sm text-slate-300">Admin</h2>
        <hr class="w-4 ">
        <div class="mt-1">
            @if ($path = request()->path() === 'admin' )
            <button value="dashboard" class="bg-slate-200 text-black py-1 pl-2 rounded-md absolute pr-[66px] -rounded-tr-lg">
                Dashboard
            </button>
            @else
                
            @endif
            <div class="mt-3 relative pt-10">
                <h2 class="text-sm text-slate-300">Data</h2>
                <hr class="w-4">
                <div class="mt-2">
                    <button value="dataUsers" class="mb-4">Data Users</button>
                    <div id="dropdown" class="mb-4 dropdown inline-block relative">
                        <button onclick="dropdownProduk()" class="rounded inline-flex items-center">
                          <span class="mr-1">Data Gudang</span>
                          <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/> </svg>
                        </button>
                        <ul id="dropdown-produk" class="hidden">
                          <li onclick="dropdownProduk()" class="py-2 px-4 block whitespace-no-wrap hover:bg-slate-100/30 cursor-pointer spa-route" value="banner">
                              Banner
                          </li>
                          <li onclick="dropdownProduk()" class="py-1 px-4 block whitespace-no-wrap hover:bg-slate-100/30 cursor-pointer spa-route" value="xbanner">
                              X-Banner
                          </li>
                        </ul>
                      </div>
                    <button value="dataKeuangan" class="mb-4">Data Keuangan</button>
                </div>
            </div>
            <hr class="text-slate-300 mt-4">
            <div class="mt-4">
                <h2 class="text-sm text-slate-300">Landing Pages</h2>
                <hr class="w-4 ">
                <div class="mt-4">
                    <div class="mb-4">Top Categories </div>
                    <div class="mb-4">Tentang Kami </div>
                    <div class="mb-4">Produk </div>
                    <div class="mb-4">FAQ </div>
                    <div class="mb-4">Kontak Kami </div>
                </div>
            </div>
        </div>
    </div>
</div>
