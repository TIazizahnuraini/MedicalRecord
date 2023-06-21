<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;


class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username', 25);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('tempat_lahir', 50);
            $table->date('tgl_lahir');
            $table->enum('role', ['admin', 'pasien', 'apoteker', 'kepala_klinik'])->default('pasien');
            $table->rememberToken();
            $table->timestamps();
        });

        // User::create([
        //     'name' => 'Azizah Nur Aini',
        //     'username' => 'azizana',
        //     'email' => 'azizahnuraini@gmail.com',
        //     'password' => Hash::make('11111111'),
        //     'role' => 'admin',

        //     'name' => 'Pasien',
        //     'username' => 'pasien',
        //     'email' => 'pasien@gmail.com',
        //     'password' => Hash::make('11111111'),
        //     'role' => 'pasien',

        //     'name' => 'Apoteker',
        //     'username' => 'apoteker',
        //     'email' => 'apoteker@gmail.com',
        //     'password' => Hash::make('11111111'),
        //     'role' => 'apoteker',

        //     'name' => 'Kepala Klinik',
        //     'username' => 'KepalaKlinik',
        //     'email' => 'kepalaklinik@gmail.com',
        //     'password' => Hash::make('11111111'),
        //     'role' => 'kepala_klinik',

          
        // ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
