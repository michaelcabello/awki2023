<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AwkiclientesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('awkiclientes')->delete();
        
        \DB::table('awkiclientes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'dni' => '10133425',
                'nombres' => 'Miguel Angel',
                'apellidopaterno' => 'ortega',
                'apellidomaterno' => 'flores',
                'state' => 1,
                'awkirepresentada_id' => 2,
                'awkizona_id' => 1,
                'awkitienda_id' => 1,
                'created_at' => '2023-11-09 05:40:46',
                'updated_at' => '2023-11-09 06:43:10',
            ),
            1 => 
            array (
                'id' => 2,
                'dni' => '10254787',
                'nombres' => 'Flor Luz',
                'apellidopaterno' => 'Flores',
                'apellidomaterno' => 'Rivera',
                'state' => 1,
                'awkirepresentada_id' => 2,
                'awkizona_id' => 2,
                'awkitienda_id' => 3,
                'created_at' => '2023-11-09 05:44:28',
                'updated_at' => '2023-11-09 06:43:11',
            ),
            2 => 
            array (
                'id' => 3,
                'dni' => '23123123',
                'nombres' => 'dggdfg',
                'apellidopaterno' => 'dfgdfg',
                'apellidomaterno' => 'dfg',
                'state' => 0,
                'awkirepresentada_id' => 2,
                'awkizona_id' => 1,
                'awkitienda_id' => 2,
                'created_at' => '2023-11-09 05:48:57',
                'updated_at' => '2023-11-09 16:46:47',
            ),
            3 => 
            array (
                'id' => 4,
                'dni' => '12324132',
                'nombres' => 'reiner',
                'apellidopaterno' => 'torres',
                'apellidomaterno' => 'lopez',
                'state' => 1,
                'awkirepresentada_id' => 3,
                'awkizona_id' => 5,
                'awkitienda_id' => 6,
                'created_at' => '2023-11-09 07:13:56',
                'updated_at' => '2023-11-09 07:13:56',
            ),
            4 => 
            array (
                'id' => 5,
                'dni' => '12124578',
                'nombres' => 'magaly ',
                'apellidopaterno' => 'llamo',
                'apellidomaterno' => 'lopez',
                'state' => 1,
                'awkirepresentada_id' => 2,
                'awkizona_id' => 2,
                'awkitienda_id' => 3,
                'created_at' => '2023-11-09 23:16:34',
                'updated_at' => '2023-11-09 23:16:34',
            ),
            5 => 
            array (
                'id' => 6,
                'dni' => '34234234',
                'nombres' => 'fsdf sdfsdf sdf',
                'apellidopaterno' => 'fsdfsfsf',
                'apellidomaterno' => 'sdfsdfsdf',
                'state' => 0,
                'awkirepresentada_id' => 3,
                'awkizona_id' => 5,
                'awkitienda_id' => 6,
                'created_at' => '2023-11-09 23:17:48',
                'updated_at' => '2023-11-09 23:17:48',
            ),
            6 => 
            array (
                'id' => 7,
                'dni' => '12345656',
                'nombres' => 'frfrfrfrf',
                'apellidopaterno' => 'gtgttt',
                'apellidomaterno' => 'hyhyhyhy',
                'state' => 0,
                'awkirepresentada_id' => 3,
                'awkizona_id' => 5,
                'awkitienda_id' => 6,
                'created_at' => '2023-11-09 23:18:30',
                'updated_at' => '2023-11-09 23:18:30',
            ),
            7 => 
            array (
                'id' => 8,
                'dni' => '325345345',
                'nombres' => 'qwqwqwqw',
                'apellidopaterno' => 'wewewewe',
                'apellidomaterno' => 'erererer',
                'state' => 0,
                'awkirepresentada_id' => 3,
                'awkizona_id' => 5,
                'awkitienda_id' => 6,
                'created_at' => '2023-11-10 07:04:54',
                'updated_at' => '2023-11-10 07:04:54',
            ),
            8 => 
            array (
                'id' => 9,
                'dni' => '10132523',
                'nombres' => 'mercedes',
                'apellidopaterno' => 'cabello',
                'apellidomaterno' => 'carbone',
                'state' => 0,
                'awkirepresentada_id' => 3,
                'awkizona_id' => 3,
                'awkitienda_id' => 7,
                'created_at' => '2023-11-10 07:13:42',
                'updated_at' => '2023-11-10 07:13:42',
            ),
            9 => 
            array (
                'id' => 10,
                'dni' => '23123456',
                'nombres' => 'hgfhfgh',
                'apellidopaterno' => 'fghfgh',
                'apellidomaterno' => 'fghfghfgh',
                'state' => 1,
                'awkirepresentada_id' => 2,
                'awkizona_id' => 2,
                'awkitienda_id' => 3,
                'created_at' => '2023-11-10 15:23:17',
                'updated_at' => '2023-11-10 15:23:17',
            ),
            10 => 
            array (
                'id' => 11,
                'dni' => '10425741',
                'nombres' => 'miguelina',
                'apellidopaterno' => 'lopez',
                'apellidomaterno' => 'castro',
                'state' => 0,
                'awkirepresentada_id' => 3,
                'awkizona_id' => 5,
                'awkitienda_id' => 6,
                'created_at' => '2023-11-10 15:25:21',
                'updated_at' => '2023-11-10 15:25:21',
            ),
            11 => 
            array (
                'id' => 12,
                'dni' => '42342343',
                'nombres' => 'washing',
                'apellidopaterno' => 'dedede',
                'apellidomaterno' => 'ededede',
                'state' => 0,
                'awkirepresentada_id' => 3,
                'awkizona_id' => 5,
                'awkitienda_id' => 6,
                'created_at' => '2023-11-10 15:26:27',
                'updated_at' => '2023-11-10 15:26:27',
            ),
            12 => 
            array (
                'id' => 13,
                'dni' => '22447789',
                'nombres' => 'gtgtgtg',
                'apellidopaterno' => 'gtgtgtg',
                'apellidomaterno' => 'tgtgtgtg',
                'state' => 1,
                'awkirepresentada_id' => 2,
                'awkizona_id' => 1,
                'awkitienda_id' => 1,
                'created_at' => '2023-11-10 18:11:37',
                'updated_at' => '2023-11-10 18:11:37',
            ),
            13 => 
            array (
                'id' => 14,
                'dni' => '34393434',
                'nombres' => 'dgsdgdfg',
                'apellidopaterno' => 'dfgdfg',
                'apellidomaterno' => 'fdgdfgdfg',
                'state' => 1,
                'awkirepresentada_id' => 2,
                'awkizona_id' => 2,
                'awkitienda_id' => 3,
                'created_at' => '2023-11-10 18:42:10',
                'updated_at' => '2023-11-10 18:42:10',
            ),
            14 => 
            array (
                'id' => 17,
                'dni' => '4343343',
                'nombres' => 'fghfghfg',
                'apellidopaterno' => 'fghfgh',
                'apellidomaterno' => 'fghfgh',
                'state' => 1,
                'awkirepresentada_id' => 3,
                'awkizona_id' => 5,
                'awkitienda_id' => 6,
                'created_at' => '2023-11-10 19:37:24',
                'updated_at' => '2023-11-10 19:37:24',
            ),
            15 => 
            array (
                'id' => 18,
                'dni' => '12345676',
                'nombres' => 'gtgtgtg',
                'apellidopaterno' => 'tgtgtg',
                'apellidomaterno' => 'tgtgtg',
                'state' => 1,
                'awkirepresentada_id' => 3,
                'awkizona_id' => 3,
                'awkitienda_id' => 7,
                'created_at' => '2023-11-10 19:46:57',
                'updated_at' => '2023-11-10 19:46:57',
            ),
            16 => 
            array (
                'id' => 19,
                'dni' => '34343434',
                'nombres' => 'dfgdfg dfg',
                'apellidopaterno' => 'fgdfgdfg',
                'apellidomaterno' => 'dfdfgdfg',
                'state' => 1,
                'awkirepresentada_id' => 2,
                'awkizona_id' => 1,
                'awkitienda_id' => 4,
                'created_at' => '2023-11-10 19:47:26',
                'updated_at' => '2023-11-10 19:47:26',
            ),
            17 => 
            array (
                'id' => 20,
                'dni' => '99999999',
                'nombres' => 'Luois',
                'apellidopaterno' => 'lopez',
                'apellidomaterno' => 'medrano',
                'state' => 1,
                'awkirepresentada_id' => 7,
                'awkizona_id' => 9,
                'awkitienda_id' => 9,
                'created_at' => '2023-11-11 17:05:39',
                'updated_at' => '2023-11-11 17:05:50',
            ),
            18 => 
            array (
                'id' => 21,
                'dni' => '99889999',
                'nombres' => 'fhdfhfgh',
                'apellidopaterno' => 'fghfgh',
                'apellidomaterno' => 'fghfgh',
                'state' => 0,
                'awkirepresentada_id' => 7,
                'awkizona_id' => 8,
                'awkitienda_id' => 8,
                'created_at' => '2023-11-11 17:07:37',
                'updated_at' => '2023-11-11 17:07:37',
            ),
            19 => 
            array (
                'id' => 22,
                'dni' => '99339999',
                'nombres' => 'gdfgdfg',
                'apellidopaterno' => 'dfgdfg',
                'apellidomaterno' => 'dfgdfg',
                'state' => 1,
                'awkirepresentada_id' => 2,
                'awkizona_id' => 1,
                'awkitienda_id' => 4,
                'created_at' => '2023-11-12 18:27:02',
                'updated_at' => '2023-11-12 18:27:02',
            ),
        ));
        
        
    }
}