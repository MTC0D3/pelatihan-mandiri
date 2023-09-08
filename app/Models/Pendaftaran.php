<?php

namespace App\Models;

use App\Traits\HasScope;
use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pendaftaran extends Model
{
    use HasFactory, HasScope;

    protected $fillable = [
        'name',
        'nip',
        'birthplace',
        'birthdate',
        'position',
        'agency',
        'agency_address',
        'phone',
        'address',
        'status',
        'registration_date',
        'pelatihan_id',
        'user_id'
    ];

    public function pelatihan()
    {
        return $this->belongsTo(Pelatihan::class);
    }

     public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
