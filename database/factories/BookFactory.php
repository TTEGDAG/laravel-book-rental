<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

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
        $file = ['5e406bcf48c4d', '5e406ca097bd7', '5e406d1024981', '5e406da7957b6', '5e406e2bc8317', '5e406ea7ad78f'];

        return [
            'title' => $this->faker->word(),
            'desctiption' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'author' => $this->faker->name(),
            'category_id' => $this->faker->numberBetween(1,7), // <-- tu należy zwrucić liczbę kategorii z bazy danych 
            'pages' => $this->faker->numberBetween(10,200),
            'date' => $date->toDateTimeString(),
            'photo' => $this->faker->numberBetween(1,6),
            'file' => Arr::random($file)
        ];
    }
}
