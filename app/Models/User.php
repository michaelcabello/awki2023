<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
//agregamos esto en el modelo user
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasRoles;
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'notification',
    ];


    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    protected $appends = [
        'profile_photo_url',
    ];

    //tutorial de one one (un usuario tiene un local asignado)
    //https://desarrolloweb.com/articulos/relaciones-1-laravel-eloquent.html
    /*     public function local()
    {
        return $this->hasOne(Local::class);
    } */


    public function scopeAllowed($query)
    {

        if (auth()->user()->can('view', $this)) {
            return $query;
        }

        return $query->where('id', auth()->id());
    }

    //Relacion uno a uno
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }


    //relacion de uno a muchos
    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function tiendas()
    {
        return $this->hasMany(Awkitienda::class, 'user_id');
    }

    public function tiendass()//relacion para mostrar tiendas del cliente
    {
        return $this->hasMany(Awkitienda::class, 'user2_id');
    }

    public function clientes()
    {
        return $this->hasManyThrough(Awkicliente::class, Awkitienda::class, 'user_id', 'awkitienda_id', 'id', 'id');
    }


    public function awkirepresentada() {
        return $this->hasOne('App\Models\Awkirepresentada');
      }


    //uno a muchos
    public function expedientes()
    {
        return $this->hasMany(Expediente::class);
    }

}
