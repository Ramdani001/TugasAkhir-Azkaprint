@extends('adminPages.main')

@section('contentManager')

    <div class="ml-[15%] mt-4 mx-3">
        <div class="">
            <h1 class="text-2xl font-semibold font-sans">Welcome To Dashboard</h1>
            <h5 class="italic text-sm font-serif text-slate-400">Home/ Project Dashboard</h5>
        </div>
        <div class="flex mt-3 ,">
            <div class="bg-[url('../../public/img/bgTitleAdmin.jpg')] mb-4 w-full rounded-md h-32 bg-cover shadow-md">
                 <img src="{{ 'img/ilustrasi3.png' }}" alt="ilustrasi" class="absolute w-44 -mt-7 ml-5">
                 <div class="ml-52 mt-5 text-white">
                    <h1 class="text-2xl font-semibold"> {{ Auth::user()->namaUser }} </h1>
                    <p class="italic text-sm text-slate-300">
                        Hadapilah Dengan Senyuman, <br> Semuanya Akan Baik Pada Waktu Yang Tepat . . .
                    </p>
                 </div>
                 <div class="bg-white w-full mt-12 h-[500px] rounded-md shadow-md p-4 mb-5 pb-3">
                    <div class="grid grid-cols-2">
                        <div>
                            <h1 class="text-md font-semibold font-sans">
                                Penjualan
                            </h1>
                            <p class="italic text-sm text-slate-400">
                                Grafik untuk menampilkan penjualan setiap bulannya . . .
                            </p>
                        </div>
                    </div>
                    <div class="grid grid-cols-4 gap-2">
                        {{-- Order Type --}}
                        <div class="grid grid-cols-1">
                            <label> Order By : </label>
                            <select onchange="orderType()" name="orderType" id="orderType" class="border mb-1 shadow-md px-2 text-sm h-full text-center">
                                <option selected="selected">-- Order Type --</option>
                                <option value="Tahun"> Tahun </option>
                                <option value="Bulan"> Bulan </option>
                                <option value="Tanggal"> Tanggal </option>
                            </select>
                        </div>
                        {{-- Order Type --}}
                        <div name="pertanggal" id="pertanggal" class="w-full grid-cols-2 gap-2 col-span-2 hidden">                      
                                <div>
                                    <label for="">Date From : </label>
                                    <input type="date" name="dataDateFrom" id="dataDateFrom" class="w-full px-2 border border-slate-300 shadow-md text-slate-500">
                                </div>

                                <div>
                                    <label for="">Date To : </label>
                                    <input type="date" name="dataDateTo" id="dataDateTo" class="w-full px-2 border border-slate-300 shadow-md text-slate-500">
                                </div>

                                {{-- <div>
                                    <button onclick="filterDate()" class="text-md font-semibold px-5 py-1 bg-blue-800 w-full text-white rounded-md shadow-md">Filter</button>
                                </div> --}}
                        </div>
                        <div name="bulanTahun" id="bulanTahun" class="grid-cols-2 col-span-2 justify-items-center hidden">
                            {{-- Type Tahun --}}
                            <div name="filterTahun" id="filterTahun" class="mr-4">
                                <label>Tahun : </label>
                                <select name="dataTahun" id="dataTahun" class="border mb-1 shadow-md px-2 text-sm h-[50%]">
                                    <option value="">-- Tahun --</option>
                                        <?php
                                            for($i=date('Y'); $i>=date('Y')-32; $i-=1){
                                            echo "<option value='$i'> $i </option>";
                                            }
                                        ?>
                                </select>
                            </div>
                            {{-- Type Tahun --}}
                            {{-- Type Bulan --}}
                            <div class="mr-4" name="filterBulan" id="filterBulan">
                                <label>Bulan :</label>
                                <select name="dataBulan" id="dataBulan" class="border mb-1 shadow-md px-2 text-sm h-[50%]">
                                    <option value="">-- Bulan --</option>
                                    <option value="1">-- Januari --</option>
                                    <option value="2">-- Februari --</option>
                                    <option value="3">-- Maret --</option>
                                    <option value="4">-- April --</option>
                                    <option value="5">-- Mei --</option>
                                    <option value="6">-- Juni --</option>
                                    <option value="7">-- Juli --</option>
                                    <option value="8">-- Agustus --</option>
                                    <option value="9">-- September --</option>
                                    <option value="10">-- Oktober --</option>
                                    <option value="11">-- November --</option>
                                    <option value="12">-- Desember --</option>    
                                </select>
                            </div>
                            {{-- Type Bulan --}}
                            
                        </div>
                        <div class="ml-5">
                            <label class="invisible">Button Filter</label>
                            <button onclick="filterGrafikChart()" class="text-md font-semibold px-5 py-1 bg-blue-800 text-white rounded-md shadow-md">Filter</button>
                        </div>
                    </div>
                    {{-- Chart Js --}}
                    <div class="w-full"> 
                        <canvas id="myChart" class=""></canvas>
                    </div>
                 </div>
            </div>
            <div class="grid grid-col-2">
                <div class="bg-white w-80 ml-5 rounded-md h-80 shadow-md p-3">
                    <h1 class="text-md font-serif font-semibold ">Laporan</h1>
                    <hr class="w-8 mb-3">
                    <?php
                        for($i=0; $i < 3; $i++){
                    ?>
                    <div class="flex rounded-md w-full h-16 shadow-md p-2 border mb-2">
                        <div class="bg-gray-400 rounded-full w-10 h-10">

                        </div>
                        <div class="ml-3">
                            <h1 class="text-md font-semibold">Rizkan</h1>
                            <p class="text-xs text-slate-400">
                                Pesanan : <span class=" italic">1 Produk</span>
                            </p>
                        </div>
                        <div class="text-xs italic self-start ml-14 text-slate-400">
                            <h5>07/13/2023</h5>
                        </div>
                    </div>
                    <?php } ?>

                </div>
                <div class="bg-white mt-3 w-80 ml-5 rounded-md h-32 shadow-md p-3">
                    <h1 class="text-sm font-semibold">Penjualan Hari Ini</h1>
                    <hr class="w-10 mb-3">
                    @php
                        $jualProduk = 0;
                        $jmlhPrdk = $produkJual->count();
                    @endphp
                    @for ($i=0; $i < $jmlhPrdk; $i++)
                        @php
                            $jualProduk += $produkJual[$i]['jumlahProduk'];
                        @endphp
                    @endfor

                    <h2 class="text-2xl font-semibold" id="jumlahItemJual">{{ $jualProduk }} Item's</h2>
                    <input class="text-xs text-slate-400" id="dateTotalJual" class="dateTotalJual" readonly>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ 'style/chart.js' }}"></script>
    {{-- <script src="{{'path/to/chartjs/dist/chart.umd.js'}}"></script> --}}
    <script> 
 
    const months = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
          const date = new Date();
          const day = date.getDate();
          let month = months[date.getMonth()];
          const year  = date.getFullYear();
          const fullDate = day + " - " + month + " - " + year;
          
          // Today's Sale 
          document.getElementById('dateTotalJual').value = fullDate;
          document.getElementById('dateTotalJual').value = fullDate;

    </script>
    <script>
        var typeFilter;
        function orderType(){
            $orderType = $('#orderType').val();
            $filterTahun = $('#filterTahun');
            $filterBulan = $('#filterBulan');
            $pertanggal = $('#pertanggal');
            $bulanTahun = $('#bulanTahun');

            // console.log("Order Type =>",$orderType);

                if($orderType !== "Tanggal"){
                    typeFilter = "bulanTahun";
                    $bulanTahun.removeClass('hidden').addClass('grid');
                    $pertanggal.addClass('hidden').removeClass('grid');
                    if($orderType == "Tahun"){
                        $filterTahun.removeClass('invisible');

                        $filterBulan.addClass('invisible');

                        $('#dataTahun').val("");
                        $('#dataBulan').val("");

                    }else if($orderType == "Bulan"){
                        $filterTahun.removeClass('invisible');
                        $filterBulan.removeClass('invisible');

                        $('#dataTahun').val("");
                        $('#dataBulan').val("");


                    }else if($orderType == "Minggu"){

                        $('#dataTahun').val("");
                        $('#dataBulan').val("");

                        $filterTahun.removeClass('invisible');
                        $filterBulan.removeClass('invisible');
                    }
                }else{
                    typeFilter = "pertanggal";
                    $bulanTahun.removeClass('grid').addClass('hidden');
                    $pertanggal.removeClass('hidden').addClass('grid');
                }

        }

        function filterGrafikChart (){
            $dataTahun = $('#dataTahun').val();
            $dataBulan = $('#dataBulan').val();
            var dateFrom = $('#dataDateFrom').val();
            var dateTo = $('#dataDateTo').val();
            $pertanggal = $('#pertanggal');

            // var day = dateFrom.getDate();
            // var month = dateFrom.getMonth() + 1;
            // var year = dateFrom.getFullYear();
            // var dataDateFrom = [day, month, year].join('/');

            var bulanTahun = [];
            var dataFilterDate = [];

            var dataFilterBulanTahun = [];

            console.log("Class List :", typeFilter);
            if(typeFilter === "bulanTahun"){
                
                if(($dataTahun && $dataBulan).length !== 0){
                    console.log("Data Tahun & Data Bulan");

                     // console.log("Full");
                     dataFilterBulanTahun.push($dataTahun, $dataBulan);

                        $.ajax({
                            type: "POST",
                            url: "/bulanTahunFilter",
                            method: 'post',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }, 
                            data: {
                                "dataFilter": dataFilterBulanTahun,
                            },
                            success: function(response){
                                console.log("Ini Post Response", response.data);
                                console.log("Ini Response", response.dataOrderFilter);
                                console.log("Total Data :", response.dataLength);

                            // Grafik
                            var updateChart = [];
                            var tempLabel = [];
                            labelChart = [];
                            
                            for ($i=0; $i < response.jmlhOrderFilter; $i++) {
                                updateChart.push(response.dataOrderFilter[$i]['totalHarga']);
                                tempLabel.push(response.dataOrderFilter[$i]['updated_at']);
                            }

                            for($i=0; $i < response.jmlhOrderFilter; $i++){
                                var date = new Date(tempLabel[$i]);
                                var day = date.getDate();
                                var month = date.getMonth();
                                var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

                                var formattingDate = day + '-' + monthNames[month] + '-' + date.getFullYear();
                                labelChart.push(formattingDate);
                            }
                            
                            // Chart
                            
                            chart.destroy();
                            
                            // Menyiapkan array warna yang akan digunakan untuk setiap bar
                            var backgroundColors = [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 159, 64, 0.7)',
                            'rgba(255, 159, 64, 0.7)'
                            ];
                            
                            // Menyiapkan array untuk menyimpan objek dataset
                            var datasets = [{
                            //   label: [labels,],
                                data: updateChart,
                                backgroundColor: backgroundColors,
                                borderWidth: 1,
                                fill: false,
                                borderColor: 'rgb(75, 192, 192)',
                                tension: 0.1
                            }];
                    
                            chart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labelChart,
                                datasets: datasets,
                            },
                            options: {
                                responsive: true,
                                scales: {
                                y: {
                                    beginAtZero: true
                                }
                                },
                                plugins: {
                                    legend:{
                                        display: false
                                    }
                                },
                                tooltips: {
                                    callbacks: {
                                        label: function(tooltipItem){
                                            return tooltipItem.yLabel;
                                        }
                                    }
                                }
                            }
                            });
                            // Grafik

                            },
                            error: function (xhr, ajaxOptions, thrownError) {
                                console.log(xhr.responseText);
                                console.log(thrownError);
                            }
                        })
                }else if(($dataTahun).length !== 0){
                    console.log("Data Tahun");

                    dataFilterBulanTahun.push($dataTahun);

                    $.ajax({
                        type: "POST",
                        url: "/bulanTahunFilter",
                        method: 'post',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }, 
                        data: {
                            "dataFilter": dataFilterBulanTahun,
                        },
                        success: function(response){
                            console.log("Ini Response", response.dataOrderFilter);
                            console.log("Total Data :", response.dataLength);


                            // Grafik
                            var updateChart = [];
                            var tempLabel = [];
                            labelChart = [];
                            
                            for ($i=0; $i < response.jmlhOrderFilter; $i++) {
                                updateChart.push(response.dataOrderFilter[$i]['totalHarga']);
                                tempLabel.push(response.dataOrderFilter[$i]['updated_at']);
                            }

                            for($i=0; $i < response.jmlhOrderFilter; $i++){
                                var date = new Date(tempLabel[$i]);
                                var day = date.getDate();
                                var month = date.getMonth();
                                var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

                                var formattingDate = day + '-' + monthNames[month] + '-' + date.getFullYear();
                                labelChart.push(formattingDate);
                            }
                            
                            // Chart
                            
                            chart.destroy();
                            
                            // Menyiapkan array warna yang akan digunakan untuk setiap bar
                            var backgroundColors = [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 159, 64, 0.7)',
                            'rgba(255, 159, 64, 0.7)'
                            ];
                            
                            // Menyiapkan array untuk menyimpan objek dataset
                            var datasets = [{
                            //   label: [labels,],
                                data: updateChart,
                                backgroundColor: backgroundColors,
                                borderWidth: 1,
                                fill: false,
                                borderColor: 'rgb(75, 192, 192)',
                                tension: 0.1
                            }];
                    
                            chart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels: labelChart,
                                datasets: datasets,
                            },
                            options: {
                                responsive: true,
                                scales: {
                                y: {
                                    beginAtZero: true
                                }
                                },
                                plugins: {
                                    legend:{
                                        display: false
                                    }
                                },
                                tooltips: {
                                    callbacks: {
                                        label: function(tooltipItem){
                                            return tooltipItem.yLabel;
                                        }
                                    }
                                }
                            }
                            });
                            // Grafik


                        },
                        error: function (xhr, ajaxOptions, thrownError) {
                            console.log(xhr.responseText);
                            console.log(thrownError);
                        }
                    })

                }

            //     console.log("Hasil Kondisi");
            //     console.log("Tahun : ", $dataTahun);
            //     console.log("Bulan : ", $dataBulan);
            //     console.log("Minggu : ", $dataMinggu);
            }else if(typeFilter === 'pertanggal'){
                dataFilterDate.push(dateFrom, dateTo);
                console.log("Filter Date : ", dataFilterDate);
                
                console.log("Date From : ", dataFilterDate[0], "s/d" ," Date To : ", dataFilterDate[1]);

                $.ajax({
                type: "POST",
                url: "/getFilter",
                method: 'post',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    "dateFrom": dataFilterDate[0],
                    "dateTo": dataFilterDate[1],
                },
                success: function(response){

                    var updateChart = [];
                    var tempLabel = [];
                    labelChart = [];
                    for ($i=0; $i < response.filterDateCount; $i++) {
                        updateChart.push(response.filter[$i]['totalHarga']);
                        tempLabel.push(response.filter[$i]['updated_at']);
                    }
                    for($i=0; $i < response.filterDateCount; $i++){
                        var date = new Date(tempLabel[$i]);
                        var day = date.getDate();
                        var month = date.getMonth()+1;
                        var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

                        var formattingDate = day + '-' + monthNames[month] + '-' + date.getFullYear();
                        labelChart.push(formattingDate);
                    }
                    
                    // Chart
                    
                    chart.destroy();
                    
                    // Menyiapkan array warna yang akan digunakan untuk setiap bar
                    var backgroundColors = [
                    'rgba(255, 99, 132, 0.7)',
                    'rgba(54, 162, 235, 0.7)',
                    'rgba(255, 206, 86, 0.7)',
                    'rgba(75, 192, 192, 0.7)',
                    'rgba(153, 102, 255, 0.7)',
                    'rgba(255, 159, 64, 0.7)',
                    'rgba(255, 159, 64, 0.7)'
                    ];
                    
                    // Menyiapkan array untuk menyimpan objek dataset
                    var datasets = [{
                    //   label: [labels,],
                        data: updateChart,
                        backgroundColor: backgroundColors,
                        borderWidth: 1,
                        fill: false,
                        borderColor: 'rgb(75, 192, 192)',
                        tension: 0.1
                    }];
            
                    chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labelChart,
                        datasets: datasets,
                    },
                    options: {
                        responsive: true,
                        scales: {
                        y: {
                            beginAtZero: true
                        }
                        },
                        plugins: {
                            legend:{
                                display: false
                            }
                        },
                        tooltips: {
                            callbacks: {
                                label: function(tooltipItem){
                                    return tooltipItem.yLabel;
                                }
                            }
                        }
                    }
                    });

                    // Chart
                },

                error: function (xhr, ajaxOptions, thrownError) {
                    console.log(xhr.responseText);
                    console.log(thrownError);
                }
            })

            }


            // Ajax
            // $.ajax({
            //     type: "POST",
            //     url: "/getFilter",
            //     method: 'post',
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //     },
            //     data: {
            //         "dateFrom": $dateFrom,
            //         "dateTo": $dateTo,
            //     },
            //     success: function(response){

            //         var updateChart = [];
            //         var tempLabel = [];
            //         labelChart = [];
            //         for ($i=0; $i < response.filterDateCount; $i++) {
            //             updateChart.push(response.filter[$i]['totalHarga']);
            //             tempLabel.push(response.filter[$i]['updated_at']);
            //         }
            //         for($i=0; $i < response.filterDateCount; $i++){
            //             var date = new Date(tempLabel[$i]);
            //             var day = date.getDate();
            //             var month = date.getMonth()+1;
            //             var monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

            //             var formattingDate = day + '-' + monthNames[month] + '-' + date.getFullYear();
            //             labelChart.push(formattingDate);
            //         }
                    
            //         // Chart
                    
            //         chart.destroy();
                    
            //         // Menyiapkan array warna yang akan digunakan untuk setiap bar
            //         var backgroundColors = [
            //         'rgba(255, 99, 132, 0.7)',
            //         'rgba(54, 162, 235, 0.7)',
            //         'rgba(255, 206, 86, 0.7)',
            //         'rgba(75, 192, 192, 0.7)',
            //         'rgba(153, 102, 255, 0.7)',
            //         'rgba(255, 159, 64, 0.7)',
            //         'rgba(255, 159, 64, 0.7)'
            //         ];
                    
            //         // Menyiapkan array untuk menyimpan objek dataset
            //         var datasets = [{
            //         //   label: [labels,],
            //             data: updateChart,
            //             backgroundColor: backgroundColors,
            //             borderWidth: 1
            //         }];
            
            //         chart = new Chart(ctx, {
            //         type: 'bar',
            //         data: {
            //             labels: labelChart,
            //             datasets: datasets,
            //         },
            //         options: {
            //             responsive: true,
            //             scales: {
            //             y: {
            //                 beginAtZero: true
            //             }
            //             },
            //             plugins: {
            //                 legend:{
            //                     display: false
            //                 }
            //             },
            //             tooltips: {
            //                 callbacks: {
            //                     label: function(tooltipItem){
            //                         return tooltipItem.yLabel;
            //                     }
            //                 }
            //             }
            //         }
            //         });

            //         // Chart
            //     },

            //     error: function (xhr, ajaxOptions, thrownError) {
            //         console.log(xhr.responseText);
            //         console.log(thrownError);
            //     }
            // })
            // Ajax


        }
    </script>
@endsection 