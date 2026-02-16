<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProcurementFactory extends Factory
{
    public function definition()
    {
        return [
            'item_name' => $this->faker->word,
            'quantity' => $this->faker->numberBetween(1, 100),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'procurement_date' => $this->faker->date(),
        ];
    }
}
