<?php

use Illuminate\Database\Seeder;
use App\Menu;
use App\Role;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        // $menus = ['Home','Profile', 'Users', 'Stores', ];

        // foreach ($menus as $value) {
        	
        // 	Menu::create([
        // 			'name' => $value
        // 		]);



        // }

        $roles = [1, 2, 3];

	        foreach ($roles as $value) {
				
	        	$role = Role::find($value);
	        	$role->menu()->attach($value, [

	        			'menu_id' => rand(7, 10),
	        			'role_id' => $value
	        		]);
	        }


    }
}
