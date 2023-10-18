<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'age',
        'breed',
        'gender',
        'weight',
        'color',
        'description',
        'image',
        'vaccinated',
        'pet_condition',
        ];


    public function Events(): hasMany
    {
        return $this->hasMany(Event::class);
    }

    public function Adoption(): hasOne
    {
        return $this->hasOne(Adoption::class);
    }


    public function Adopter(): belongsTo
    {
        return $this->belongsTo(Adopter::class);
    }

    public function Organization(): belongsTo
    {
        return $this->belongsTo(Organization::class);
    }

    public function petNames(): hasMany
    {
        return $this->hasMany(PetNames::class);
    }


}
