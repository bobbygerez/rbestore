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
        Image::truncate();
        
        for ($i=0; $i < 10000; $i++) { 
        	
        	Image::create([
        			'path' => 'images/uploads/' . rand(1, 68) . '.jpg',
        			'imageable_id' => rand(1, 10000),
        			'imageable_type' => 'App\\Item',
        			'body' => 'text ' . $i

        		]);
        }

        for ($i= 1; $i < 102; $i++) { 
            Image::create([
                    'path' => 'images/uploads/' . rand(1, 68) . '.jpg',
                    'imageable_id' => $i,
                    'imageable_type' => 'App\\User',
                    'body' => 'text ' . $i

                ]);
        }

        for ($i= 1; $i < 291; $i++) { 

            Image::create([
                    'path' => 'images/uploads/companies/logo' . rand(1, 20) . '.jpg',
                    'imageable_id' => $i,
                    'imageable_type' => 'App\\Company',
                    'body' => 'text ' . $i

                ]);
        }

        
    }
}
