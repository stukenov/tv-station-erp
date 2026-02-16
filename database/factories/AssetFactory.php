<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AssetFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'value' => $this->faker->randomFloat(2, 1000, 100000),
            'purchase_date' => $this->faker->date(),
        ];
    }
}
