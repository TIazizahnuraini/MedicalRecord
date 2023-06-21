<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Obat;

class CreateObatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->integer('jumlah');
            $table->enum('satuan', ['Tablet', 'Botol', 'Kapsul', 'Pil']);
            $table->string('dosis', 50);
            $table->date('expired');
            $table->timestamps();
        });

        // Obat::create([
        //     'nama_obat' => 'Paracetamol',
        //     'jumlah' => '34',
        //     'satuan' => 'tablet',
        //     'dosis' => '50mg',
        //     'expired' => '2024-07-10',
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('obats');
    }
}
