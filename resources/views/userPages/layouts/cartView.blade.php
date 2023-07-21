@extends('userPages.main')

@section('content')
    <div class="h-[550px] w-full px-2 mt-20 p-3">
        <div class="w-full h-full bg-white rounded-md shadow-lg grid grid-rows-8">
            <h1 class="text-center text-3xl font-bold pt-5">
                Keranjang Saya
            </h1>
            {{-- <hr class="mt-3 border-slate-200"> --}}
            <div class="grid grid-cols-4 bg-blue-300 row-span-6 p-2 gap-3">
                <div class="bg-white col-span-3 shadow-md rounded-md p-2">
                    <hr> 
                        @foreach ($dataListProduk as $cart => $data)
                        {{-- @php
                            dd($data->getProduk['id']);
                        @endphp --}}
                        <div class="grid grid-cols-5 gap-2 mb-2">
                                <div>
                                    <div>
                                        <input type="checkbox" name="idCart" id="idCart" class="border-2 " value="{{ $data->id }}" onclick="checkCart('{{ $data->id }}')">
                                    </div>
                                    <img src="{{ 'img/produk/'}}{{$data->getProduk['fotoProduk']}}" alt="profil" class="w-full">
                                </div>
                                <div>
                                    <h1 class="font-bold text-xl">Stempel</h1>
                                    <h6 class="text-sm italic text-slate-500">Type : D3</h6>
                                    <h6 class="text-sm italic text-slate-500">Stock : Ready</h6>
                                </div>
                                <div>
                                    <h1>Harga </h1>
                                    <span class="font-bold italic">Rp. 45.000</span>
                                </div>
                                <div>
                                    <h1>Jumlah</h1>
                                    <input type="number" name="jumlahPesanan" id="jumlahPesanan" class="border-slate-400 border"
                                    
                                    >
                                </div>
                                <div>
                                    <h1>Total</h1>
                                    <span class="font-bold"> Rp. </span>
                                    <input type="number" name="jumlahPesanan" id="jumlahPesanan" class="font-bold italic w-32" value="45.000" >
                                </div>
                            </div>
                        @endforeach
                    <hr class="mb-2">
                </div>
                <div class="bg-gray-300 shadow-md rounded-md p-2">
                    <div>
                        <h1>Masukan Kode Promo</h1>
                        <div class="flex">
                            <input type="text" class="border-slate-300 border py-2 px-1">
                            <button class="bg-black text-white font-semibold py-2 w-full h-full">Submit</button>
                        </div>
                            <div class="grid grid-cols-2 mt-3">
                                <h1>Id Transaksi</h1>
                                <h3 class="text-right">TRI-0001</h3>
                            </div>
                            <div class="grid grid-cols-2 mt-3">
                                <h1>Diskon</h1>
                                <h3 class="text-right">0%</h3>
                            </div>
                            <div class="grid grid-cols-2 mt-3">
                                <h1>Total Bayar</h1>
                                <h3 class="text-right">Rp. 45.000</h3>
                            </div>
                            <button class="mt-[180px] absolute text-md font-semibold w-[310px] h-10 bg-yellow-400">Bayar</button>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function checkCart(e){
            $idHapusCart = [e];
            console.log("Id Cart Yang mau dihapu: ", $idHapusCart);
        }
    </script>
@endsection
