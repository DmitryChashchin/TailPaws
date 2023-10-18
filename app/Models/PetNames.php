<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetNames extends Model
{
    use HasFactory;

    protected $fillable = [
        'pet_name',
        'pet_id',
        'user_id',
        'start_date',
        'end_date',
    ];


    public function pet(): belongsTo
    {
        return $this->belongsTo(Pets::class);
    }

    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

}
