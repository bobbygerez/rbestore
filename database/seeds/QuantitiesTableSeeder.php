<?php

use Illuminate\Database\Seeder;
use App\Quantity;

class QuantitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=1; $i < 10000; $i++) { 
        	
        	Quantity::create([

        			'item_id' => $i,
        			'qty' => rand(1, 100)

        		]);
        }
    }
}
