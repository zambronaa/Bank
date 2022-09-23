<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_id',
        'number_agency'
    ];

    public function bank () {
        return $this->belongsTo(Bank::class);
    }

    public function account () {
        return $this->hasOne(Account::class);
    }
}
