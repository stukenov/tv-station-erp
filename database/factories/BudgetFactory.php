<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BudgetFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->sentence,
            'amount' => $this->faker->randomFloat(2, 1000, 100000),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
        ];
    }
}
