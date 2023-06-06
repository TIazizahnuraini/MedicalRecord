<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pasiens = collect([
            ["Ratna", "Brebes", date('2001-12-21'), "Perempuan", "Brebes", "BPJS", "3928374827382", "0895738492748", date('2022-06-23'), "Islam", "Mahasiswa"],

            ["Arip Hidayat", "Jakarta", date('1999-03-16'), "Laki-laki", "Jakarta", "Umum", "", "086453746273", date('2022-06-23'), "Katolik", "Wirausaha"],

            ["Syarief", "Bandung", date('1997-02-06'), "Laki-laki", "Bandung", "Umum", "", "089674829485", date('2022-06-24'), "Hindu", "Petani"],

            ["Sri Astuti", "Tegal", date('2002-07-19'), "Perempuan", "Tegal", "BPJS", "329837583958", "086453746273", date('2022-06-24'), "Islam", "Mahasiswa"],

            ["Arif Saputra", "Brebes", date('2000-09-11'), "Laki-laki", "Brebes", "Umum", "", "0895637583728", date('2022-06-24'), "Islam", "Wirausaha"],

            ["Siti Aminah", "Brebes", date('1990-12-20'), "Perempuan", "Brebes", "BPJS", "329492837458", "089573848392", date('2022-06-24'), "Islam", "Pedagang"],
        ]);

        $pasien = $pasiens->eachSpread(function ($nama_pasien, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $alamat, $jenis_registrasi, $no_bpjs, $no_hp, $tgl_registrasi, $agama, $pekerjaan) {

            Pasien::create([
                'nama_pasien'       => $nama_pasien,
                'tempat_lahir'      => $tempat_lahir,
                'tgl_lahir'         => $tgl_lahir,
                'jenis_kelamin'     => $jenis_kelamin,
                'alamat'            => $alamat,
                'jenis_registrasi'  => $jenis_registrasi,
                'no_bpjs'           => $no_bpjs,
                'no_hp'             => $no_hp,
                'tgl_registrasi'    => $tgl_registrasi,
                'agama'             => $agama,
                'pekerjaan'         => $pekerjaan
            ]);
        });
    }
}
