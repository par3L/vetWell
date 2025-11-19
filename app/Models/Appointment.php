<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    // field yang bisa diisi secara mass assignment
    protected $fillable = [
        'user_id',
        'pet_id',
        'doctor_id',
        'appointment_time',
        'status',
        'client_notes',
        'doctor_notes',
    ];

    // cast tipe data untuk field tertentu
    protected $casts = [
        'appointment_time' => 'datetime',
    ];

    // relasi ke tabel users - appointment ini milik satu user
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // relasi ke tabel pets - appointment ini untuk satu pet
    public function pet(): BelongsTo
    {
        return $this->belongsTo(Pet::class);
    }

    // relasi ke tabel doctors - appointment ini ditangani oleh satu doctor
    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class);
    }

    // relasi many-to-many ke tabel services melalui appointment_service
    // appointment bisa punya banyak service, service bisa ada di banyak appointment
    // withPivot untuk ambil field tambahan di pivot table
    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'appointment_service')
            ->withPivot('added_by_doctor')
            ->withTimestamps();
    }

    // relasi ke tabel transactions - satu appointment punya satu transaksi
    public function transaction(): HasOne
    {
        return $this->hasOne(Transaction::class);
    }
}
