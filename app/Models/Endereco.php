<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Endereco extends Model
{
    protected $fillable = [
        'user_id',
        'cep',
        'addreses',
        'number',
        'district',
        'complement',
        'state',
        'city'
    ];

    protected $hidden = [  //hidden = escondido
        'created_at',
        'updated_at'
    ];

    public function User () {
        return $this->belongsTo(User::class);
    }
}
