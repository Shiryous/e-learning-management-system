<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_date = fake()->dateTimeThisMonth()->format('Y-m-d');
        return [
            'title' => fake()->words(2, true),
            'description' => fake()->paragraph(),
            'lecture_hours' => random_int(1, 10),
            'start_date' => $start_date,
            'end_date' => fake()->dateTimeBetween($start_date, now())->format('Y-m-d'),
        ];
    }
}
