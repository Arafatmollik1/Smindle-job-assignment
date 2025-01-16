<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SmindleOrdersBasket extends Model
{
    protected $fillable = [
        'order_id',
        'name',
        'type',
        'price',
    ];

    public function smindleOrder(): BelongsTo
    {
        return $this->belongsTo(SmindleOrder::class, 'order_id');
    }
}
