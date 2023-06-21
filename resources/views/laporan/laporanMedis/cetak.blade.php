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

        .table-data{
            padding: 5px;
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
    <h3 class="judul" id="judul" >Data Rekam Medis Pasien</h3>
    <table class="center-table table-data"  width="90%">
        <thead>
            <tr><td colspan="3">A. Biodata Pasien</td><td colspan="3">Tanggal Registrasi : {{ $kunjungan->user->pasien->tgl_registrasi }}</td></tr>
            <tr>
                <td colspan="6"><hr style="border: 0.5px solid;"></td>
            </tr>
            <tr>
                <td>Nama Pasien</td>
                <td>:</td>
                <td>{{ $kunjungan->user->name }}</td>
                <td>No BPJS</td>
                <td>:</td>
                <td>{{ $kunjungan->user->pasien->no_bpjs }}</td>
            </tr>
            <tr>
                <td>Tempat / Tanggal Lahir</td>
                <td>:</td>
                <td>{{ $kunjungan->user->tempat_lahir }} / {{ $kunjungan->user->tgl_lahir }}</td>
                
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>{{ $kunjungan->user->pasien->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Agama</td>
                <td>:</td>
                <td>{{ $kunjungan->user->pasien->agama }}</td>
                <td>Pekerjaan</td>
                <td>:</td>
                <td>{{ $kunjungan->user->pasien->pekerjaan }}</td>
            </tr>
            <tr>
                <td>No HandPhone</td>
                <td>:</td>
                <td>{{ $kunjungan->user->pasien->no_hp }}</td>
                <td>Alamat</td>
                <td>:</td>
                <td>{{ $kunjungan->user->pasien->alamat }}</td>
            </tr>
        </thead>
    </table>

    <table class="center-table table-data"  width="90%">
        <thead>
            <tr><td colspan="3">B. Rekam Medis</td><td colspan="3">Tanggal Kunjungan : {{ $kunjungan->tgl_kunjungan }}</td></tr>
            <tr>
                <td colspan="6"><hr style="border: 0.5px solid;"></td>
            </tr>
            <tr>
                <td>Dokter</td>
                <td>:</td>
                <td>{{$kunjungan->dokter->nama_dokter}}</td>
            </tr>
            <tr>
                <td>Jenis Kunjungan</td>
                <td>:</td>
                <td>{{$kunjungan->jenis_kunjungan}}</td>
                <td>Tindak Lanjut</td>
                <td>:</td>
                <td>{{$kunjungan->tindak_lanjut}}</td>
            </tr>
            <tr>
                <td>Keluhan : </td>
            </tr>
            <tr>
                <td colspan="6" style="border: 1px solid; padding: 10px;">{{$kunjungan->keluhan}}</td>
            </tr>
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td>Tinggi Badan</td>
                <td>:</td>
                <td>{{$kunjungan->tb}} cm</td>
                <td>Berat Badan</td>
                <td>:</td>
                <td>{{$kunjungan->bb}} kg</td>
            </tr>
            <tr>
                <td>Terapi</td>
                <td>:</td>
                <td>{{$kunjungan->terapi}}</td>
                <td>Kesadaran</td>
                <td>:</td>
                <td>{{$kunjungan->kesadaran}}</td>
            </tr>
            <tr>
                <td>Tekanan Darah</td>
                <td>:</td>
                <td>{{$kunjungan->tekanan_darah}} mmHg</td>
            </tr>
            <tr>
                <td>Respiratory Rake</td>
                <td>:</td>
                <td>{{$kunjungan->respiratory_rake}} RR</td>
                <td>Heart Rafe</td>
                <td>:</td>
                <td>{{$kunjungan->heart_rafe}} bpm</td>
            </tr>
            <tr>
                <td>Keterangan : </td>
            </tr>
            <tr>
                <td colspan="6" style="border: 1px solid; padding: 10px;">{{$kunjungan->keterangan}}</td>
            </tr>
        </thead>
    </table>
    
    <table class="center-table table-data"  width="90%">
        <thead>
            <tr><td colspan="6">C. Obat dan Biaya</td></tr>
            <tr>
                <td colspan="6"><hr style="border: 0.5px solid;"></td>
            </tr>
            <tr>
                <td><strong>Resep Obat</strong></td>
            </tr>
            <tr>
                <td colspan="3">Nama Obat</td>
                <td colspan="3">Jumlah Obat</td>
            </tr>
            @foreach ($obats as $obat)
                <tr>
                    <td colspan="3">- {{$obat->obat->nama_obat}}</td>
                    <td colspan="3">- {{$obat->jumlah}} {{$obat->obat->satuan}}</td>
                </tr>
            @endforeach
            <tr>
                <td><br></td>
            </tr>
            <tr>
                <td><strong>Biaya</strong></td>
            </tr>
            <tr>
                <td colspan="6" style="border: 1px solid; padding: 10px;">Rp. {{$biaya}}</td></tr>
            
        </thead>
    </table>
</body>

</html>
