<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AwkitiendasTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('awkitiendas')->delete();
        
        \DB::table('awkitiendas')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Tienda Tarapoto Mercado',
                'address' => 'Tienda Tarapoto Mercado',
                'description' => 'Tienda Tarapoto Mercado',
                'serief' => 'F1',
                'serieb' => 'B1',
                'email' => 'mercado@mercado.com',
                'state' => 1,
                'user_id' => 2,
                'awkizona_id' => 1,
                'awkirepresentada_id' => 2,
                'created_at' => '2023-11-08 22:06:55',
                'updated_at' => '2023-11-08 22:06:55',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'tienda carsa 23',
                'address' => 'tienda carsa 23',
                'description' => 'tienda carsa 23',
                'serief' => 'F3',
                'serieb' => 'B3',
                'email' => 'aa@aa.com',
                'state' => 1,
                'user_id' => 2,
                'awkizona_id' => 1,
                'awkirepresentada_id' => 2,
                'created_at' => '2023-11-08 22:07:51',
                'updated_at' => '2023-11-08 22:28:36',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'tienda modelo',
                'address' => 'av nodelo 344',
                'description' => 'tienda modelo',
                'serief' => 'FR',
                'serieb' => 'BR',
                'email' => 'modelo@modelo.com',
                'state' => 1,
                'user_id' => 3,
                'awkizona_id' => 2,
                'awkirepresentada_id' => 2,
                'created_at' => '2023-11-08 22:29:35',
                'updated_at' => '2023-11-08 22:29:35',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'tienda machupichu',
                'address' => 'dir de tienda machupichu',
                'description' => 'tienda machupichu',
                'serief' => 'F65',
                'serieb' => 'B55',
                'email' => 'machu@machu.com',
                'state' => 1,
                'user_id' => 2,
                'awkizona_id' => 1,
                'awkirepresentada_id' => 2,
                'created_at' => '2023-11-08 22:31:22',
                'updated_at' => '2023-11-08 22:31:22',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'tienda banco',
                'address' => 'direccion banco',
                'description' => 'tienda banco',
                'serief' => 'F98',
                'serieb' => 'B98',
                'email' => 'banco@banco.com',
                'state' => 1,
                'user_id' => 2,
                'awkizona_id' => 5,
                'awkirepresentada_id' => 3,
                'created_at' => '2023-11-08 22:32:37',
                'updated_at' => '2023-11-08 22:32:37',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'tienda porvenir',
                'address' => 'dir tienda porvenir',
                'description' => 'tienda porvenir',
                'serief' => 'F77',
                'serieb' => 'B77',
                'email' => 'aa@mm.com',
                'state' => 1,
                'user_id' => 4,
                'awkizona_id' => 5,
                'awkirepresentada_id' => 3,
                'created_at' => '2023-11-08 22:49:47',
                'updated_at' => '2023-11-08 22:49:47',
            ),
        ));
        
        
    }
}