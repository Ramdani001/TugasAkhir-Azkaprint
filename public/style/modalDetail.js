
        function modalStempel(e, b){ 
            console.log("Value : " + b);
            if(e == "DetailStempel" && b == b){
                $.ajax({  
                  type: "GET",
                  url: "/detailStempel/"+b,
                  success: function(response){

                      // Show Modal
                      $('#bgModalProduk').removeClass('hidden');
                      $('#modalDetailStempel').removeClass('hidden');

                      console.log(response.output);

                      let rupiah = response.dataDetailstempel.hargaProduk;
                      
                      let angka = response.dataDetailstempel.hargaProduk;
                      rupiah = formatRupiah(angka, 'Rp. ');

                      /* Fungsi formatRupiah */
                      function formatRupiah(angka, prefix){
                            var number_string = String(angka).replace(/[^,\d]/g, ''),
                            split   		= number_string.split(','),
                            sisa     		= split[0].length % 3,
                            rupiah     		= split[0].substr(0, sisa),
                            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
                      
                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                            if(ribuan){
                              separator = sisa ? '.' : '';
                              rupiah += separator + ribuan.join('.');
                            }
                      
                            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
                          }
                      // Detail Produk
                          
                      var FtoProduk = 'img/produk/' + response.dataDetailstempel.fotoProduk;

                      $("#fotoDetailProduk").attr('src',FtoProduk);
                      $('#detailNamaProduk').html(response.dataDetailstempel.namaProduk);
                      $('#hargaDetailProduk').html(rupiah);

                }
              });
            }else if(e == 'CloseDetail'){
              console.log("Close Modal");
              $('#bgModalProduk').addClass('hidden');
              $('#modalDetailStempel').addClass('hidden');

              const content = $('#contentProduk');
              let route = "stempel";

              $.get(route, function(data) {
                    content.html(data);
              });

            }

        };
        // Undangan
        function modalAllproduk(e, b){ 
            console.log("Value : " + b);
            if(e == "allProduk" && b == b){
                $.ajax({  
                  type: "GET",
                  url: "/detailAllProduk/"+b,
                  success: function(response){

                      // Show Modal
                      $('#bgmodalDetailAll').removeClass('hidden');
                      $('#modalDetailAll').removeClass('hidden');

                      console.log(response.dataAllDetail);

                      let rupiah = response.dataAllDetail.hargaProduk;
                      
                      let angka = response.dataAllDetail.hargaProduk;
                      rupiah = formatRupiah(angka, 'Rp. ');

                      /* Fungsi formatRupiah */
                      function formatRupiah(angka, prefix){
                            var number_string = String(angka).replace(/[^,\d]/g, ''),
                            split   		= number_string.split(','),
                            sisa     		= split[0].length % 3,
                            rupiah     		= split[0].substr(0, sisa),
                            ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);
                      
                            // tambahkan titik jika yang di input sudah menjadi angka ribuan
                            if(ribuan){
                              separator = sisa ? '.' : '';
                              rupiah += separator + ribuan.join('.');
                            }
                      
                            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                            return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
                          }
                      // Detail Produk
                      
                      var FtoProduk = 'img/produk/' + response.dataAllDetail.fotoProduk;

                      $('#detailAllNamaProduk').html(response.dataAllDetail.namaProduk);
                      $("#fotoAllDetailProduk").attr('src',FtoProduk);
                      $('#hargaAllDetailProduk').html(rupiah);

                }
              });
            }else if(e == 'CloseDetail'){
              console.log("Close Modal");
              $('#bgmodalDetailAll').addClass('hidden');
              $('#modalDetailAll').addClass('hidden');
            }

        };