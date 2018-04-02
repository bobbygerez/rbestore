<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['GlobalAdmin', 'LocalAdmin', 'User'];


        foreach ($roles as $key => $value) {
        	Role::create([
        			'name' => $value,
        			'desc' => $value . ' desc'
        		]);
        }

       $user = User::find(2);
       $user->roles()->attach([
       		'user_id' => 2,
       		'role_id' => 1
       	]);
    }
}
