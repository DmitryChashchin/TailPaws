<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'adopter_id',
        'status',
        'start_date',
        'end_date',
        'address',
        'city',
        'country'
    ];


    public function pet(): belongsTo
    {
        return $this->belongsTo(Pet::class);
    }

    public function adopter(): belongsTo
    {
        return $this->belongsTo(Adopter::class);
    }

    public function organization(): belongsTo
    {
        return $this->belongsTo(Organization::class);
    }

}
