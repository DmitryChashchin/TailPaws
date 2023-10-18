<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;


    protected $fillable = [
        'pet_id',
        'user_id',
        'title',
        'body',

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

