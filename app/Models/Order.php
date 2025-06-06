<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{

    protected $fillable = [
        'user_id'
    ];

    public function cars(): BelongsToMany
    {
        return $this->belongsToMany(Car::class);
    }
}
