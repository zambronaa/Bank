<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'accounts_id',
        'value_transfer',
        'account_Totransfer',
        'account_Fromtransfer'
    ];

    public function account( )
    {
        return $this->belongsTo(Account::class);
    }
}
