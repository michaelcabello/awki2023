<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awkirepresentada extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //relcion de uno a muchos
    public function zonas()
    {
        return $this->hasMany(Awkizona::class);
    }

    //relacion de uno a muchos
    public function awkitiendas()
    {
        return $this->hasMany(Awkitienda::class);
    }

    //relacion de uno a muchos
    public function awkiclientes()
    {
        return $this->hasMany(Awkicliente::class);
    }


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }


}
