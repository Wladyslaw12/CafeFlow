<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deliver extends Model
{
    use HasFactory;

    protected $fillable = [
        'document_number',
        'suppliers_id',
        'payment_status',
        'comment',
        'establishment_id',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id');
    }

    public function deliverProducts()
    {
        return $this->hasMany(DeliverProduct::class);
    }
}
