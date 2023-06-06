<?php

namespace Database\Seeders;

use App\Models\Diagnosa;
use Illuminate\Database\Seeder;

class DiagnosaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diagnosas = collect([
            ["Kolera", "Chorela", "diare"],
            ["Demam tifoid", "Typhoid fever", "tipes"],
            ["Demam paratifoid A", "Paratyphoid fever A", "demam rendah"],
            ["Demam paratifoid B", "Paratyphoid fever B", "demam sedang"],
            ["Demam paratifoid C", "Paratyphoid fever C", "demam tinggi"],
            ["Demam tifoid dan paratifoid", "Typhoid and Paratyphoid fever", "tiped demam tinggi"],
        ]);

        $diagnosas->eachSpread(function ($nama_diagnosa, $name_diagnosa, $keterangan) {
            Diagnosa::create([
                'nama_diagnosa' => $nama_diagnosa,
                'name_diagnosa' => $name_diagnosa,
                'keterangan' => $keterangan,
            ]);
        });
    }
}
