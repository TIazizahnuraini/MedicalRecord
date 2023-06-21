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

        th, td{
            padding: 5px;
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
    <h3 class="judul" id="judul">Data Dokter Klinik</h3>
    <table class="table">
        <thead>

            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Dokter</th>
                {{-- <th scope="col">Spesialis</th> --}}
                <th scope="col">NIK</th>
                <th scope="col">SIP</th>
                {{-- <th scope="col">Jenis Kelamin</th> --}}
                <th scope="col">Tempat / Tanggal Lahir</th>
                <th scope="col">Alamat</th>
                <th scope="col">No HP</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($dokters as $dokter)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $dokter->nama_dokter }}</td>
                    {{-- <td>{{ $dokter->spesialis }}</td> --}}
                    <td>{{ $dokter->nik }}</td>
                    <td>{{ $dokter->sip }}</td>
                    {{-- <td>{{ $dokter->jenis_kelamin }}</td> --}}
                    <td>{{ $dokter->tempat_lahir }} / {{ $dokter->tgl_lahir }}</td>
                    <td>{{ $dokter->alamat }}</td>
                    <td>{{ $dokter->no_hp }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
