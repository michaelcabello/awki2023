<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awkizona extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //relacion de uno a muchos
    public function tiendas()
    {
        return $this->hasMany(Awkitienda::class);
    }


    //relacion de uno a muchos inversa
    public function representada()
    {
        return $this->belongsTo(Awkirepresentada::class);
    }

}
