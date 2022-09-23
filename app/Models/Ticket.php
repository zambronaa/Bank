<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'accounts_id',
        'number_ticket',
        'value_ticket',
        'date_ticket'
    ];

    public function account () {
        return $this->belongsTo(Account::class);
    }
}
