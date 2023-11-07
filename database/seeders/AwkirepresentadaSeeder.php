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
            'user_id'=>5,
        ]);



    }
}
