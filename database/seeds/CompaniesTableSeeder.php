<?php

use Illuminate\Database\Seeder;
use App\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
       for ($i=1; $i < 98; $i++) { 
        	
        	Company::create([
        			'user_id' => $i,
        			'name' => $faker->text($maxNbChars = 20)

        		]);
        }
    }
}
