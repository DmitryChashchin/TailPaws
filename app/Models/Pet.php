<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PetStatus;


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
        'status',
        'behavior_id'
    ];


    protected $casts = [

        'type' => PetStatus::class,
    ];

    public function events(): belongsToMany
    {
        return $this->belongsToMany(Event::class);
    }

    public function petNames(): hasMany
    {
        return $this->hasMany(PetNames::class);
    }

    public function notes(): hasMany
    {
        return $this->hasMany(Note::class);
    }

    public function behavior(): hasOne
    {
        return $this->hasOne(Behavior::class);
    }

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class)
            ->withDefault();
    }
}
