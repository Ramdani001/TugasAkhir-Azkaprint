        // Stempel
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

        // All Produk
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

        // Undangan
        function modalUndangan(e, b){ 
            console.log("Value : " + b);
            if(e == "detailUndangan" && b == b){
                $.ajax({  
                  type: "GET",
                  url: "/detailProdukUndangan/"+b,
                  success: function(response){

                      // Show Modal
                      $('#bgmodalDetailUndangan').removeClass('hidden');
                      $('#modalDetailUndangan').removeClass('hidden');

                      console.log(response.dataDetailUndangan);

                      let rupiah = response.dataDetailUndangan.hargaProduk;
                      
                      let angka = response.dataDetailUndangan.hargaProduk;
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
                      
                      var FtoProduk = 'img/produk/' + response.dataDetailUndangan.fotoProduk;

                      $('#detailUndanganNamaProduk').html(response.dataDetailUndangan.namaProduk);
                      $("#fotoUndanganDetailProduk").attr('src',FtoProduk);
                      $('#hargaUndanganDetailProduk').html(rupiah);

                }
              });
            }else if(e == 'CloseDetail'){
              console.log("Close Modal");
              $('#bgmodalDetailUndangan').addClass('hidden');
              $('#modalDetailUndangan').addClass('hidden');
            }

        };

        // Banner
        function modalBanner(e, b){ 
            console.log("Value : " + b);
            if(e == "detailBanner" && b == b){
                $.ajax({  
                  type: "GET",
                  url: "/detailProdukBanner/"+b,
                  success: function(response){

                      // Show Modal
                      $('#bgmodalDetailBanner').removeClass('hidden');
                      $('#modalDetailBanner').removeClass('hidden');

                      console.log(response.dataDetailBanner);

                      let rupiah = response.dataDetailBanner.hargaProduk;
                      
                      let angka = response.dataDetailBanner.hargaProduk;
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
                      
                      var FtoProduk = 'img/produk/' + response.dataDetailBanner.fotoProduk;

                      $('#detailBannerNamaProduk').html(response.dataDetailBanner.namaProduk);
                      $("#fotoBannerDetailProduk").attr('src',FtoProduk);
                      $('#hargaBannerDetailProduk').html(rupiah);

                }
              });
            }else if(e == 'CloseDetail'){
              console.log("Close Modal");
              $('#bgmodalDetailBanner').addClass('hidden');
              $('#modalDetailBanner').addClass('hidden');
            }

        };
        
        // X-Banner
        function modalXBanner(e, b){ 
            console.log("Value : " + b);
            if(e == "detailXBanner" && b == b){
                $.ajax({  
                  type: "GET",
                  url: "/detailProdukXBanner/"+b,
                  success: function(response){

                      // Show Modal
                      $('#bgmodalDetailXBanner').removeClass('hidden');
                      $('#modalDetailXBanner').removeClass('hidden');

                      console.log(response.dataDetailXBanner);

                      let rupiah = response.dataDetailXBanner.hargaProduk;
                      
                      let angka = response.dataDetailXBanner.hargaProduk;
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
                      
                      var FtoProduk = 'img/produk/' + response.dataDetailXBanner.fotoProduk;

                      $('#detailXBannerNamaProduk').html(response.dataDetailXBanner.namaProduk);
                      $("#fotoXBannerDetailProduk").attr('src',FtoProduk);
                      $('#hargaXBannerDetailProduk').html(rupiah);

                }
              });
            }else if(e == 'CloseDetail'){
              console.log("Close Modal");
              $('#bgmodalDetailXBanner').addClass('hidden');
              $('#modalDetailXBanner').addClass('hidden');
            }

        };

        // Lanyard
        function modalLanyard(e, b){ 
            console.log("Value : " + b);
            if(e == "detailLanyard" && b == b){
                $.ajax({  
                  type: "GET",
                  url: "/detailProdukLanyard/"+b,
                  success: function(response){

                      // Show Modal
                      $('#bgmodalDetailLanyard').removeClass('hidden');
                      $('#modalDetailLanyard').removeClass('hidden');

                      console.log(response.dataDetailLanyard);

                      let rupiah = response.dataDetailLanyard.hargaProduk;
                      
                      let angka = response.dataDetailLanyard.hargaProduk;
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
                      
                      var FtoProduk = 'img/produk/' + response.dataDetailLanyard.fotoProduk;

                      $('#detailLanyardNamaProduk').html(response.dataDetailLanyard.namaProduk);
                      $("#fotoLanyardDetailProduk").attr('src',FtoProduk);
                      $('#hargaLanyardDetailProduk').html(rupiah);

                }
              });
            }else if(e == 'CloseDetail'){
              console.log("Close Modal");
              $('#bgmodalDetailLanyard').addClass('hidden');
              $('#modalDetailLanyard').addClass('hidden');
            }

        };

        // Id Card
        function modalIdCard(e, b){ 
            console.log("Value : " + b);
            if(e == "detailIdCard" && b == b){
                $.ajax({  
                  type: "GET",
                  url: "/detailProdukIdCard/"+b,
                  success: function(response){

                      // Show Modal
                      $('#bgmodalDetailIdCard').removeClass('hidden');
                      $('#modalDetailIdCard').removeClass('hidden');

                      console.log(response.dataDetailIdCard);

                      let rupiah = response.dataDetailIdCard.hargaProduk;
                      
                      let angka = response.dataDetailIdCard.hargaProduk;
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
                      
                      var FtoProduk = 'img/produk/' + response.dataDetailIdCard.fotoProduk;

                      $('#detailIdCardNamaProduk').html(response.dataDetailIdCard.namaProduk);
                      $("#fotoIdCardDetailProduk").attr('src',FtoProduk);
                      $('#hargaIdCardDetailProduk').html(rupiah);

                }
              });
            }else if(e == 'CloseDetail'){
              console.log("Close Modal");
              $('#bgmodalDetailIdCard').addClass('hidden');
              $('#modalDetailIdCard').addClass('hidden');
            }

        };