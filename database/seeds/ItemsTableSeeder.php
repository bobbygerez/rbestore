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
        
        for ($i=0; $i < 30; $i++) { 
        	
        	Item::create([
        			'user_id' => rand(1,2),
        			'unit_id' => rand(1, 10),
        			'category_id' => rand(1, 8),
        			'subcategory_id' => rand(1, 26),
        			'further_category_id' => rand(1, 99),
        			'name' => 'item ' . $i,
        			'short_desc' => 'description ' . $i
        		]);
        }
    }
}
