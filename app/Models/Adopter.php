<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopter extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'email',
        'phone',
        'address',
        'city',
        'country',
    ];

    public function pets(): hasMany
    {
        return $this->hasMany(Pet::class);
    }

    public function Adoptions(): hasMany
    {
        return $this->hasMany(Adoption::class);
    }

}
