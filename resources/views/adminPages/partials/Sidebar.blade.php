<div class="bg-blue-950 h-screen w-40 shadow-md fixed">
    <div class="text-xl h-14 border-b text-white border-gray-500/30 text-center pt-[10%]">
        AZKAPRINT
    </div>
    <div class="p-3 text-slate-200">
        <h2 class="text-sm text-slate-300">Admin</h2>
        <hr class="w-4 ">
        <div class="mt-1">
            @if (Auth::user()->status === "Manager")
                <button value="admin" class="spa-admin mt-1 dashboard bg-slate-200 text-black py-1 pl-2 rounded-md pr-[66px] -rounded-tr-lg">
                    Dashboard
                </button>
            @elseif (Auth::user()->status === "Admin")
                <button class="text-white font-normal mt-2 spa-admin" value="transaksiAdmin">Transaksi</button>
            @endif

            <div class="mt-1 relative sideData" id="">
                    
                    @if (Auth::user()->status === "Manager")
                        <button value="dataUserSection" class="mb-4 w-[150px] hidden spa-admin side1 bg-slate-200 text-black py-1 pl-2 rounded-md absolute pr-12 -rounded-tr-lg">Data Users</button>
                        <button value="dataUserSection" class="mb-4 spa-admin side">Data Users</button>
                    @endif

                    @if (Auth::user()->status === "Admin")
                    
                        <button class="text-white font-normal mt-2 spa-admin mb-3" value="produk">Data Produk</button>
                            
                        <button value="dataKeuangan" class="mb-4 spa-admin">Cetak Laporan</button>

                    @endif
                </div>
            </div>
            
        </div>
    </div>
</div>

