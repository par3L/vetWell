<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaction extends Model
{
    // field yang bisa diisi secara mass assignment
    protected $fillable = [
        'appointment_id',
        'invoice_number',
        'total_amount',
        'status',
        'transaction_date',
    ];

    // cast tipe data untuk field tertentu
    protected $casts = [
        'transaction_date' => 'datetime',
        'total_amount' => 'decimal:2',
    ];

    // relasi ke tabel appointments - satu transaksi punya satu appointment
    public function appointment(): BelongsTo
    {
        return $this->belongsTo(Appointment::class);
    }

    // relasi ke tabel transaction_details - satu transaksi punya banyak detail
    public function transactionDetails(): HasMany
    {
        return $this->hasMany(TransactionDetail::class);
    }
}
