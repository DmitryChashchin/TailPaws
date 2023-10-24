<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Behavior extends Model
{
    use HasFactory;

    protected $fillable = [
        'get_along_with_dogs',
        'get_along_with_cats',
        'get_along_with_kids',
        'housetrained',
        'has_a_bite_history',
        'needs_experienced_adopter'
    ];

}
