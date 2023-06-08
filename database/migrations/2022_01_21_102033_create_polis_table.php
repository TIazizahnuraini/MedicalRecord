<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Poli;

class CreatePolisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polis', function (Blueprint $table) {
            $table->id();
            $table->string('nama_poli', 100);
            $table->string('jadwal_mulai');
            $table->string('jadwal_selesai');
            $table->timestamps();
        });

        Poli::create([
            'nama_poli' => 'Poli Umum',
            'jadwal_mulai' => '08.00',
            'jadwal_selesai' => '11.00',

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('polis');
    }
}
