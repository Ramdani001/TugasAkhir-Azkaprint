$(document).on('click', '.btnTmbhProduk', function() {
    var id = $(this).val();
    
    localStorage.setItem("Value Route", id);
        
    })


      // Modal Dialog Produk
      function modalProduk(e, b){
        if(e == 'Tambah'){
            console.log("Value : " + e);
            
            // Show Modal
            $('#bgModalProduk').removeClass('hidden');
            $('#modalTambahProduk').removeClass('hidden');

        }else if(e == 'Edit' && b == b){
            console.log("Value : " + e);
            console.log("Id Produk : " + b);

            // Show Modal
            $('#bgModalEdit').removeClass('hidden');
            $('#modalEditProduk').removeClass('hidden');

            var form = $('#formEditProduk')[0];
            // console.log(form);
            var formData = new FormData(form);

            $.ajax({  
                type: "GET",
                url: "/editDataProduk/"+b,
                processData: false,
                contentType: false,
                data: formData,
                success: function(response){

                    var produkLama = 'img/produk/' + response.dataProduk.fotoProduk;

                    $('#idPK').val(response.dataProduk.id)
                    $('#idModalProduk').val(response.dataProduk.idProduk);
                    $('#namaModalProduk').val(response.dataProduk.namaProduk);
                    $('#tipeModalProduk').val(response.dataProduk.tipeProduk);
                    $('#jumlahModalProduk').val(response.dataProduk.jumlahProduk);
                    $('#hargaModalProduk').val(response.dataProduk.hargaProduk);
                    $('#fotoProdukLama').val(response.dataProduk.fotoProduk);
                    $("#gambarLama").attr('src',produkLama);


                    console.log("Response")
                    console.log(response.dataProduk);

                }
            })

        }else if(e == 'Close'){
                console.log("Close Modal");
                $('#bgModalProduk').addClass('hidden');
                $('#modalTambahProduk').addClass('hidden');

        }else if(e == 'CloseEdit'){
            $('#bgModalEdit').addClass('hidden');
            $('#modalEditProduk').addClass('hidden');
        }else if(e == "Hapus" && b == b){
            console.log("Value : " + e);
            console.log("Id Produk : " + b);
 
            // const id = $('.btnHapus').val();

            // Show Modal
            $('#idProduk1').val(b);
            $('#bgModalHapus').removeClass('hidden');
            $('#modalHapusProduk').removeClass('hidden');
            
        }else if(e == 'CloseHapus'){
            $('#bgModalHapus').addClass('hidden');
            $('#modalHapusProduk').addClass('hidden');
        }
    }
