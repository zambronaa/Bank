<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Deposit extends Model
{
    use HasFactory;
    protected $fillable = [
        'accounts_id',
        'deposit',
    ];

    public function account () {
        return $this->belongsTo(Account::class);
    }
}
