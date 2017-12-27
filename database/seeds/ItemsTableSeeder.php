<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        for ($i=0; $i < 30; $i++) { 
        	
        	Item::create([
        			'user_id' => rand(1,2),
        			'unit_id' => rand(1, 10),
        			'category_id' => rand(1, 8),
        			'subcategory_id' => rand(1, 26),
        			'further_category_id' => rand(1, 99),
        			'name' =>  $faker->text($maxNbChars = 35),
                    'amount' => $faker->randomFloat($nbMaxDecimals = 2, $min = 50, $max = 99000),
                    'discount' => $faker->numberBetween($min = 1, $max = 99),
        			'short_desc' => $faker->text($maxNbChars = 100) 
        		]);
        }
    }
}
