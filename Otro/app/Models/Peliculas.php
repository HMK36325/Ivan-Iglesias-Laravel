<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peliculas extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    public function user()
    {
        return $this->belongsToMany(User::class)->withTimestamps();     //MANY TO MANY CON User            
    }
}
