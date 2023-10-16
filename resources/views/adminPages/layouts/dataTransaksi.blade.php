<div class="ml-[13%] mt-4 mx-3">
    <div class="header flex flex-rows-2 w-full border-3">
        <div class="border w-full">
            <h1 class="text-xl font-semibold">Data Transaksi</h1>
        </div>
        <div class="ml-3">
            <div class="mb-2 relative w-[100%]">
                
            </div>
        </div>
    </div>  
    <div class="content mt-5">
        <div class="w-full rounded-md shadow-md">
            <table class="w-full pr-8"> 
                <thead class=" bg-white">
                    <tr class="border text-center">
                        <th>Id Transaksi</th>
                        <th>Nama Pemesan</th>
                        <th>Total Item</th>
                        <th>Total Bayar</th>
                        <th>Status Transaksi</th>
                        <th>Aksi</th>
                    </tr> 
                </thead>
                <tbody>
                    @foreach ($dataTransaksi as $itemTransaksi)

                        <tr class="border text-center"> 
                            <td class="py-2">
                                {{ $itemTransaksi->idTransaksi }}
                            </td>
                            <td class="py-2">
                                {{ $itemTransaksi->getUser['namaUser'] }}
                            </td>
                            <td class="py-2">
                                {{ $itemTransaksi->jumlahProduk }}
                            </td>
                            <td class="py-2">
                                <?php $harga = $itemTransaksi->totalHarga;
                                    echo "Rp. ". number_format($harga, 0, ".", ".");
                                ?>
                            </td>
                            <td class="py-2">
                                <?php if($itemTransaksi->statusTransaksi === 'Pending') {?>
                                    <button class="px-7 py-1 bg-gray-800 text-white rounded-md shadow-md">
                                        {{ $itemTransaksi->statusTransaksi }}
                                    </button>
                                <?php }elseif($itemTransaksi->statusTransaksi === "Lunas") {?>
                                    <button class="px-7 py-1 bg-gray-800 text-white rounded-md shadow-md">
                                        {{ $itemTransaksi->statusTransaksi }}
                                    </button>
                                <?php } ?>
                            </td> 
                            <td class="py-2">
                                <div class="grid grid-cols-2 gap-2">
                                    <button class="bg-green-500 px-5 py-1 text-white rounded-md shadow-md"
                                    onclick="modalTransaksi('Detail', '{{ $itemTransaksi->idTransaksi }}')">Detail</button>
                                    <button class="bg-red-500 px-5 py-1 text-white rounded-md shadow-md" onclick="hapusTransaksi('hapusData' ,'{{ $itemTransaksi->id }}')">Hapus</button>
                                </div> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
    {{-- Modal Hapus Data Transaksi --}}
    <button onclick="hapusTransaksi('closeHapus')" id="modalHapusTransaksi" class="bg-blue-500/20 hidden cursor-default w-full h-screen absolute z-40 top-0 left-0">

    </button>
    
    {{-- Modal Body --}}
    <div id="modalBody" class="w-full mx-auto z-50 absolute top-40 left-0 hidden">
        <div class="bg-white mx-auto w-[500px] h-full shadow-md rounded-md text-center pb-4">
            <h1 class="text-center text-yellow-400 text-[30px] my-2">Peringatan !!!</h1>
            <div class="text-[50px] border text-center bg-yellow-500 text-white w-20 h-20 mx-auto rounded-full">
                <i class="fa-solid fa-question"></i>
            </div>
            <h1 class="text-2xl font-semibold mt-1">Apakah Anda Ingin Menghapusnya...???</h1>
            <form action="/hapusTransaksi" method="post">
                @csrf
                <input type="text" name="idTransaksi" id="idTransaksi" hidden>
                <div class="mt-5 text-white">
                    <button type="submit" name="yHapus" id="yHapus" class="bg-blue-800 px-8 p-1 rounded-md shadow-md mr-2"> Ya </button>
                </form>
                <button type="button" name="nHapus" id="nHapus" class="bg-blue-800 px-8 p-1 rounded-md shadow-md ml-2" onclick="hapusTransaksi('closeHapus')"> Tidak </button>
            </div>
        </div>
    </div> 
    {{-- End Modal Body --}}

    {{-- End Modal Hapus Data Transaksi --}}
</div>

@include('adminPages.partials.modalDialogTransaksi') 

<script>
    
      // Modal Dialog Transaksi
      function modalTransaksi(e, b){
        
         
        if(e == 'Detail' && b == b){
            $.ajax({  
                type: "GET",
                url: "/detailTransaksi/"+b,
                success: function(response){ 
                    console.log(response);
                    console.log(response.detailProduk);
                    console.log(response.jumlahField);

                    var jumlah = response.jumlahField;

                    var data= response.detailProduk;
                    console.log("Detail Transaksi = " , response.detailTransaksi);
                    $('#idTransaksiModal').val(response.detailTransaksi['idTransaksi']);
                    $('#namaPemesan').val(response.detailTransaksi.get_user['namaUser']);
                    $('#jumlahPesanan').val(response.detailTransaksi['jumlahProduk']);

                    $('#totalBayar').val("Rp. " + response.detailTransaksi['totalHarga']);
                    $('#statusTransaksi').val(response.detailTransaksi['statusTransaksi']);

                    var date = new Date(response.detailTransaksi['updated_at']);
                    var newDate = date.toString('dd-mm-yy');

                    // $('#tglPemesanan').val(response.detailTransaksi['updated_at']);
                    
                    for(var i = 0; i < jumlah; i++){
                        document.getElementById("listDetailProduk").innerHTML += "<li class='grid grid-cols-3 w-full p-1 border-b-2 border-slate-300 mb-1'>" + "<h2>" + response.detailProduk[i]['get_produk'].idProduk + "</h2>" + "<h2>" + response.detailProduk[i]['get_produk'].namaProduk + "</h2>" + "<span class='text-xs text-slate-500 align-end justify-self-end pr-3'>" + "Jumlah : " + response.detailProduk[0].jumlah + "</span>" +"</li>";
                    }
                    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                    console.log(thrownError);
                }
            })

            // Show Modal
            $('#bgModalDetailTransaksi').removeClass('hidden');
            $('#modalDetailTransaksi').removeClass('hidden');

            

        }else if(e == 'CloseDetail'){


            document.getElementById("listDetailProduk").innerHTML -= "<li> - </li>";

            $('#bgModalDetailTransaksi').addClass('hidden');
            $('#modalDetailTransaksi').addClass('hidden');
        }
    }

    // Hapus Data Transaksi
    function hapusTransaksi(cls ,id){

        $('#idTransaksi').val(id);

        if(cls == 'hapusData' && id == id){
            $('#modalBody').removeClass('hidden');
            $('#modalHapusTransaksi').removeClass('hidden');
        }else if(cls == 'closeHapus'){
            $('#modalBody').addClass('hidden');
            $('#modalHapusTransaksi').addClass('hidden');
        }

    }

</script>
