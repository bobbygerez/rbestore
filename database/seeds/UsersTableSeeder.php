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
         $faker = Faker\Factory::create();

        User::create([
                'uuid' => Uuid::generate(),
        		'firstname' => 'Jhon',
        		'lastname' => 'Doe',
                'company' => $faker->company, 
        		'email' => 'jhon@rbestore.com',
                'mobile' => '12345678931',
        		'password' => Hash::make('12345678')

        	]);

        User::create([
                'uuid' => Uuid::generate(),
                'firstname' => 'user 1',
                'lastname' => 'user 1',
                'company' => $faker->company, 
                'email' => 'user1@rbestore.com',
                'mobile' => '12345678914',
                'password' => Hash::make('12345678')

            ]);

        for ($i=2; $i < 100; $i++) { 
            
            User::create([
                    'uuid' => Uuid::generate(),
                    'firstname' => $faker->firstName,
                    'lastname' => $faker->lastName,
                    'company' => $faker->company, 
                    'mobile' => $faker->bankAccountNumber,
                    'email' => $faker->safeEmail,
                    'password' => Hash::make('12345678'),

                ]);
        }
    }
}
