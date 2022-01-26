<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;


class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name','description'];

    public function user()
    {
        return $this->belongsTo(User::class);                
    }

    protected static function boot(){
        parent::boot();
        self::creating(function($table){
            if(! app()->runningInConsole()){//Ejecuta siempre que la app no se lance desde consola
                $table->user_id=auth()->id();// usa como user_id, que es un campo de la tabla pojects, el id del usuario registrado.
            }
        });
    }

}
