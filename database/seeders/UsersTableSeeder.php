<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Michael',
                'email' => 'michael@ticomperu.com',
                'email_verified_at' => '2023-11-07 19:33:49',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'BzHZZv9XX4',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-07 19:33:49',
                'updated_at' => '2023-11-07 19:33:49',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'joffre',
                'email' => 'joffre@ticomperu.com',
                'email_verified_at' => '2023-11-07 19:33:49',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'bxsNi2roSr',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-07 19:33:49',
                'updated_at' => '2023-11-07 19:33:49',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'luis',
                'email' => 'luis@ticomperu.com',
                'email_verified_at' => '2023-11-07 19:33:49',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'oFuHp7QJVJ',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-07 19:33:49',
                'updated_at' => '2023-11-07 19:33:49',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'leydy',
                'email' => 'leydy@ticomperu.com',
                'email_verified_at' => '2023-11-07 19:33:49',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'GtXzjHHVlU',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-07 19:33:49',
                'updated_at' => '2023-11-07 19:33:49',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'abc',
                'email' => 'abc@abc.com',
                'email_verified_at' => '2023-11-07 19:33:49',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'JTJygbLUf7',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-07 19:33:49',
                'updated_at' => '2023-11-07 19:33:49',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'tarapoto',
                'email' => 'tarapoto@tarapoto.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$jD2zOdLkJT6KT84iho0WS.L.iteokpHlqGH4VRZwLEGNuE6sV5zYW',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-07 23:19:24',
                'updated_at' => '2023-11-07 23:19:24',
            ),
        ));
        
        
    }
}