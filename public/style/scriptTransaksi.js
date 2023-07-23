
      // Modal Dialog Transaksi
      function modalTransaksi(e, b){
        if(e == 'Tambah'){
            console.log("Value : " + e);
            
            // Show Modal
            $('#bgModalTransaksi').removeClass('hidden');
            $('#modalTambahTransaksi').removeClass('hidden');

        }else if(e == 'Detail' && b == b){
            console.log("Value : " + e);
            console.log("Id Transaksi : " + b);

            // Show Modal
            $('#bgModalEditTransaksi').removeClass('hidden');
            $('#modalDetailTransaksi').removeClass('hidden');

            // var form = $('#formEditTransaksi')[0];
            // console.log(form);
            // var formData = new FormData(form);

            // $.ajax({  
            //     type: "GET",
            //     url: "/editDataTransaksi/"+b,
            //     processData: false,
            //     contentType: false,
            //     data: formData,
            //     success: function(response){

            //         var TransaksiLama = 'img/Transaksi/' + response.dataTransaksi.fotoTransaksi;

            //         $('#idPK').val(response.dataTransaksi.id)
            //         $('#idModalTransaksi').val(response.dataTransaksi.idTransaksi);
            //         $('#namaModalTransaksi').val(response.dataTransaksi.namaTransaksi);
            //         $('#tipeModalTransaksi').val(response.dataTransaksi.tipeTransaksi);
            //         $('#jumlahModalTransaksi').val(response.dataTransaksi.jumlahTransaksi);
            //         $('#hargaModalTransaksi').val(response.dataTransaksi.hargaTransaksi);
            //         $('#fotoTransaksiLama').val(response.dataTransaksi.fotoTransaksi);
            //         $("#gambarLama").attr('src',TransaksiLama);


            //         console.log("Response")
            //         console.log(response.dataTransaksi);

            //     }
            // })

        }else if(e == 'Close'){
                console.log("Close Modal");
                $('#bgModalTransaksi').addClass('hidden');
                $('#modalTambahTransaksi').addClass('hidden');

        }else if(e == 'CloseEdit'){
            $('#bgModalEdit').addClass('hidden');
            $('#modalEditTransaksi').addClass('hidden');
        }else if(e == "Hapus" && b == b){
            console.log("Value : " + e);
            console.log("Id Transaksi : " + b);
 
            // const id = $('.btnHapus').val();

            // Show Modal
            $('#idTransaksi1').val(b);
            $('#bgModalHapus').removeClass('hidden');
            $('#modalHapusTransaksi').removeClass('hidden');
            
        }else if(e == 'CloseHapus'){
            $('#bgModalHapus').addClass('hidden');
            $('#modalHapusTransaksi').addClass('hidden');
        }
    }
