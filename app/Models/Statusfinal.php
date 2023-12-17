<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Statusfinal extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre'
    ];



    //uno a muchos
    public function expedientes()
    {
        return $this->hasMany(Expediente::class);
    }

}
