<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Dokter;

class CreateDoktersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dokters', function (Blueprint $table) {
            $table->id();
            $table->string('nama_dokter', 100);
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('spesialis', 100);
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->text('alamat');
            $table->string('nik', 50);
            $table->string('sip', 50);
            $table->string('no_hp', 15);
            $table->timestamps();
        });

        Dokter::create([
            'nama_dokter' => 'Anang Gunawan, TS',
            'jenis_kelamin' => 'Laki-laki',
            'spesialis' => 'Poli Umum',
            'tempat_lahir' => 'Mojokerto',
            'tgl_lahir' => '2023-06-07',
            'alamat' => 'Mojokerto',
            'nik' => '979729816708',
            'sip' => '893724920',
            'no_hp' => '085748110282'
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dokters');
    }
}
