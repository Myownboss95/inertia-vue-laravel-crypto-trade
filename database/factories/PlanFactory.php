<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plan>
 */
class PlanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->randomElement(['Gold', 'Silver', 'Bronze', 'Platinum']),
            'tenure' => fake()->randomElement([28, 15, 5, 356]),
            'bonus' => fake()->randomElement([10,15,25,30])
        ];
    }

    public function demo()
    {
        return $this->state(fn (array $attr) => ['demo' => true]);
    }
}
