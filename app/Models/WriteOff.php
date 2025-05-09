<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WriteOff extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'document_number',
        'establishment_id',
        'status'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function writeOffProducts()
    {
        return $this->hasMany(WriteOffProduct::class);
    }
}
