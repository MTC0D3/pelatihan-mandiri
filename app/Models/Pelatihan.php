<?php

namespace App\Models;


use App\Traits\HasScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelatihan extends Model
{
    use HasFactory, HasScope;

    protected $fillable = ['name','activity', 'image',  'start_date', 'end_date'];

    protected function image(): Attribute
    {
        return Attribute::make(
            get: fn($image) => asset('storage/pelatihans/' . $image),
        );
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
