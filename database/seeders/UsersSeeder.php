<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Павел',
            'last_name' => 'Павлов',
            'email' => 'pavlov@gmail.com',
            'accept_mailing' => false,
            'password' => bcrypt('pavlov123')
        ]);

        DB::table('users')->insert([
            'name' => 'Иван',
            'last_name' => 'Иванов',
            'email' => 'ivanov@gmail.com',
            'accept_mailing' => true,
            'password' => bcrypt('ivanov123')
        ]);

        DB::table('users')->insert([
            'name' => 'Акакий',
            'last_name' => 'Акакев',
            'email' => 'akakiy@gmail.com',
            'accept_mailing' => true,
            'password' => bcrypt('akakiy123')
        ]);
    }
}
