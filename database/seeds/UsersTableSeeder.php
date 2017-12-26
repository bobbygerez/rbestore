<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        User::create([
        		'firstname' => 'Jhon',
        		'lastname' => 'Doe',
        		'email' => 'jhon@rbestore.com',
        		'password' => Hash::make('12345678')

        	]);

        User::create([
                'firstname' => 'user 1',
                'lastname' => 'user 1',
                'email' => 'user1@rbestore.com',
                'password' => Hash::make('12345678')

            ]);
    }
}
