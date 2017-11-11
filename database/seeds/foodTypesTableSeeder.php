<?php

use Illuminate\Database\Seeder;

class foodTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         DB::table('foodType')->insert([
         	[
                'name' => 'Tacos',
                'src' => 'img/ic_taco.png',
            ],
            [
                'name' => 'Pizza',
                'src' => 'img/ic_pizza.png',
            ],
            [
                'name' => 'Hamburguesas',
                'src' => 'img/ic_hamburguesa.png',
            ],
         	[
                'name' => 'Hotdogs',
                'src' => 'img/ic_hotdog.png',
            ],
            [
                'name' => 'Buffet',
                'src' => 'img/ic_buffet.png',
            ],
            [
                'name' => 'Snack',
                'src' => 'img/ic_snack.png',
            ],
            [
                'name' => 'China',
                'src' => 'img/ic_china.png',
            ],
            [
                'name' => 'Otros',
                'src' => 'img/ic_otros.png',
            ]
        ]);
    }
}
