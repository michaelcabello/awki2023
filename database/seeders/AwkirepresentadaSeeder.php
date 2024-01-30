<?php

namespace Database\Seeders;

use App\Models\Awkirepresentada;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AwkirepresentadaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Awkirepresentada::create([
            'razonsocial' => 'ABC SA',
            'ruc' => '20557896632',
            'address'=>'Av. Salñaverry 345 Lima',
            'phone'=>'2554874',
            'movil'=>'996959874',
            'state' => 1,
            'nota1'=>'descripcion de la nota 1',
            'nota2'=>'descripcion de la nota 1',
            'user_id'=>2,
        ]);

        Awkirepresentada::create([
            'razonsocial' => 'TOYOTA SA',
            'ruc' => '20557896699',
            'address'=>'Av. Salñaverry 345 Lima',
            'phone'=>'2554874',
            'movil'=>'996959874',
            'state' => 1,
            'nota1'=>'descripcion de la nota 1',
            'nota2'=>'descripcion de la nota 1',
            'user_id'=>2,
        ]);

        Awkirepresentada::create([
            'razonsocial' => 'CHEVROLET SA',
            'ruc' => '20557776699',
            'address'=>'Av. Salñaverry 345 Lima',
            'phone'=>'2554874',
            'movil'=>'996959874',
            'state' => 1,
            'nota1'=>'descripcion de la nota 1',
            'nota2'=>'descripcion de la nota 1',
            'user_id'=>3,
        ]);

        Awkirepresentada::create([
            'razonsocial' => 'VOLVO SA',
            'ruc' => '20093396699',
            'address'=>'Av. PERU 345 Lima',
            'phone'=>'2554874',
            'movil'=>'996959874',
            'state' => 1,
            'nota1'=>'descripcion de la nota 1',
            'nota2'=>'descripcion de la nota 1',
            'user_id'=>4,
        ]);

        Awkirepresentada::create([
            'razonsocial' => 'XYZ SA',
            'ruc' => '20727899619',
            'address'=>'Av. PERU 345 Lima',
            'phone'=>'2554874',
            'movil'=>'996959874',
            'state' => 1,
            'nota1'=>'descripcion de la nota 1',
            'nota2'=>'descripcion de la nota 1',
            'user_id'=>5,
        ]);


        Awkirepresentada::create([
            'razonsocial' => 'MNP SA',
            'ruc' => '77527896699',
            'address'=>'Av. PERU 345 Lima',
            'phone'=>'2554874',
            'movil'=>'996959874',
            'state' => 1,
            'nota1'=>'descripcion de la nota 1',
            'nota2'=>'descripcion de la nota 1',
            'user_id'=>6,
        ]);


        Awkirepresentada::create([
            'razonsocial' => 'OPQ SA',
            'ruc' => '20766496699',
            'address'=>'Av. PERU 345 Lima',
            'phone'=>'2554874',
            'movil'=>'996959874',
            'state' => 1,
            'nota1'=>'descripcion de la nota 1',
            'nota2'=>'descripcion de la nota 1',
            'user_id'=>7,
        ]);

    }
}
