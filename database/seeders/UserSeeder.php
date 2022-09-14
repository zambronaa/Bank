<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name'          => Str::random(10),
        //     'email'         => Str::random(10).'@gmail.com',
        //     'password'      => Hash::make('password'),
        //     'updated_at'     => Carbon::now(),
        //     'created_at'    => Carbon::now(),
        // ]);
        User::create([
            'name'          => 'Lucas',
            'email'         =>'Lucas@gamil.com',
            'password'      => bcrypt('12345'),
            'document_type' => 'CPF',
            'document_number' => '123456'

        ]);

    }
}
