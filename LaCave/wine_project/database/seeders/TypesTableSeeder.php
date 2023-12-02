<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('types')->delete();
        
        \DB::table('types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'blanc',
                'appelation' => 'AOC/AOP',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'rouge',
                'appelation' => 'AOC/AOP',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 'rosé',
                'appelation' => 'AOC/AOP',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
            3 => 
            array (
                'id' => 4,
                'type' => 'blanc',
                'appelation' => 'IGP',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
            4 => 
            array (
                'id' => 5,
                'type' => 'rouge',
                'appelation' => 'IGP',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
            5 => 
            array (
                'id' => 6,
                'type' => 'rosé',
                'appelation' => 'IGP',
                'created_at' => '2022-06-11 13:06:32',
                'updated_at' => '2022-06-11 13:06:32',
            ),
        ));
        
        
    }
}