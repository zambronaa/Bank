<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Endereco::create([
            'user_id'   => 1,
            'cep'       =>      '13000222',
            'addreses'  =>      'ru das oliveiras',
            'number'    =>      '12',
            'district'  =>      'bairro do lucas',
            'complement' =>     'casa',
            'state'     =>      'Sao paulo',
            'city'      =>      'horotlandia',
        ]);
    }
}
