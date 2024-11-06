<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'size',
        'max_adults',
        'max_children',
        'double_beds',
        'single_beds',
        'floor',
        'type',
        'number',
        'price',
    ];

    public function reservations(): BelongsToMany
    {
        return $this->belongsToMany(Reservation::class);
    }

    public function images(): HasMany
    {
        return $this->hasMany(RoomImage::class);
    }
}
