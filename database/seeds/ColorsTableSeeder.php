<?php

use Illuminate\Database\Seeder;
use App\Color;
use App\Item;
use App\Image;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $array = ['White', 'Yellow', 'Fuchsia', 'Red', 'Silver', 'Gray', 'Olive', 'Purple', 'Maroon', 'Aqua', 'Lime'];

        foreach ($array as $key => $value) {
        	
        	$color = Color::create([

        			'name' => $value
        		]);


        }

        for ($i=1; $i < 10000; $i++) { 
        	
        	$item = Item::find($i);
        	$item->colors()->attach([rand(1, 11)]);
            Image::create([
                    'path' => 'images/uploads/colors/color-1' . rand(1, 7) . '.jpg',
                    'imageable_id' => $i,
                    'imageable_type' => 'App\\Color',
                    'body' => 'text ' . $i

                ]);
        }

        
    }
}
