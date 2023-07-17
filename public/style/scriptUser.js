$(document).on('click', '.btnEdituser', function(){
    console.log("Berhasil Edit");
    // console.log(id);
    var id = $(this).val();
    console.log(id);
    const content = $('#contentAdmin');
        $.ajax({ 
            type: "POST",
            url: "/updateDataUser",
            success: function(response){
                localStorage.setItem("Value Route", id);
                let route = localStorage.getItem("Value Route");

                $.get(route, function(data) {
                    content.html(data);
                });

            // let route = localStorage.getItem("Value Route");
            console.log("Value Route", id);
            // console.log(response.Message);
            }
        })
});


    $(document).on('click', '.tmbhUser', function() {
    var id = $(this).val();

    // console.log(id);
    const content = $('#contentAdmin');
    var form = $('#formDataUser')[0];
    // console.log(form);
    var formData = new FormData(form);
        $.ajax({ 
            type: "POST",
            url: "/createUser1", 
            processData: false,
            contentType: false,
            data: formData,
            // data: { 
            //     idUsers: $('#idUser').val(), 
            //     namaUsers: $('#namaUser').val(),
            //     username: $('#username').val(),
            //     password: $('#password').val(),
            //     profile: $('#profile').val(),
            //     status: $('#status').val(),
            //     email: $('#email').val(),
            //     _token: $('meta[name="csrf-token"]').attr('content') 
            // },
            success: function(response){
                localStorage.setItem("Value Route", id);
                let route = localStorage.getItem("Value Route");

                $.get(route, function(data) {
                    content.html(data);
                });
                
            // let route = localStorage.getItem("Value Route");
            console.log("Value Route", id);
            console.log(response);
            }
        })
        
    })

    function dropdownProduk(){
     $dropdown = document.getElementById("dropdown-produk");
     $dropdown.classList.toggle("hidden");
     $dropdown.classList.toggle("block");
    }
    

    // {{-- Modal Dialog --}}
       // Modal Dialog User
       function modal(e, b){
           
           if(e == 'Tambah'){
               console.log("Value : " + e);
               
               // Show Modal
               $('#bgModal').removeClass('hidden');
               $('#modalTambahUser').removeClass('hidden');

           }else if(e == 'Edit'){
               console.log("Value : " + e + b);

               // Show Modal 
               $('#bgModalEdit').removeClass('hidden');
               $('#modalEditUser').removeClass('hidden');

               $.ajax({  
                   type: "GET",
                   url: "/editDataUser/"+b,
                   success: function(response){
                       console.log("Response")
                       console.log(response.DataUser);

                       $('#idModalUser').val(response.DataUser.id);
                       $('#profileUserModal').val(response.DataUser.profile);
                       $('#idUserModal').val(response.DataUser.idUser);
                       $('#namaUserModal').val(response.DataUser.namaUser);
                       $('#passwordUserModal').val(response.DataUser.password);
                       $('#usernameModal').val(response.DataUser.username);
                       $('#statusModal').val(response.DataUser.status);
                       $('#emailModal').val(response.DataUser.email);

                   }
               })

           }else if(e == 'Close'){
                   console.log("Close Modal");
                   $('#bgModal').addClass('hidden');
                   $('#modalTambahUser').addClass('hidden');
           }else if(e == 'CloseEdit'){
               $('#bgModalEdit').addClass('hidden');
               $('#modalEditUser').addClass('hidden');
           }else if(e == "Hapus" && b == b){
               console.log("Value : " + e);

               // const id = $('.btnHapus').val();

               console.log(b)

               // Show Modal
               $('#idUser1').val(b);
               $('#bgModalHapus').removeClass('hidden');
               $('#modalHapusUser').removeClass('hidden');

           }else if(e == 'CloseHapus'){
               $('#bgModalHapus').addClass('hidden');
               $('#modalHapusUser').addClass('hidden');
           }
       }

     
       // Modal Dialog Barang 
       function modalBarang(e){
           if(e == 'Tambah'){
               console.log("Value : " + e);
               
               // Show Modal
               $('#bgModalBarang').removeClass('hidden');
               $('#modalTambahBarang').removeClass('hidden');

           }else if(e == 'Edit'){
               console.log("Value : " + e);

               // Show Modal
               $('#bgModalEdit').removeClass('hidden');
               $('#modalEditBarang').removeClass('hidden');

           }else if(e == 'Close'){
                   console.log("Close Modal");
                   $('#bgModalBarang').addClass('hidden');
                   $('#modalTambahBarang').addClass('hidden');

           }else if(e == 'CloseEdit'){
               $('#bgModalEdit').addClass('hidden');
               $('#modalEditBarang').addClass('hidden');
           }else if(e == "Hapus"){
               console.log("Value : " + e);

               const id = $('.btnHapus').val();

               // Show Modal
               $('#idBarang1').val(" Id User = "+ id);
               $('#bgModalHapus').removeClass('hidden');
               $('#modalHapusBarang').removeClass('hidden');
               
           }else if(e == 'CloseHapus'){
               $('#bgModalHapus').addClass('hidden');
               $('#modalHapusBarang').addClass('hidden');
           }
       }
    //    {{-- Swiper --}}
        
           var swiper = new Swiper(".mySwiper", {
               effect: "cards",
               grabCursor: true,
               autoplay: {
                   delay: 2500,
                   disableOnInteraction: false,
               },
           });
