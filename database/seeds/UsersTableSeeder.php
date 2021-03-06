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
                'jobtitle' => $faker->text($maxNbChars = 30),
        		'email' => 'jhoaan@rbestore.com',
                'mobile' => '123456789311',
        		'password' => Hash::make('1234')

        	]);

        User::create([
                'uuid' => Uuid::generate(),
                'firstname' => 'user 1',
                'lastname' => 'user 1',
                'company' => $faker->company, 
                'jobtitle' => $faker->text($maxNbChars = 30),
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
                    'jobtitle' => $faker->text($maxNbChars = 30),
                    'mobile' => $faker->bankAccountNumber,
                    'email' => $faker->safeEmail,
                    'password' => Hash::make('12345678'),

                ]);
        }
    }
}
