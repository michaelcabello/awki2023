<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('permissions')->delete();
        
        \DB::table('permissions')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Representada View',
                'display_name' => 'Ver Clientes Awki',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Representada Create',
                'display_name' => 'Crear Clientes Awki',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Representada Update',
                'display_name' => 'Actualizar Clientes Awki',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Representada Delete',
                'display_name' => 'Eliminar Clientes Awki',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Zona View',
                'display_name' => 'Ver Zonas',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Zona Create',
                'display_name' => 'Crear Zonas',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Zona Update',
                'display_name' => 'Actualizar Zonas',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Zona Delete',
                'display_name' => 'Eliminar Zonas',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Tienda View',
                'display_name' => 'Ver Tiendas',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Tienda Create',
                'display_name' => 'Crear Tiendas',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Tienda Update',
                'display_name' => 'Actualizar Tiendas',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Tienda Delete',
                'display_name' => 'Eliminar Tiendas',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Cliente View',
                'display_name' => 'Ver Clientes',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Cliente Create',
                'display_name' => 'Crear Clientes',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Cliente Update',
                'display_name' => 'Actualizar Clientes',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Cliente Delete',
                'display_name' => 'Eliminar Clientes',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Category View',
                'display_name' => 'Ver Categoria de productos',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Category Create',
                'display_name' => 'Crear Categoria de productos',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Category Update',
                'display_name' => 'Actualizar Categoria de productos',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Category Delete',
                'display_name' => 'Eliminar Categoria de productos',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            20 => 
            array (
                'id' => 21,
                'name' => 'Brand View',
                'display_name' => 'Ver Marca de productos',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            21 => 
            array (
                'id' => 22,
                'name' => 'Brand Create',
                'display_name' => 'Crear Marca de productos',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            22 => 
            array (
                'id' => 23,
                'name' => 'Brand Update',
                'display_name' => 'Actualizar Marca de productos',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            23 => 
            array (
                'id' => 24,
                'name' => 'Brand Delete',
                'display_name' => 'Eliminar Marca de productos',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            24 => 
            array (
                'id' => 25,
                'name' => 'User View',
                'display_name' => 'Ver Usuario',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            25 => 
            array (
                'id' => 26,
                'name' => 'User Create',
                'display_name' => 'Crear Usuario',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            26 => 
            array (
                'id' => 27,
                'name' => 'User Update',
                'display_name' => 'Actualizar Usuario',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            27 => 
            array (
                'id' => 28,
                'name' => 'User Delete',
                'display_name' => 'Eliminar Usuario',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            28 => 
            array (
                'id' => 29,
                'name' => 'Role View',
                'display_name' => 'Ver Roles',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            29 => 
            array (
                'id' => 30,
                'name' => 'Role Create',
                'display_name' => 'Crear Roles',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            30 => 
            array (
                'id' => 31,
                'name' => 'Role Update',
                'display_name' => 'Actualizar Roles',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            31 => 
            array (
                'id' => 32,
                'name' => 'Role Delete',
                'display_name' => 'Eliminar Roles',
                'guard_name' => 'web',
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
        ));
        
        
    }
}