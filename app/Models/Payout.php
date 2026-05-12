<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payout extends Model
{
    protected $fillable = ['mitra_id', 'amount', 'bank_name', 'account_number', 'status'];

    public function mitra()
    {
        return $this->belongsTo(User::class, 'mitra_id');
    }
}
