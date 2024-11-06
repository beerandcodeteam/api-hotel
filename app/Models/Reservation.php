<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'checkin_at',
        'checkout_at',
        'deleted_at',
    ];

    public function guests()
    {
        return $this->belongsToMany(Guest::class)
            ->withPivot(['checkin_at', 'checkout_at', 'type']);
    }
}
