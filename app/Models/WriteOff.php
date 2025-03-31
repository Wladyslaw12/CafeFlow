<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WriteOff extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'establishment_id',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
