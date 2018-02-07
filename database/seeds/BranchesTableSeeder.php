<?php

use Illuminate\Database\Seeder;
use App\Branch;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Branch::truncate();
        for ($i=1; $i < 290; $i++) { 
        	
        	$faker = Faker\Factory::create();

        	Branch::create([

        			'name' =>  $faker->text($maxNbChars = 35),
        			'company_id' => $i,
        			'province_id' => 40,
        			'city_id' => 888,
        			'brgy_id' => 23486,
        			'contact_number' => $faker->numberBetween($min = 10000, $max = 1000000),
        			'street' =>  $faker->text($maxNbChars = 50),
        		]);
        }
    }
}
