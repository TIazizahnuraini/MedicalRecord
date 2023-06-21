<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <style>
        .center-table {
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
        }

        p {
            line-height: 0.5;
        }

        hr {
            border: 1px solid;
        }

        .judul {
            width: 500px;
            
            margin-left: auto;
            margin-right: auto;
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>

<body>
    @php
        $no = 1;
    @endphp
    <table width="100%" class="center-table">
        <tr>
            <td width="50" align="center"><img src="{{ public_path("/images/logo/logoKlinik.png") }}" width="100%"></td>
            <td width="50" align="center">
                <h3>KLINIK PRATAMA MEDIKA HUSADA</h3>
                <P><strong>No. Izin : </strong>16122100176590001</P>
                <P><strong>JL. Mojopahit No 540, Kota Mojokerto</strong></P>
                <P><strong>No Telp : 0857908550868 Email : <a href="#">medikahusadamjk@gmail.com</a></strong></P>
            </td>
        </tr>
    </table>
    <hr>
    <br>
    <h3 class="judul" id="judul">Data Persediaan Obat</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Obat</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Satuan</th>
                <th scope="col">Dosis</th>
                <th scope="col">Expired Date</th>
            </tr>
            @foreach ($obats as $obat)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $obat->nama_obat }}</td>
                    <td>{{ $obat->jumlah }}</td>
                    <td>{{ $obat->satuan }}</td>
                    <td>{{ $obat->dosis}}</td>
                    <td>{{ $obat->expired }}</td>
                </tr>
            @endforeach
        </thead>
    </table>
</body>

</html>
