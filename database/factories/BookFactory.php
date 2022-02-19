<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
//use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;


class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $timestamp = mt_rand(1, time());
        $randomDate = date("d/m/Y", $timestamp);
        $countCategory =  DB::table('category')->count();
        //$date = Carbon::createFromTimeStamp($this->faker->dateTimeBetween('-1 years', '+1 month')->getTimestamp());
        //dd($date);
        $file = ['5e406bcf48c4d', '5e406ca097bd7', '5e406d1024981', '5e406da7957b6', '5e406e2bc8317', '5e406ea7ad78f'];

        return [
            'title' => $this->faker->sentence(
                $this->faker->numberBetween(1,10), true),
            'description' => $this->faker->sentence(
                $this->faker->numberBetween(50,200)
            ),
            'author' => $this->faker->name(),
            'category_id' => $this->faker->numberBetween(1,$countCategory), 
            'pages' => $this->faker->numberBetween(10,500),
            'date' => $randomDate,
            'photo' => $this->faker->numberBetween(1,6).'.jpg',
            'file' => Arr::random($file).'.pdf'
        ];
    }
}
