<?php

use Illuminate\Database\Seeder;
use App\Size;

class SizesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=0; $i < 1000; $i++) { 
        	
        	Size::create([
        			'user_id' => rand(1, 100),
        			'name' => $faker->text($maxNbChars = 20),
        			'desc' => $faker->text($maxNbChars = 30)
        		]);
        }
    }
}
