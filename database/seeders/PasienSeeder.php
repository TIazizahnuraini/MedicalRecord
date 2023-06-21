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
            ['2', "Perempuan", "Brebes", "BPJS", "3928374827382", "0895738492748", date('2022-06-23'), "Islam", "Pelajar/Mahasiswa"],

            ['3', "Laki-laki", "Jakarta", "Umum", "", "086453746273", date('2022-06-23'), "Katolik", "Wiraswasta"],

            ['4', "Laki-laki", "Bandung", "Umum", "", "089674829485", date('2022-06-24'), "Hindu", "Pegawai Swasta"],

            ['5', "Perempuan", "Tegal", "BPJS", "329837583958", "086453746273", date('2022-06-24'), "Islam", "Pelajar/Mahasiswa"],

            ['6', "Laki-laki", "Brebes", "Umum", "", "0895637583728", date('2022-06-24'), "Islam", "Wiraswasta"],

            ['7', "Perempuan", "Brebes", "BPJS", "329492837458", "089573848392", date('2022-06-24'), "Islam", "Wiraswasta"],
        ]);

        $pasien = $pasiens->eachSpread(function ($user_id, $jenis_kelamin, $alamat, $jenis_registrasi, $no_bpjs, $no_hp, $tgl_registrasi, $agama, $pekerjaan) {

            Pasien::create([
                'user_id'           => $user_id,
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
