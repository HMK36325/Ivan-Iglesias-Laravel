<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();                
    }
    public function suscripciones()
    {
        return $this->belongsToMany(Suscripciones::class)->withTimestamps();                
    }
    public function peliculas()
    {
        return $this->belongsToMany(Peliculas::class)->withTimestamps();                
    }

    public function authorizeRoles($roles) //FUNCION PARA AUTORIZAR LOS ROLES 
    {
        abort_unless($this->hasAnyRole($roles), 401); //ABORTAR(QUE SALGA ERORR 401 UNAUTHORIZED) A NO SER QUE EXISTA UN ROL AUTORIZADO
        return true;
    }
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) { //SI ESTE USUARIO TIENE ALGUNO DE LOS ROLES AUTORIZADOS DE LA FUNCION DE ABAJO
                 return true; 
            }   
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) { //SI ESTE USUARIO TIENE UN ROL PASADO POR PARAMETRO, ES DECIR, UN ROL AUTORIZADO
            return true;
        }
        return false;
    }



   
}
