<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $obats = collect([
            ["Actifed", 30, "Botol", "60mg", "2024-09-28"],
            ["Allergen", 40, "Tablet", "120mg", "2025-09-01"],
            ["Paracetamol", 35, "Tablet", "500mg", "2024-01-22"],
            ["Cataflam", 40, "Tablet", "50mg", "2025-01-01"],
            ["Sanmol", 25, "Botol", "250mg", "2025-09-08"],
            ["Pumpitor", 29, "Kapsul", "20mg", "2024-09-28"]
        ]);

        $obat = $obats->eachSpread(function ($nama_obat, $jumlah, $satuan, $dosis, $expired) {
            Obat::create([
                'nama_obat' => $nama_obat,
                'jumlah' => $jumlah,
                'satuan' => $satuan,
                'dosis' => $dosis,
                'expired' => $expired
            ]);
        });
    }
}
