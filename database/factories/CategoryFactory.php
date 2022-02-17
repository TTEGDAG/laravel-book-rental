<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class CategoryFactory extends Factory
{
   
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        $array = ['Dla dzieci', 'Literatura obyczajowa', 'Historia', 'Kryminały, sensacje, thriller', 'Biznes, ekonomia, marketing', 'Nauka języków', 'Biografie'];
        return [
            //'name' => $this->faker->word()
            'name' => Arr::random($array)
            //'name' => $this->faker->randomElement(['aaa', 'bbb', 'ccc', 'ddd', 'eee', 'fff'])
        ];
    }
}
