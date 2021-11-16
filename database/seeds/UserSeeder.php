<?php

use App\User;
use App\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        User::truncate();
        Admin::truncate();


        $faker = \Faker\Factory::create();

        Admin::create([
            'name' => $faker->name,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),   
            'is_super' => 1,
        ]);

        User::create([
            'name' => $faker->name,
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => $faker->PhoneNumber,
            'status' => 1,
            'role' => 1,
            'pos_id' => $faker->randomElement([1,2,3,4,5,6]) ,
            'dep_id' =>$faker->randomElement([1,2,3,4,5]) ,
        ]);

        User::create([
            'name' => $faker->name,
            'email' => 'HR@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => $faker->PhoneNumber,
            'status' => 1,
            'role' => 2,
            'pos_id' => $faker->randomElement([1,2,3,4,5,6]) ,
            'dep_id' =>$faker->randomElement([1,2,3,4,5]) ,
        ]);

        User::create([
            'name' => $faker->name,
            'email' => 'MD@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => $faker->PhoneNumber,
            'status' => 1,
            'role' => 3,
            'pos_id' => $faker->randomElement([1,2,3,4,5,6]) ,
            'dep_id' =>$faker->randomElement([1,2,3,4,5]) ,
        ]);

        User::create([
            'name' => $faker->name,
            'email' => 'user@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => $faker->PhoneNumber,
            'status' => 1,
            'role' => 4,
            'pos_id' => $faker->randomElement([1,2,3,4,5,6]) ,
            'dep_id' =>$faker->randomElement([1,2,3,4,5]) ,
        ]);


        // Let's make sure everyone has the same password and
        // let's hash it before the loop, or else our seeder
        // will be too slow.
        $password = Hash::make('12345678');

        
        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 50; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
                'phone' => $faker->PhoneNumber,
                'status' => rand(1,0),
                'role' => 4,
                'pos_id' => $faker->randomElement([1,2,3,4,5,6]) ,
                'dep_id' =>$faker->randomElement([1,2,3,4,5]) ,
                // 'remember_token' => str_random(10),
            ]);
        }

      

    }
}
