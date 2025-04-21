<?php

namespace Database\Factories\Dashboard;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plane>
 */
class PlaneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name-en','name-ar', 'price', 'product_numbers', 'period'
           'name_en' => $this->faker->word(),
            'name_ar' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 1, 100),
            'product_numbers' => $this->faker->numberBetween(1, 100),
            'period' => $this->faker->numberBetween(1, 12),

        ];
    }
}
