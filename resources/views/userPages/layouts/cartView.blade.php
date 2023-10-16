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
                                    <?php 
                                        $jmlh = $data->jumlah;
                                        if($jmlh > 0){ 
                                    ?>
                                        <input type="number" name="jumlahPesanan" id="jumlahPesanan" class=" border-slate-400 border bg-slate-300" value= "{{ $jmlh }}" readonly >

                                        <div class="grid grid-cols-2 gap-3 mt-1">
                                            <button class="px-1 py-1 bg-gray-200 shadow-md" onclick="updateCart({{ $data->id }}, 'Tambah')" >+</button>
                                            <button class="px-1 py-1 bg-gray-200 shadow-md" onclick="updateCart({{ $data->id }}, 'Kurang')">-</button>
                                        </div>

                                    <?php
                                         }else if ($jmlh <= 0){
                                    ?>
                                         <input type="number" name="jumlahPesanan" id="jumlahPesanan" class=" border-slate-400 border bg-slate-300" value= "{{ $jmlh }}" readonly >

                                         <div class="grid grid-cols-2 gap-3 mt-1">
                                             <button class="px-1 py-1 bg-gray-200 shadow-md" onclick="updateCart({{ $data->id }}, 'Tambah')" >+</button>
                                             <button class="px-1 py-1 shadow-md bg-gray-400" disabled onclick="updateCart({{ $data->id }}, 'Kurang')">-</button>
                                         </div>

                                    <?php } ?>
                                    
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
                            <button class="mt-[180px] absolute text-md font-semibold w-[270px] h-10 bg-yellow-400"
                            onclick="konfirmasiBayar('Bayar', {{ Auth::user()->id }})"
                            >Konfirmasi</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- onclick="konfirmasiBayar('Bayar',{{ Auth::user()->id }})" --}}
    
    {{-- Modal Dialog Pembayaran --}}
    
    <button class="w-full h-screen top-0 left-0 bg-blue-800/30 absolute z-10 bgModal hidden transition-colors duration-700 ease-linear" id="bgModalBayar">

    </button>

    <div id="ModalBayar" class="h-screen w-full  absolute top-0 left-0 z-50 hidden transition-transform duration-700 ease-linear">
        <div class="flex justify-center mt-8">
            <div class="bg-slate-100 shadow-lg p-5 w-[500px] rounded-md shadow-black ">
                <h1 class="text-xl font-semibold">Konfirmasi Pemesanan</h1>
                <hr>
                <div class="mt-3">
                <form action="/pesan" method="get">
                        @csrf 
                        <div class="w-full shadow-md flex text-md font-semibold text-xl mb-2">
                            <label>Id Transaksi : </label>
                            <input type="text" name="idTransaksiModal" id="idTransaksiModal" class="bg-transparent ml-1" value="TRI-0002">
                        </div>
                        @foreach ($dataListProduk as $cart => $data)
                        
                        <div class="grid grid-cols-3 gap-2 mb-2 w-full">
                            <div class="">
                                <h1 class="font-bold text-xl">
                                    {{ $data->getProduk['namaProduk'] }}
                                </h1>
                            </div>
                            <div class="ml-8">
                                <h1>Harga </h1>
                                <span class="font-bold italic w-full">
                                    <?php $harga = $data->getProduk['hargaProduk'];
                                        echo "Rp. ". number_format($harga, 0, ".", ".");
                                    ?>
                                </span>
                            </div>
                            <div>
                                <h1>Jumlah</h1>
                                <?php 
                                    $jmlh = $data->jumlah;
                                    if($jmlh > 0){ 
                                ?>
                                <label>
                                    {{ $jmlh }}x
                                </label>
                                     
                                <?php } ?>
                                
                                <input type="text" class="hidden" name="jumlahPesanan{{ $data->getProduk['id'] }}" id="jumlahPesanan{{ $data->getProduk['id'] }}" class="border-slate-400 border"
                               
                                value= "{{ $data->jumlah }}"
                                >
                            </div>
                            
                        </div>

                        @endforeach
                        <hr>
                        <div class="flex text-xl font-semibold justify-between">
                            <span class="mr-2">Total Bayar</span>
                            <span class="" id=totalBayarPesan></span>
                        </div>
                        <div class="flex w-full mt-3">
                            <button type="button" onclick="konfirmasiBayar('CloseModal')" class="py-1 w-full bg-gray-800 rounded-md text-white shadow-md mr-2 btnBatalModalBarang" id="btnBatalBarang">Batal</button>
                            <button type="button" id="pay-button" class="py-1 w-full bg-blue-800 rounded-md text-white shadow-md">Pesan</button>
                        </div>
                </form>
                </div>
            </div>
        </div>
    </div>
    {{-- End Modal Dialog Pembayaran --}}



    {{-- Loading  --}}
    
    <div id="loading" class="z-[100] hidden fixed w-full h-screen bg-gray-800/80 ease-linear duration-[3500ms]">
        <div id="text-loading" class="text-center mt-[25%] animate-water text-white  font-bold text-5xl">
          <span class="border-double border-blue-500" style="--i:1">A</span>
          <span class="border-double border-blue-500" style="--i:2">Z</span>
          <span class="border-double border-blue-500" style="--i:3">K</span>
          <span class="border-double border-blue-500" style="--i:4">A</span>
          <span class="border-double border-blue-500" style="--i:5">P</span>
          <span class="border-double border-blue-500" style="--i:6">R</span>
          <span class="border-double border-blue-500" style="--i:7">I</span>
          <span class="border-double border-blue-500" style="--i:8">N</span>
          <span class="border-double border-blue-500" style="--i:9">T</span>
          <span style="--i:10">&nbsp;</span>
          <span style="--i:11">.</span>
          <span style="--i:12">&nbsp;</span>
          <span style="--i:13">.</span>
          <span style="--i:14">&nbsp;</span>
          <span style="--i:15">.</span>
    </div>
       
    {{-- Loading  --}}



    {{-- CartView --}}
    {{-- Jquery --}}
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
          $('#totalBayarPesan').html(rupiah);

          $('#jumlahPesanan'+idProduk).val(jumlahOrder);

        }

        

    </script>
      {{-- CartView --}}

    <script>
        // TambahCart
        var totalHargaBaru = 0;
        tempJumlah = 0
        var snapToken = ""
        function updateCart(idInpt, cls){
                if(cls == "Tambah"){
                    
                    $.ajax({  
                    type: "GET", 
                    url: "/cartTmbh/"+idInpt,
                    success: function(response){
                        console.log(response.dataListProdukBaru);

                        var dataListProdukBaru = response.dataListProdukBaru.dataListProdukBaru;
                        var jumlahBaru = response.hasilProduk.jumlah;
                        var id = response.hasilProduk.id;
                        
                        
                        for(var i = 0; i< dataListProdukBaru.length; i++){
                            
                            var jumlahBarang = dataListProdukBaru[i]["jumlah"];
                            var harga = dataListProdukBaru[i]["get_produk"].hargaProduk;
                        
                            if(jumlahBarang > 0){
                                tempJumlah = jumlahBarang * harga;
                                totalHargaBaru = totalHargaBaru + tempJumlah;
                            }else if (jumlahBarang < 0){
                                tempJumlah = 0 * harga;
                                totalHargaBaru = totalHargaBaru + tempJumlah;
                            }
                            
                            if(jumlahBarang > 0){
                                let rupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalHargaBaru);
                                $('#totalBayar').html(rupiah);
                                $('#jumlahPesanan').val(jumlahBarang);
                            }else if(jumlahBarang < 0){
                                let rupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalHargaBaru);
                                $('#totalBayar').html(rupiah);
                                $('#jumlahPesanan').val(jumlahBarang);
                            }
                        }
                        location.reload();

                    }

                })
            }else if(cls == "Kurang"){
                console.log("Id Input : ", idInpt);
                console.log("Class : ", cls); 
                
                $.ajax({  
                    type: "GET", 
                    url: "/cartKrng/"+idInpt,
                    success: function(response){
                        console.log(response.dataListProdukBaruKrng);

                        var dataListProdukBaruKrng = response.dataListProdukBaruKrng.dataListProdukBaruKrng;
                        var jumlahBaru = response.hasilProdukKrng.jumlah;
                        
                        
                        for(var i = 0; i< dataListProdukBaruKrng.length; i++){
                            
                            var jumlahBarang = dataListProdukBaruKrng[i]["jumlah"];
                            var harga = dataListProdukBaruKrng[i]["get_produk"].hargaProduk;
                        
                            var tempJumlah = jumlahBarang * harga;
                            totalHargaBaru = totalHargaBaru + tempJumlah;
                            
                            let rupiah = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(totalHargaBaru);
                            $('#totalBayar').html(rupiah);
                            $('#jumlahPesanan').val(jumlahBarang);
                        }


                    }
                })
                location.reload();
                

            }
        }

    </script>

    {{-- Modal Pesan --}}
    <script>
        function konfirmasiBayar(cls,idUser){
            if(cls =='Bayar'){
                $('#loading').removeClass('hidden');
                console.log("Id User Yang DIkirim : ", idUser);
                $.ajax({  
                    type: "GET", 
                    url: "/cart_pesan/"+idUser,
                    success: function(response){

                        snapToken = response.snapToken;

                        console.log(response);
                        console.log(response.dataKeranjang);

                        $('#loading').addClass('-mt-[2000px]');

                        $('#bgModalBayar').removeClass('hidden');
                        $('#ModalBayar').removeClass('hidden');

                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        console.log(xhr.responseText);
                        console.log(thrownError);
                    }
                })
            }else if(cls == 'CloseModal'){
                location.reload();
                $('#bgModalBayar').addClass('hidden');
                $('#ModalBayar').addClass('hidden');
                
            }
        }
    </script>
    {{-- Modal Pesan --}}
{{-- Jquery --}}
<script src="{{ 'style/jquery.js' }}"></script> 
<script src="{{ 'style/jquery.min.js' }}"></script> 
{{-- Payment Gateway --}}
    {{-- Payment Gateway --}} 
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
    
    <script type="text/javascript">
      // For example trigger on button clicked, or any time you need
      var payButton = document.getElementById('pay-button');

      payButton.addEventListener('click', function () {
        // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
        window.snap.pay(snapToken, {
          onSuccess: function(result){
            alert("payment success!");
            
            $.ajax({  
                type: "POST", 
                url: "/api/callback_transaksi",
                data: {
                    'result':result
                },

                
                success: function(response){
                    console.log("Hasil Response -> ", response);
                    // console.log("Request All -> ", response.request);
                }, 

                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                    console.log(thrownError);
                }
            })

          },
          onPending: function(result){
            /* You may add your own implementation here */
            alert("wating your payment!"); console.log(result);
          },
          onError: function(result){
            /* You may add your own implementation here */
            alert("payment failed!"); console.log(result);
          },
          onClose: function(){
            /* You may add your own implementation here */
            alert('you closed the popup without finishing the payment');
          }
        })
      });
    </script>
    
    {{-- Payment Gateway --}}

    
@endsection
