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
                                        <input type="checkbox" name="idCart" id="idCart" class="border-2 " value="{{ $data->id }}" onclick="checkCart(this, '{{ $data->id }}')">
                                    </div>
                                    <img src="{{ 'img/produk/'}}{{$data->getProduk['fotoProduk']}}" alt="profil" class="w-full">
                                </div>
                                <div>
                                    <h1 class="font-bold text-xl">
                                        {{ $data->getProduk['namaProduk'] }}
                                    </h1>
                                    <h6 class="text-sm italic text-slate-500">Type : {{ $data->getProduk['tipeProduk'] }}</h6>
                                    <h6 class="text-sm italic text-slate-500">Stock : {{ $data->getProduk['jumlahProduk'] }}</h6>
                                </div>
                                <div>
                                    <h1>Harga </h1>
                                    <span class="font-bold italic">
                                        <?php $harga = $data->getProduk['hargaProduk'];
                                            echo "Rp. ". number_format($harga, 0, ".", ".");
                                        ?>
                                    </span>
                                </div>
                                <div>
                                    <h1>Jumlah</h1>
                                    <input type="number" name="jumlahPesanan" id="jumlahPesanan" class="border-slate-400 border"
                                    onkeyup="onInputChange(this.value, {{ $data->getProduk['id'] }})"
                                    >
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
                                <span class="font-bold text-right" id="totalBayar"></span>
                            </div>
                            <button class="mt-[180px] absolute text-md font-semibold w-[310px] h-10 bg-yellow-400">Bayar</button>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        let idHapusCart = [];
        let totalHarga = 0;
        let pilihIdProduk = [];
        function checkCart(checkbox, e){
           if(checkbox.checked){
                idHapusCart.push(e);
                // console.log("Id Cart Yang mau dihapu: ", idHapusCart);
           }else{
            let index = idHapusCart.indexOf(e);
                if (index !== -1) {
                    idHapusCart.splice(index, 1);
                }
            }
            console.log("Id Cart Yang mau dihapus: ", idHapusCart);
        }

        function onInputChange(val, idProduk){
            console.log("Id Produk : ", idProduk);
            console.log("Jumlah Beli : ", val);

            if(val > 0){
                    $.ajax({  
                    type: "GET",
                    url: "/cariDataProduk/"+idProduk,
                    success: function(response){
                        let harga = response.hasilIdProduk.hargaProduk;

                        totalHarga = val * harga;

                        let rupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalHarga);

                        console.log(rupiah);
                        $('#totalBayar').html(rupiah);
                    }
                })

            }else{
                totalHarga = 0;
                let rupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalHarga);

                console.log(rupiah);
                $('#totalBayar').html(rupiah);
            }
        }

        

    </script>
@endsection
