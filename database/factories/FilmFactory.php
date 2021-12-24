<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class FilmFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> "Film ".$this->faker->name,
            'director_id'=> $this->faker->unique()->numberBetween(1,30),
        ];
    }
}
