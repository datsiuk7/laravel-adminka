<?php

namespace Database\Seeders;

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
//        \App\Models\Profile::seeder(10)->create();
        $users[] = [
            'name' => "Bohdan",
            'email' => "datcukbogdan@gmail.com",
            'password' => '$2y$10$ESvv5GX5I24wJhA7ohKrhujmsO71IJtuPnGbIUfkZlxheo4WyVVXG',//1235789
        ];
        \DB::table('users')->insert($users);
        $this->call(ProfileSeeder::class);
    }
}
