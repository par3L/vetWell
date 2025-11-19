<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // field yang bisa diisi secara mass assignment
    protected $fillable = [
        'name',
        'sku',
        'stock',
        'unit',
        'selling_price',
    ];

    // cast tipe data untuk field tertentu
    protected $casts = [
        'selling_price' => 'decimal:2',
    ];
}
