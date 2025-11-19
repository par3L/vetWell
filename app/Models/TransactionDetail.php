<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TransactionDetail extends Model
{
    // field yang bisa diisi secara mass assignment
    protected $fillable = [
        'transaction_id',
        'item_id',
        'service_id',
        'description',
        'quantity',
        'price_at_transaction',
        'subtotal',
    ];

    // cast tipe data untuk field tertentu
    protected $casts = [
        'price_at_transaction' => 'decimal:2',
        'subtotal' => 'decimal:2',
    ];

    // relasi ke tabel transactions - detail ini milik satu transaksi
    public function transaction(): BelongsTo
    {
        return $this->belongsTo(Transaction::class);
    }

    // relasi ke tabel items - detail ini bisa terkait dengan satu item
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    // relasi ke tabel services - detail ini bisa terkait dengan satu service
    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
