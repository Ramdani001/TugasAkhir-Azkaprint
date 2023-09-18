<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan PDF</title>

    <style>
        *{
            padding: 0;
            margin: 0;
        }
        /* Header */

        #header{
            padding: 10px 0 !important;
            width: 100% !important;
            display: flex;
        }

        #header #tittle{
            background-color: transparent;
            text-align: center;
        }

        #header #tittle h2{
            font-size: 40px;
        }

        #header #tittle h5{
            font-weight: normal;
        }

        #header #tittle {
            /* background-color: red; */
        }

        #header #adminCetak{
            font-size: 15px;
            margin-top: -60px;
            margin-bottom: 60px;
            text-align: right;
            padding-right: 10px;
        }

        /* Header */

        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            padding: 0 5px;
            font-size: 0.9em;
            font-family: sans-serif;
            width: 100%;
            /* min-width: 400px; */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
            text-align: center;
        }

        .styled-table tbody tr #dataLeft{
            text-align: left;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }


    </style>

</head>
<body>
    <div id="header">
        <div id="tittle">
            <h2>AZKAPRINT</h2>
            <h5>Laporan 
                {{ $namaData }} Periode - {{ $titleData }}
            </h5>
        </div>
        <div id="adminCetak">
            <span>
                tanggal cetak : <br> {{ $today }}
            </span>
        </div>
    </div>
    <hr>
    <div>
        
        @if ($chData == 'Data User')
            <table class="styled-table">
                <thead>
                    <tr>
                        <th class="py-2">No</th>
                        <th class="py-2">Id User</th>
                        <th class="py-2">Nama User</th>
                        <th class="py-2">Status User</th>
                        <th class="py-2">Email</th>
                        <th class="py-2">Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    @foreach ($dataUser as $data)
                       <tr>
                        <td class="py-2">
                            {{ $no }}
                        </td>
                        <td class="py-2">
                            {{ $data->idUser }}
                        </td>
                        <td class="py-2" id="dataLeft">
                            {{ $data->namaUser }}
                        </td>
                        <td class="py-2">
                            {{ $data->status }}
                        </td>
                        <td class="py-2" id="dataLeft">
                            {{ $data->email }}
                        </td>
                        <td class="py-2">
                            {{ $data->created_at }}
                        </td>
                       </tr>
                        
                    <?php $no++ ?>

                    @endforeach
                    <!-- and so on... -->
                </tbody>
            </table>
        @endif
    </div>
    
</body>
</html>