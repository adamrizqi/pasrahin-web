<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'mitra_id',
        'service_type',
        'whatsapp_number',
        'details',
        'pickup_location',
        'dropoff_location',
        'bid_price',
        'item_price',
        'admin_fee',
        'payment_status',
        'snap_token',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'bid_price' => 'decimal:2',
            'item_price' => 'decimal:2',
            'admin_fee' => 'decimal:2',
        ];
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function mitra(): BelongsTo
    {
        return $this->belongsTo(User::class, 'mitra_id');
    }

    public function messages(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Message::class);
    }
}
