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
        'date' => 'datetime:d-m-Y'
    ];

    public function pet(): belongsTo
    {
        return $this->belongsTo(Pet::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }


}
