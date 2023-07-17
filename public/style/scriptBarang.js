    $(document).on('click', '.btnTambahBrng', function() {
        var id = $(this).val();
        localStorage.setItem("Value Route", id);
    });
       // Modal Dialog Barang 
       function modalBarang(e, b){
        if(e == 'Tambah'){
            console.log("Value : " + e);
            
            // Show Modal
            $('#bgModalBarang').removeClass('hidden');
            $('#modalTambahBarang').removeClass('hidden');

        }else if(e == 'Edit' && b == b){
            console.log("Value : " + e);
 
            // Show Modal
            $('#bgModalEdit').removeClass('hidden');
            $('#modalEditBarang').removeClass('hidden');

            $.ajax({  
                type: "GET",
                url: "/editDataBarang/"+b,
                success: function(response){

                    $('#idPKBarang').val(response.dataBarang.id)
                    $('#idModalBarang').val(response.dataBarang.idBarang);
                    $('#namaModalBarang').val(response.dataBarang.namaBarang);
                    $('#tipeModalBarang').val(response.dataBarang.tipeBarang);
                    $('#jumlahModalBarang').val(response.dataBarang.jumlahBarang);

                    console.log("Response")
                    console.log(response.dataBarang);

                }
            })
 
        }else if(e == 'Close'){
                console.log("Close Modal");
                $('#bgModalBarang').addClass('hidden');
                $('#modalTambahBarang').addClass('hidden');

        }else if(e == 'CloseEdit'){
            $('#bgModalEdit').addClass('hidden');
            $('#modalEditBarang').addClass('hidden');
        }else if(e == "Hapus" && b == b){
            console.log("Value : " + e);

            const id = $('.btnHapus').val();

            // Show Modal
            $('#idBarang1').val(b);
            $('#bgModalHapus').removeClass('hidden');
            $('#modalHapusBarang').removeClass('hidden');
            
        }else if(e == 'CloseHapus'){
            $('#bgModalHapus').addClass('hidden');
            $('#modalHapusBarang').addClass('hidden');
        }
    }