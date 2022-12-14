<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Account::create([
            'user_id' => 1,
            'agency_id' => 1,
            'balance' => 10000,
            'number_account' => '0011332243343400',
        ]);
    }
}
