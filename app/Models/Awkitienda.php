<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Awkitienda extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    //relacion de uno a muchos inversa
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function zona()
    {
        return $this->belongsTo(Awkizona::class);
    }

    public function awkirepresentada()
    {
        return $this->belongsTo(Awkirepresentada::class);
    }

    //uno a muchos
    public function expedientes()
    {
        return $this->hasMany(Expediente::class);
    }
}
