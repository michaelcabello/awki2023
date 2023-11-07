<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Local_tipocomprobante extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    //relacion de uno a muchos
    //debemos eliminar la tabla comprobantes
     public function comprobantes(){//esta relacion creo ya no se va usar
        return $this->hasMany(Comprobante::class);
    }


    public function sales(){
        return $this->hasMany(Sale::class);
    }


}
