@extends('userPages/main')

@section('content')
    <div class="h-full w-full px-2 pt-10">
        <div class="w-full h-full rounded-md mt-10 shadow-lg p-3">
            <div class=" w-full h-full rounded-md shadow-md p-2 ">
                <div class="flex justify-around mb-8 bg-blue-400/30 items-center">
                    <div class="cursor-pointer spa-route" value="stempel">
                        Stempel
                    </div>
                    <div class="cursor-pointer spa-route" value="undangan">
                        Undangan
                    </div>
                    <div class="cursor-pointer spa-route" value="banner">
                        Banner
                    </div>
                    <div class="cursor-pointer spa-route" value="xbanner">
                        X-Banner
                    </div>
                    <div class="cursor-pointer spa-route " value="lanyard">
                        Lanyard
                    </div>
                    <div class="cursor-pointer spa-route" value="idCard">
                        Id Card
                    </div>
                </div>  

                {{-- Menampilkan Data --}}
                <div id="contentProduk">
                    <div class="grid grid-cols-6 gap-10 px-10">
                        @foreach ($dataProduk as $produk)
                        <div class="bg-white w-40 h-64 rounded-md shadow-md">
                            <div class="bg-blue-400 w-full h-36">
                                <img src="{{ 'img/produk/' }}{{ $produk->fotoProduk }}" alt="" class="h-full w-full">
                            </div> 
                            <div class="text-center mt-1 m-2">
                                <h1 class="font-semibold mb-1"> 
                                    {{ $produk->namaProduk }} 
                                </h1>
                                <h6 class="italic">
                                    <?php $harga = $produk->hargaProduk;
                                        echo "Rp. ". number_format($harga, 0, ".", ".");
                                    ?>
                                </h6>
                                <button class="bg-blue-500 px-4 text-center mt-3 text-white rounded-md shadow-md" onclick="modalAllproduk('allProduk', {{ $produk->id }})">Detail</button>
                            </div>
                        </div>
                    @endforeach
                
                    {{-- @php
                        $dataListProdukGrouped = $dataListProduk->groupBy('idUser');
                    @endphp
                    @if (!$dataListProduk)
                        <h2>Data Tidak ada</h2> 
                    @else
                        <div>
                            @if ($dataListProdukGrouped->count() > 0)
                            @if (!empty($userSama))
                                <h1> {{ $userSama }} </h1>
                            @endif
                            @foreach ($dataListProdukGrouped as $data => $item)
                                @foreach ($item as $data)
                                    <div>
                                        <h1>Nama Produk :{{ $data->getProduk->namaProduk }}</h1>
                                        <h1>Pemesan : {{ $data->getUser->namaUser }}</h1>
                                    </div>
                                @endforeach
                            @endforeach
                                
                            @else
                                <h1>Data Tidak ada Ui</h1>
                            @endif

                        </div>
                    @endif --}}
                </div>
                </div>
                
            </div>
        </div>
    </div> 

{{-- Modal Detail All Produk--}}
<button class="w-full h-screen top-0 left-0 bg-blue-800/30 absolute z-10 bgModal hidden transition-colors duration-700 ease-linear" id="bgmodalDetailAll">

</button>

<div id="modalDetailAll" class="h-screen w-full  absolute top-0 left-0 z-50 hidden transition-transform duration-700 ease-linear" >
    <div class="flex justify-center mt-8">
        <div class="bg-slate-100 shadow-lg p-5 w-[700px] rounded-md shadow-black h-[600px]">
            <div class="flex flex-row-reverse relative -mt-5">
                <button class="text-rigth text-2xl font-semibold btnCloseStempel z-50" onclick="modalAllproduk('CloseDetail')" >
                        &#215;
                </button>
            </div>
            <h1 class="text-xl font-semibold relative -mt-5">Detail Data </h1>
            <hr>
            {{-- @foreach ($dataDetailstempel as $stempel) --}}
                <div class="mt-3 grid grid-cols-2 bg-white w-full h-[95%]">
                    <div class="w-full h-[95%]">
                        <img alt="" class="w-full h-full" id="fotoAllDetailProduk">
                    </div>
                    <div class=" w-full h-[95%] p-4">
                    <h1 class="text-black font-semibold text-3xl mb-2 detailNamaProduk" id="detailAllNamaProduk"></h1>
                    <h3>
                        <del class="text-red-500 italic font-semibold">Rp. 75.000</del>
                        <b class="text-black italic font-semibold hargaDetailProduk" id="hargaAllDetailProduk">
                           
                        </b>
                        <span class="font-semibold text-green-500 underline">Promo </span>
                        
                    </h3>
                    <p class="mt-3">Keterangan : 
                            <span>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Expedita modi distinctio quibusdam dolorem recusandae non, beatae quod culpa provident saepe quasi soluta eligendi dolores sapiente repellendus, maiores error omnis dolor?
                            </span>
                        </p> 
                    <div class="mt-10"> 
                            @if (!Auth::user())
                                <a href="/login" class="bg-blue-400 text-white w-full py-2 rounded-md shadow-md">
                                    {{-- <button class="bg-blue-400 text-white w-full py-2 rounded-md shadow-md">Login</button> --}}
                                    login
                                </a>
                            @endif
                            @if (Auth::user())
                                <form action="/addToCart" method="post">
                                    @csrf
                                    <input type="text" name="idUserLogin" value="{{ Auth::user()->id }}" placeholder="{{ Auth::user()->id }}">

                                    <input type="text" placeholder="Id Produk" id="idDetailProduk" name="idDetailProduk">

                                    <button type="submit" class="bg-green-400  text-white w-full py-2 rounded-md shadow-md">
                                        Add To Card  
                                        <i class="fa-solid fa-cart-plus ml-3"></i>
                                    </button>
                                </form>
                            @endif
                            {{-- <button class="bg-gray-400 text-white w-full py-2 rounded-md shadow-md">Add To Card </button> --}}
                            <div class="text-center mt-40">
                                <a class=" rounded-full text-md px-2 py-1 mx-3 text-black hover:text-blue-500">
                                    <i class="fa-brands fa-facebook"></i>
                                </a>
                                <a class=" rounded-full text-md px-2 py-1 mx-3 text-black hover:text-blue-500">
                                    <i class="fa-brands fa-instagram"></i>
                                </a>
                                <a class=" rounded-full text-md px-2 py-1 mx-3 text-black hover:text-blue-500">
                                    <i class="fa-solid fa-envelope"></i>
                                </a>
                            </div>
                    </div>
                </div> 
                </div>
            {{-- @endforeach --}}
        </div>
    </div>
    
</div>
{{-- Modal Detail All Produk--}}


    <script>
       function dropdown(){
        $dropdown = document.getElementById("dropdown-menu");
        $dropdown.classList.toggle("hidden");
       }
    </script>

@endsection