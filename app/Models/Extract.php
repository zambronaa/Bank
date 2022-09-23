<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Extract extends Model
{
    use HasFactory;
    protected $fillable = [
        'accounts_id',
        'every_payments',
        'every_transfer'
    ];

    public function accounts () {
        return $this->BelongsTo(Account::class);
    }

}
