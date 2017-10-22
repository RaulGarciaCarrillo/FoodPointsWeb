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
                'src' => 'css/img/ic_taco.png',
            ],
            [
                'name' => 'Pizza',
                'src' => 'css/img/ic_pizza.png',
            ],
            [
                'name' => 'Hamburguesas',
                'src' => 'css/img/ic_hamburhuesa.png',
            ],
         	[
                'name' => 'Hotdogs',
                'src' => 'css/img/ic_hotdog.png',
            ],
            [
                'name' => 'Buffet',
                'src' => 'css/img/ic_buffet.png',
            ],
            [
                'name' => 'Snack',
                'src' => 'css/img/ic_snack.png',
            ],
            [
                'name' => 'China',
                'src' => 'css/img/ic_china.png',
            ],
            [
                'name' => 'Otros',
                'src' => 'css/img/ic_otros.png',
            ]
        ]);
    }
}
