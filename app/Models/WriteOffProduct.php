<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WriteOffProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'write_off_id',
        'count',
        'establishment_id',
    ];
}
