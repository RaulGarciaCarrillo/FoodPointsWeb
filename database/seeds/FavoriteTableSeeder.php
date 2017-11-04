<?php

use Illuminate\Database\Seeder;

class FavoriteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('favorite')->insert([
         	[
                'users_id' => '1',
                'place_id' => '1',
            ]
        ]);
    }
}
