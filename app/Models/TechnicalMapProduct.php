<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TechnicalMapProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'technical_map_id',
        'product_id',
        'count',
        'establishment_id',
    ];
}
