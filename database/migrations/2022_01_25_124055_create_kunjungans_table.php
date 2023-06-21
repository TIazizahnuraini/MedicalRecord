<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunjungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('poli_id')->nullable()->constrained('polis')->nullOnDelete();
            $table->foreignId('pasien_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('dokter_id')->nullable()->constrained('dokters')->nullOnDelete();
            // $table->foreignId('user_id');
            $table->foreignId('diagnosa_id')->nullable()->constrained('diagnosas')->nullOnDelete();
            $table->date('tgl_kunjungan');
            $table->enum('jenis_kunjungan', ['Kunjungan sakit', 'Kunjungan sehat']);
            $table->enum('tindak_lanjut', ['Pulang sehat', 'Rawat jalan', 'Pemeriksaan berkala', 'Rujukan']);
            $table->string('keluhan');
            $table->string('terapi')->nullable();
            $table->string('kesadaran')->nullable();
            $table->integer('tb')->nullable();
            $table->integer('bb')->nullable();
            $table->integer('tekanan_darah')->nullable();
            $table->integer('respiratory_rake')->nullable();
            $table->integer('heart_rafe')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('resep')->nullable();
            $table->integer('biaya')->nullable();
            // $table->json('nama_obat')->nullable();
            $table->enum('status', ['Belum dilayani', 'Sudah dilayani']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kunjungans');
    }
}
