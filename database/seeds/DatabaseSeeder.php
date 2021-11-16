<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(ClockSeeder::class);
       // $this->call(registrationsseeder::class);
        $this->call(positionseeder::class);
        $this->call(departmentseeder::class);
        $this->call(leavesseed::class);
        $this->call(leaves_typeseeder::class);
        $this->call(JobsSeeder::class);
        
    }
}
