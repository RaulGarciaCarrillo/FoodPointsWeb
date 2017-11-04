<?php

use Illuminate\Database\Seeder;

class PlaceFoodTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('place_food')->insert([
         	[
                'place_id' => '1',
                'foodType_id' => '1',
            ]
        ]);
    }
}
