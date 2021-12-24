<?php

namespace Database\Seeders;

use App\Models\Director;
use App\Models\Film;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i<=2; $i++) {
            $profile[] = [
                'name' => $faker->name(),
                'year_old' => $faker->numberBetween(10, 70),
                'created_at' => date("Y-m-d"),
                'updated_at' => $faker->date("Y-m-d"),
                'birthday_at' => $faker->date("Y-m-d")
            ];
        }

//        \DB::table('profiles')->insert($profile);
//        \DB::statement('UPDATE profiles SET sort_order = id');

//        Director::factory(30)->create();
        Film::factory(30)->create();


    }
}
