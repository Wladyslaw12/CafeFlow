<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'deliver_id',
        'count',
        'price',
        'establishment_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
