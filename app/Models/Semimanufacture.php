<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semimanufacture extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'unit_id',
        'price',
        'establishment_id',
    ];

    public function semimanufactureProducts()
    {
        return $this->hasMany(SemimanufactureProduct::class);
    }
}
