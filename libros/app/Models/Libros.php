<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory;
    /*public function user()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }*/
    protected $fillable = ['titulo', 'tematica', 'sinopsis', 'autor','portada'];
}
