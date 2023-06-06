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
        $polis = collect(["Umum", "Gigi", "KB dan KIA", "Lansia", "MTBS"]);

        $poli = $polis->each(function ($poli) {
            Poli::create([
                'nama_poli' => $poli
            ]);
        });
    }
}
