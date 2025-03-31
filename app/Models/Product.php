<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'unit_id',
        'proteins',
        'fats',
        'carbohydrates',
        'establishment_id',
    ];

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }
}
