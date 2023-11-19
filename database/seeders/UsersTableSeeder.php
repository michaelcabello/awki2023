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
                'email_verified_at' => '2023-11-09 05:39:51',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'PqEImlKmoT',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'joffre',
                'email' => 'joffre@ticomperu.com',
                'email_verified_at' => '2023-11-09 05:39:51',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'GMvjvXOhou',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'luis',
                'email' => 'luis@ticomperu.com',
                'email_verified_at' => '2023-11-09 05:39:51',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'c83Ut7wHqu',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'leydy',
                'email' => 'leydy@ticomperu.com',
                'email_verified_at' => '2023-11-09 05:39:51',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'hewhsILS8f',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'abc',
                'email' => 'abc@abc.com',
                'email_verified_at' => '2023-11-09 05:39:51',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'Qk037HRwsy',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'flor',
                'email' => 'flor@gmail.com',
                'email_verified_at' => '2023-11-09 05:39:51',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'sDTj9DGd58',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'diana',
                'email' => 'diana@gmail.com',
                'email_verified_at' => '2023-11-09 05:39:51',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'b1PIrnSkPT',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'xyz',
                'email' => 'xyz@gmail.com',
                'email_verified_at' => '2023-11-09 05:39:51',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'KRYhfA2IiS',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'volvo',
                'email' => 'volvo@gmail.com',
                'email_verified_at' => '2023-11-09 05:39:51',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'ME7oY41O0l',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'chevrolet',
                'email' => 'chevrolet@gmail.com',
                'email_verified_at' => '2023-11-09 05:39:51',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'syKY217QTs',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'toyota',
                'email' => 'toyota@gmail.com',
                'email_verified_at' => '2023-11-09 05:39:51',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => 'y7ffcLPvjK',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-09 05:39:51',
                'updated_at' => '2023-11-09 05:39:51',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'integra',
                'email' => 'integra@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$BS8vbTvS1hThv8btP6/Eq.3BwqfZt01VGnyVfsRoT1cOz6mbiAUhC',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-11 16:50:32',
                'updated_at' => '2023-11-11 16:50:32',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'arnold',
                'email' => 'arnold@awki.com.pe',
                'email_verified_at' => NULL,
                'password' => '$2y$10$TVhDXA5d.h1jDOZlgAS70u.rLfcF27xOxI30BS/0HNU6elvYHT/9i',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-11 16:52:47',
                'updated_at' => '2023-11-11 16:52:47',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'yamaha',
                'email' => 'yamaha@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$3PPU8qRz4m2LOnQsEBriquvO5zRAz1o3XbMm1GnPlje5SELxAE//G',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'notification' => 0,
                'created_at' => '2023-11-11 16:58:45',
                'updated_at' => '2023-11-11 16:58:45',
            ),
        ));
        
        
    }
}