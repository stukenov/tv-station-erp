<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaxFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'rate' => $this->faker->randomFloat(2, 1, 20),
        ];
    }
}
