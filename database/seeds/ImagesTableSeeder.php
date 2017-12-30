<?php

use Illuminate\Database\Seeder;
use App\Image;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=0; $i < 1000; $i++) { 
        	
        	Image::create([
        			'path' => 'images/uploads/' . rand(1, 68) . '.jpg',
        			'imageable_id' => rand(1, 1000),
        			'imageable_type' => 'App\\Item',
        			'body' => 'text ' . $i

        		]);
        }
    }
}
