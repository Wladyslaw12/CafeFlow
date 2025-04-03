<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'address',
        'phone',
        'form_of_business_activity',
        'owner_name',
        'founding_date'
    ];
    
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
