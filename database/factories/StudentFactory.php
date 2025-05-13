<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $birth_date = fake()->date();
        return [
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'birth_date' => $birth_date,
            'entry_date' => fake()->dateTimeBetween($birth_date, now())->format('Y-m-d'),
            'email' => fake()->unique()->safeEmail(),
            'father_name' => fake()->firstName(),
        ];
    }
}
