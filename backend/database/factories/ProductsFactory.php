<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;

class ProductsFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'value' => $this->faker->randomFloat(2, 1, 400)
        ];
    }
}
