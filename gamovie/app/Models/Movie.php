<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'director',
        'año',
        'genero',
        'distribuidora',
        'imagen',
    ];

    public function user()
    {
        return $this->belongsToMany(User::class)->withTimestamps();               
    }
}
