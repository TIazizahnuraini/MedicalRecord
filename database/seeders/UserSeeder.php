<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = collect([
            // ["Azizah Nur Aini", 'azizana', 'azizah@gmail.com', '11111111', 'Mojokerto', date('2002-10-01'),],
            ["Ratna", "Ratna", "Ratna@gmail.com", "Brebes", date('2001-12-21')],

            ["Arip Hidayat", "Arip Hidayat", "AripHidayat@gmail.com", "Jakarta", date('1999-03-16')],

            ["Syarief", "Syarief", "Syarief@gmail.com", "Bandung", date('1997-02-06')],

            ["Sri Astuti", "Sri Astuti","SriAstuti@gmail.com", "Tegal", date('2002-07-19')],

            ["Arif Saputra", "Arif Saputra", "ArifSaputra@gmail.com", "Brebes", date('2000-09-11')],

            ["Siti Aminah", "Siti Aminah", "SitiAminah@gmail.com", "Brebes", date('1990-12-20')],
        ]);

        User::create([
            'name' => 'Azizah Nur Aini',
            'username' => 'azizana',
            'email' => 'azizah@gmail.com',
            'password' => bcrypt('11111111'),
            'role'  => 'admin',
            'tempat_lahir'  => 'Mojokerto',
            'tgl_lahir' => date('2002-10-01'),
        ]);

        $users->eachSpread(function($name,$username, $email, $tempat_lahir, $tgl_lahir){
            User::create([
                'name' => $name,
                'username' => $username,
                'email' => $email,
                'password'  => bcrypt('11111111'),
                'role'  => 'pasien',
                'tempat_lahir'  => $tempat_lahir,
                'tgl_lahir' => $tgl_lahir,
            ]);
        });
    }
}
