<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Plate extends Model
{
    use HasFactory;

    protected $fillable = [
        'plate'
    ];

    public function services(): HasMany
    {
        return $this->hasMany(Tow::class);
    }
}
