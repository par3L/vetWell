<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'phone',
        'no_reg_dokter',
        'spesialisasi',
        'position',
        'experience_years',
        'bio',
        'photo',
        'show_in_team',
    ];

    /**
     * relationship dengan User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
