<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reservation_id',
        'total',
        'payment_date',
    ];


    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }

    public function statuses(): HasMany
    {
        return $this->hasMany(PaymentStatus::class);
    }
}
