<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(TypesTableSeeder::class);
        $this->call(ProducteursTableSeeder::class);
        $this->call(WinesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
    }
}
