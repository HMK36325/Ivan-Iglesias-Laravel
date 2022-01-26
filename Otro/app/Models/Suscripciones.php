<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suscripciones extends Model
{
    use HasFactory;


    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();     //MANY TO MANY CON User            
    }
}
