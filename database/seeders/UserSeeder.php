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
        User::create([
            'name' => 'Azizah Nur Aini',
            'username' => 'azizana',
            'email' => 'azizahnuraini381@gmail.com',
            'password' => bcrypt('11111111'),
        ]);
    }
}
