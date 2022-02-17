<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $date = Carbon::createFromTimeStamp($this->faker->dateTimeBetween('-1 years', '+1 month')->getTimestamp());

        return [
            'title' => $this->faker->word(),
            'desctiption' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'author' => $this->faker->name(),
            'category_id' => $this->faker->numberBetween(1,10),
            'pages' => $this->faker->numberBetween(10,200),
            'date' => $date->toDateTimeString(),
            'photo' => $this->faker->word(),
            'file' => $this->faker->word()
        ];
    }
}
