<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Goal>
 */
class GoalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'title' => $this->faker->sentence, // Generates a random sentence
            'description' => $this->faker->paragraph, // Generates a random paragraph
            'target_date' => $this->faker->date, // Generates a random date
            'progress' => $this->faker->numberBetween(0, 100), // Generates a random number between 0 and 100
        ];
    }
}
