<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pet extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'species',
        'breed',
        'dob',
        'gender',
        'photo',
    ];

    protected $casts = [
        'dob' => 'date',
    ];

    public function client(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }
}
