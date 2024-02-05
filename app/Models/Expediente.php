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

    public function tipodeventa()
    {
        return $this->belongsTo(Tipodeventa::class);
    }


    public function awkicliente()
    {
        return $this->belongsTo(Awkicliente::class);
    }

    public function awkitienda()
    {
        return $this->belongsTo(Awkitienda::class);
    }

    public function awkizona()
    {
        return $this->belongsTo(Awkizona::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function marca()
    {
        return $this->belongsTo(Marca::class);
    }

    public function modello()
    {
        return $this->belongsTo(Modello::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function anio()
    {
        return $this->belongsTo(Anio::class);
    }

    public function statusfinall()//le agregue un l porque se confunde con un campo del mismo nombre y agregue statusfinal_id
    {
        return $this->belongsTo(Statusfinal::class, 'statusfinal_id');
    }

    public function oficinaregistral()
    {
        return $this->belongsTo(Oficinaregistral::class);
    }



    //query Scope
   /*  public function scopeFilter($query, $awkitienda_id){
        $query->when($awkitienda_id ?? null, function($query, $awkitienda_id){
            $query->where('awkitienda_id', $awkitienda_id);
        });
    } */

    public function scopeFilter($query, $filters){
        $query->when($filters['awkitienda_id'] ?? null, function($query, $awkitienda_id){
            $query->where('awkitienda_id', $awkitienda_id);
        })->when($filters['awkizona_id'] ?? null, function($query, $awkizona_id){
            $query->where('awkizona_id', $awkizona_id);
        })->when($filters['awkirepresentada_id'] ?? null, function ($query, $awkirepresentada_id) {
            // Agrega la condición para awkirepresentada_id
            $query->whereHas('awkitienda', function ($q) use ($awkirepresentada_id) {
                $q->where('awkirepresentada_id', $awkirepresentada_id);
            });
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
