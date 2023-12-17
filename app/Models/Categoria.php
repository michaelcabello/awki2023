<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    //uno a muchos
    public function expedientes()
    {
        return $this->hasMany(Expediente::class);
    }


}
