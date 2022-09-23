<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    protected $fillable= [
        'accounts_id',
        'retired',
    ];

    public function account () {
        return $this->belongsTo(Account::class);
    }

}
