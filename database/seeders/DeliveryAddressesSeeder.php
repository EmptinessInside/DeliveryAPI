<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DeliveryAddressesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('delivery_addresses')->insert([
            'region' => 'Павловский регион',
            'locality' => 'Павловка',
            'street' => 'Первая справа',
            'house' => '54/2',
            'index' => 554323,
            'user_id' => 1
        ]);

        DB::table('delivery_addresses')->insert([
            'region' => 'Павловский регион',
            'locality' => 'Павловка',
            'street' => 'Вторая справа',
            'house' => '59а',
            'index' => 454556,
            'user_id' => 1
        ]);

        DB::table('delivery_addresses')->insert([
            'region' => 'Акакевский регион',
            'locality' => 'Акакевка',
            'street' => 'Акакиева',
            'house' => '777',
            'index' => 114313,
            'user_id' => 3
        ]);
    }
}
