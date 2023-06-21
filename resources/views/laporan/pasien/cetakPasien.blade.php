<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}

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

        th,
        td {
            padding: 15px;
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
            <td width="50" align="center"><img src="{{ public_path('/images/logo/logoKlinik.png') }}" width="100%">
            </td>
            <td width="50" align="center">
                <h2>KLINIK PRATAMA MEDIKA HUSADA</h2>
                <P><strong>No. Izin : </strong>16122100176590001</P>
                <P><strong>JL. Mojopahit No 540, Kota Mojokerto</strong></P>
                <P><strong>No Telp : 0857908550868 Email : <a href="#">medikahusadamjk@gmail.com</a></strong></P>
            </td>
        </tr>
    </table>
    <hr>
    <br>
    <h3 class="judul" id="judul" >Data Pasien {{ $user->name }}</h3>
    <table class="center-table"  width="80%">
        <thead>
            <tr>
                <td>Nama Pasien</td>
                <td>:</td>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <td>Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $user->tempat_lahir }} / {{ $user->tgl_lahir }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $user->pasien->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{ $user->pasien->agama }}</td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $user->pasien->pekerjaan }}</td>
            </tr>
            <tr>
                <td>No BPJS</td>
                <td>:</td>
                <td>{{ $user->pasien->no_bpjs }}</td>
            </tr>
            <tr>
                <td>Tanggal Registrasi</td>
                <td>:</td>
                <td>{{ $user->pasien->tgl_registrasi }}</td>
            </tr>
            <tr>
                <td>No HandPhone</td>
                <td>:</td>
                <td>{{ $user->pasien->no_hp }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $user->pasien->alamat }}</td>
            </tr>
            {{-- @foreach ($users as $user)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->pasien->jenis_kelamin }}</td>
                    <td>{{ $user->pasien->jenis_registrasi }}</td>
                    <td>{{ $user->pasien->no_hp }}</td>
                    <td>{{ $user->pasien->tgl_registrasi }}</td>
                </tr>
            @endforeach --}}
        </thead>
    </table>
</body>

</html>
