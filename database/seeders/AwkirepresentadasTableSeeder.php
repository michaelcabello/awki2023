<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AwkirepresentadasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('awkirepresentadas')->delete();
        
        \DB::table('awkirepresentadas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'razonsocial' => 'ABC SA',
                'ruc' => '20557896632',
                'address' => 'Av. Salñaverry 345 Lima',
                'phone' => '2554874',
                'movil' => '996959874',
                'state' => 1,
                'nota1' => 'descripcion de la nota 1',
                'nota2' => 'descripcion de la nota 1',
                'user_id' => 5,
                'created_at' => '2023-11-07 19:33:49',
                'updated_at' => '2023-11-07 19:33:49',
            ),
            1 => 
            array (
                'id' => 2,
                'razonsocial' => 'ABC',
                'ruc' => '342342',
                'address' => 'abc',
                'phone' => '2342342',
                'movil' => '234234',
                'state' => 1,
                'nota1' => 'fgdfgdf',
                'nota2' => 'dfgdfg',
                'user_id' => 4,
                'created_at' => '2023-11-07 22:24:55',
                'updated_at' => '2023-11-07 22:24:55',
            ),
            2 => 
            array (
                'id' => 3,
                'razonsocial' => 'empresa xyz',
                'ruc' => '4543534',
                'address' => 'fgdfg dfgdfg',
                'phone' => '345345',
                'movil' => '345345',
                'state' => 1,
                'nota1' => 'bfgdfg',
                'nota2' => 'dfgdfg',
                'user_id' => 6,
                'created_at' => '2023-11-07 23:19:59',
                'updated_at' => '2023-11-07 23:19:59',
            ),
        ));
        
        
    }
}