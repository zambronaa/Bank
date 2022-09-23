<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_bank',
        'number_bank',
        'created_at',
        'updated_at'

    ];

    public function agency () {
        return $this->hasOne(Agency::class);
    }

}
