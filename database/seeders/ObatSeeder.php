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
            ["Actifed", 30, "Botol", "60mg"],
            ["Allergen", 40, "Tablet", "120mg"],
            ["Paracetamol", 35, "Tablet", "500mg"],
            ["Cataflam", 40, "Tablet", "50mg"],
            ["Sanmol", 25, "Botol", "250mg"],
            ["Pumpitor", 29, "Kapsul", "20mg"]
        ]);

        $obat = $obats->eachSpread(function ($nama_obat, $jumlah, $satuan, $dosis) {
            Obat::create([
                'nama_obat' => $nama_obat,
                'jumlah' => $jumlah,
                'satuan' => $satuan,
                'dosis' => $dosis
            ]);
        });
    }
}
