<?php

namespace Database\Factories\Dashboard;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(), // اسم متجر بالإنجليزي
            'email' => $this->faker->unique()->safeEmail(),
            'phone' => $this->faker->phoneNumber(),
            'location' => $this->faker->address(),
            'facebook' => 'https://facebook.com/' . $this->faker->userName(),
            'instagram' => 'https://instagram.com/' . $this->faker->userName(),
            'user_id' => User::factory(),
        ];
    }

}
