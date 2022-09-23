<?php

namespace App\Models;

use App\Models\User;
use App\Models\Agency;
use App\Models\Payment;
use App\Models\Transfer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Extract;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'user_id',
        'agency_id',
        'balance',
        'number_account'

    ];

    protected $casts = ['balance' => 'decimal:2'];

    public function User () {
        return $this->belongsTo(User::class);
    }

    public function agency () {
        return $this->belongsTo(Agency::class);
    }

    public function payment () {
        return $this->hasOne(Payment::class);
    }

    public function transfer () {
        return $this->hasone(Transfer::class);
    }

    public function extract () {
        return $this->hasone(Extract::class);
    }

    public function withdraw () {
        return $this->hasone(Withdraw::class);
    }

    public function ticket () {
        return $this->hasone(Ticket::class);
    }

    public function deposit () {
        return $this->hasone(Deposit::class);
    }

}
