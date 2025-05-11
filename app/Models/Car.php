<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Car extends Model
{
    /** @use HasFactory<\Database\Factories\CarFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'color',
        'price',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];
    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
}
