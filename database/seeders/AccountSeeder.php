<?php

namespace Database\Seeders;

use App\Models\account;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        account::create([
            'id_agenci' => '1234567',
            'balance'   => 'R$ 88,9',
            'number_cont' => '11223344',
        ]);
    }
}
