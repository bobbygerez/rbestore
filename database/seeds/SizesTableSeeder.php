<?php

use Illuminate\Database\Seeder;
use App\Size;
use App\Item;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker\Factory::create();
        // $sizes = ['SM', 'M', 'L', 'XL'];
        // for ($i=0; $i < 1000; $i++) { 
        	
        // 	Size::create([
        // 			'user_id' => rand(1, 100),
        // 			'name' => $sizes[rand(0,3)],
        // 			'desc' => $faker->text($maxNbChars = 30)
        // 		]);
        // }

        for ($i=3; $i < 999 ; $i++) { 
            $size = Size::find($i);
            $size->item()->attach([$i]);
        }
    }
}
