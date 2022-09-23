<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = [
        'accounts_id',
        'value_payment',
        'account_payment'
    ];

    public function account( )
    {
        return $this->belongsTo(Account::class);
    }
}
