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
                'name' => 'Melinda',
                'email' => 'melinda.fabien@etu.univ-lyon1.fr',
                'email_verified_at' => NULL,
                'password' => '$2y$10$uqRHEHXLjzMKhgrsWa2bye3PaohlKqvlLMbwHtyi7.iAa8CJ.uxd2',
                'remember_token' => NULL,
                'created_at' => '2022-06-12 16:49:25',
                'updated_at' => '2022-06-12 16:49:25',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Ludovic',
                'email' => 'Ludovic.rocher@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$Vc8bL3Ytb6Uzq.RVn4g2SeVltZ5RNCFi7QMxzPozvY2MNepTkiapi',
                'remember_token' => NULL,
                'created_at' => '2022-06-12 16:50:12',
                'updated_at' => '2022-06-12 16:50:12',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'userpassword',
                'email' => 'userpassword@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$10$oc3BAfR12gA1L8SWW85lSOhiVa7W8cX8A.IYn8u4DJ0hhYDKn4Vam',
                'remember_token' => NULL,
                'created_at' => '2022-06-12 16:50:40',
                'updated_at' => '2022-06-12 16:50:40',
            ),
        ));
        
        
    }
}