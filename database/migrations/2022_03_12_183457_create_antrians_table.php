<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Antrian;

class CreateAntriansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('antrians', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('nomor_antrian');
            $table->string('status')->nullable();
            $table->string('tanggal')->notnull();
            $table->unsignedBigInteger('poli_id');
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('dokter_id');
            $table->timestamps();

            $table->foreign('poli_id')->references('id')->on('polis')->onDelete('cascade');
        });

        Antrian::create([
            'nomor_antrian' => '1',
            'status' => 'Belum dilayani',
            'tanggal' => '2023-06-08',
            'poli_id' => '1',
            'pasien_id' => '1',
            'dokter_id' => '1',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('antrians');
    }
}
