<?php

namespace Database\Seeders;

use App\Models\Poli;
use Illuminate\Database\Seeder;

class PoliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $polis = collect([
            ["Poli Umum", "08.00", "13.00"], 
            ["Poli Gigi", "08.00", "13.00"]
        ]);

        $poli = $polis->eachSpread(function ($nama_poli, $jadwal_mulai, $jadwal_selesai) {
            Poli::create([
                'nama_poli'      => $nama_poli,
                'jadwal_mulai'   => $jadwal_mulai,
                'jadwal_selesai' => $jadwal_selesai
            ]);
        });
    }
}
