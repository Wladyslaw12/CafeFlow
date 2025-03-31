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
        'establishment_id',
    ];
}
