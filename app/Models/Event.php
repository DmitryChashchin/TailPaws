<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\EventType;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_id',
        'user_id',
        'title',
        'type',
        'date',
        'pet_condition'
    ];

    protected $casts = [

        'type' => EventType::class,
        'date' => 'datetime:Y-m-d'
    ];

    public function pet(): hasOne
    {
        return $this->hasOne(Pet::class);
    }

    public function user(): hasOne
    {
        return $this->hasOne(User::class);
    }


}
