<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        \App\Models\User::factory(1)->admin()->create(
            [
                'first_name' => 'Admin',
                'last_name' => 'One',
                'password' => '$2y$10$I5dKQqGtXozJMhxzGxRw9OytGTddCore5VTkGTJ/EaGmIvWlPu2JG' // password
            ]
        );
        \App\Models\User::factory(1)->user()->create();
        Plan::factory(3)->hasFeatures(3)->create();
        Plan::factory(3)->demo()->hasFeatures(3)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
