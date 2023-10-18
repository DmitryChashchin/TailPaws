<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'website',
        'logo',
    ];


    public function users(): hasMany
    {
        return $this->hasMany(User::class);
    }


    public function pets(): hasMany
    {
        return $this->hasMany(Pet::class);
    }



}
