<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Expediente extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    //protected $table = 'expedientes';

    //uno a muchos inversa
    public function tipodedocumento()
    {
        return $this->belongsTo(Tipodedocumento::class);
    }

    public function awkicliente()
    {
        return $this->belongsTo(Awkicliente::class);
    }

    public function awkitienda()
    {
        return $this->belongsTo(Awkitienda::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function statusfinall()//le agregue un l porque se confunde con un campo del mismo nombre y agregue statusfinal_id
    {
        return $this->belongsTo(Statusfinal::class, 'statusfinal_id');
    }

    //query Scope
   /*  public function scopeFilter($query, $awkitienda_id){
        $query->when($awkitienda_id ?? null, function($query, $awkitienda_id){
            $query->where('awkitienda_id', $awkitienda_id);
        });
    } */

    public function scopeFilter($query, $filters){
        $query->when($filters['tienda'] ?? null, function($query, $awkitienda_id){
            $query->where('awkitienda_id', $awkitienda_id);
        })->when($filters['status'] ?? null, function($query, $statusfinal_id){
            $query->where('statusfinal_id', $statusfinal_id);
        })->when($filters['fromdate'] ?? null, function($query, $fechaventa){
            $query->where('fechaventa', '>=' , $fechaventa);
        })->when($filters['todate'] ?? null, function($query, $fechaventa){
            $query->where('fechaventa', '<=' , $fechaventa);
        })->when($filters['fromdaterecepcion'] ?? null, function($query, $fecharecepcion){
            $query->where('fecharecepcion', '>=' , $fecharecepcion);
        })->when($filters['todaterecepcion'] ?? null, function($query, $fecharecepcion){
            $query->where('fecharecepcion', '<=' , $fecharecepcion);
        });
    }



}
