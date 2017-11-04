<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(PlaceTableSeeder::class);
         $this->call(foodTypesTableSeeder::class);
         $this->call(UsersTableSeeder::class);
         $this->call(FavoriteTableSeeder::class);
         $this->call(PlaceFoodTableSeeder::class);
    }
}
