<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'id_agenci',
        'balance',
        'number_cont',
    ];
}
