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
            ["Anang Gunawan, TS", "Laki-laki", "Umum", "Makassar", date('1981-08-13'), "Makassar", "332973849283", "0895738492847"],

            ["Drg.Devi Yanti", "Perempuan", "Gigi", "Tangerang", date('1983-09-28'), "Tangerang", "332964758928", "0876536472846"],

            ["Sari wati, AM.Keb", "Perempuan", "KB dan KIA", "Semarang", date('1985-10-24'), "Semarang", "3329726374928", "0895647283947"],

            ["Herman, Am.Keb", "Laki-laki", "Lansia", "Yogyakarta", date('1982-11-04'), "Yogyakarta", "3329847583728", "0896546284728"],

            ["Sahrul Kurniawan, SKM", "Laki-laki", "MTBS", "Jakarta", date('1983-01-14'), "Jakarta", "3329856274917", "0875637462748"],

            ["Ratna Sari, AM.KG", "Perempuan", "Gigi", "Batang", date('1983-03-15'), "Batang", "332984758394", "0894637482748"],

            ["Putra, SKM", "Laki-laki", "Umum", "Jepara", date('1985-12-18'), "Jepara", "332972847582", "089564738473"],
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
                'no_hp' => $no_hp
            ]);
        });
    }
}
