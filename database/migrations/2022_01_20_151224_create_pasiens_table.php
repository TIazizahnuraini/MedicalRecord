<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Pasien;

class CreatePasiensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasiens', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pasien', 100);
            $table->string('tempat_lahir', 50);
            $table->date('tgl_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('alamat'); 
            $table->enum('jenis_registrasi', ['Umum', 'BPJS']);
            $table->string('no_bpjs', 50)->nullable();
            $table->string('no_hp', 15); 
            $table->date('tgl_registrasi');
            $table->enum('agama', ['Islam', 'Protestan', 'Katolik', 'Hindu', 'Buddha', 'Khonghucu']);
            $table->enum('pekerjaan', ['Belum/Tidak Bekerja', 'Mengurus Rumah Tangga', 'Pelajar/Mahasiswa', 'TNI/POLRI', 'Wiraswasta', 'Pegawai Swasta', 'Lainnya']);
            $table->timestamps();
        });

        Pasien::create([
            'nama_pasien' => 'Susi',
            'tempat_lahir' => 'Mojokerto',
            'tgl_lahir' => '2023-06-07',
            'jenis_kelamnin' => 'perempuan',
            'alamat' => 'Mojokerto',
            'jenis_registrasi' => 'BPJS',
            'no_bpjs' => '874826418301',
            'no_hp' => '0856768000000',
            'tgl_registrasi' => '2023-06-03',
            'agama' => 'Islam',
            'pekerjaan' => 'Pelajar/Mahasiswa'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pasiens');
    }
}
