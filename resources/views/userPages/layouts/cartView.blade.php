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
                                    {{-- <input type="number" name="jumlahPesanan" id="jumlahPesanan" class="border-slate-400 border"
                                    onchange="onInputChange(this.value, {{ $data->getProduk['hargaProduk'] }}, {{ $data->getProduk['id'] }})"
                                    value= "{{ $data->jumlah }}"
                                    > --}}
                                    <input type="number" name="jumlahPesanan" id="jumlahPesanan" class="border-slate-400 border"
                                    value= "{{ $data->jumlah }}"
                                    >
                                    <div class="grid grid-cols-2 gap-3 mt-1">
                                        <button class="px-1 py-1 bg-gray-200 shadow-md"onclick="tambahCart({{ $data->id }}, 'Tambah')" >+</button>
                                        <button class="px-1 py-1 bg-gray-200 shadow-md">-</button>
                                    </div>
                                    <input type="text" class="hidden" name="jumlahPesanan{{ $data->getProduk['id'] }}" id="jumlahPesanan{{ $data->getProduk['id'] }}" class="border-slate-400 border"
                                   
                                    value= "{{ $data->jumlah }}"
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

    {{-- CartView --}}
    // {{-- Jquery --}}
    <script src="{{ 'style/jquery.js' }}"></script>
    <script src="{{ 'style/jquery.min.js' }}"></script>
    <script>


        let idHapusCart = [];
        let totalHarga = 0;
        let pilihIdProduk = []; 
        let totalHargaAwal = 0;

        var keranjang = '{{ (json_encode($dataListProduk))}}';

        var decodedData = JSON.parse(keranjang.replace(/&quot;/g, '"'));

        console.log(decodedData);

        for(var i = 0; i< decodedData.length; i++){
          
          var jumlahBarang = decodedData[i]["jumlah"];
          var harga = decodedData[i]["get_produk"]["hargaProduk"];
     
          var tempJumlah = jumlahBarang * harga;
          totalHarga = totalHarga + tempJumlah;
        //   totalHargaAwal = totalHargaAwal + tempJumlah;
          let rupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalHarga);
          $('#totalBayar').html(rupiah);

        }
        
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

        $(document).on('ready', function(){

        })

        function onInputChange(jumlahOrder, hargaProduk, idProduk){
        //   var inputText = parseInt($('#jumlahPesanan'+idProduk).val(), 10);
         var inputText = $('#jumlahPesanan'+idProduk).val();
          console.log(totalHarga);

          var tempTotalSebelum = inputText * hargaProduk;
          var tempTotalSesudah = jumlahOrder * hargaProduk;
          var tempSementara = 0;
          if(jumlahOrder < inputText){
            console.log("Baris 1");
            tempSementara = tempTotalSesudah - tempTotalSebelum;
          }else if(jumlahOrder > inputText){
            console.log("Baris 2");
            tempSementara = (tempTotalSebelum + tempTotalSesudah)-tempTotalSebelum;
          }else{
            console.log("Baris 3");
            tempSementara = tempTotalSebelum;
          }

          totalHarga = totalHarga + tempSementara;

          let rupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalHarga);
          $('#totalBayar').html(rupiah);

          $('#jumlahPesanan'+idProduk).val(jumlahOrder);

        }

        

    </script>
      {{-- CartView --}}


    <script>
        function tambahCart(idInpt, cls){
            var totalHargaBaru = 0;
            $.ajax({  
                type: "GET", 
                url: "/cariDataProduk/"+idInpt,
                success: function(response){
                    console.log(response.dataListProdukBaru);

                    var dataListProdukBaru = response.dataListProdukBaru.dataListProdukBaru;

                    console.log(dataListProdukBaru);

                    for(var i = 0; i< dataListProdukBaru.length; i++){
                        console.log("Data Ke : ", i, "Jumlah : ", dataListProdukBaru[i]["jumlah"])
                        console.log("Data Ke : ", i, "Harga : ", dataListProdukBaru[i]["get_produk"].hargaProduk)
                        var jumlahBarang = dataListProdukBaru[i]["jumlah"];
                        var harga = dataListProdukBaru[i]["get_produk"].hargaProduk;
                    
                        var tempJumlah = jumlahBarang * harga;
                        totalHargaBaru = totalHargaBaru + tempJumlah;
                        
                        let rupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalHargaBaru);
                        $('#totalBayar').html(rupiah);
                    }


                }

            })
        }
        // console.log("Total Harga Baru : ",totalHargaBaru)
    </script>

@endsection
