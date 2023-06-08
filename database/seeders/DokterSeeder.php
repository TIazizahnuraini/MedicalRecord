<?php

namespace Database\Seeders;

use App\Models\Dokter;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dokters = collect([
            ["Anang Gunawan, TS", "Laki-laki", "Poli Umum", "Makassar", date('1981-08-13'), "Makassar", "332973849283", "09891786", "0895738492847"],

            ["Drg.Devi Yanti", "Perempuan", "Poli Gigi", "Tangerang", date('1983-09-28'), "Tangerang", "332964758928", "97011289", "0876536472846"],

            ["Sari wati, AM.Keb", "Perempuan", "Poli Umum", "Semarang", date('1985-10-24'), "Semarang", "3329726374928", "09123890", "0895647283947"],

            ["Ratna Sari, AM.KG", "Perempuan", "Poli Gigi", "Batang", date('1983-03-15'), "Batang", "332984758394", "10928009", "0894637482748"],

            ["Putra, SKM", "Laki-laki", "Poli Umum", "Jepara", date('1985-12-18'), "Jepara", "332972847582", "088975400", "089564738473"],
        ]);

        $dokter = $dokters->eachSpread(function ($nama_dokter, $jenis_kelamin, $spesialis, $tempat_lahir, $tgl_lahir, $alamat, $nik, $no_hp) {
            Dokter::create([
                'nama_dokter' => $nama_dokter,
                'jenis_kelamin' => $jenis_kelamin,
                'spesialis' => $spesialis,
                'tempat_lahir' => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
                'alamat' => $alamat,
                'nik' => $nik,
                'sip' => $sip,
                'no_hp' => $no_hp
            ]);
        });
    }
}
