<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\Course;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Enrolment>
 */
class EnrolmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $enrolment_date = fake()->date();
        return [
            'student_id' => Student::factory(),
            'course_id' => Course::factory(),
            'status' => fake()->randomElement(['enrolled', 'completed', 'failed']),
            'enrollment_date' => $enrolment_date,
            'completion_date' => fake()->dateTimeBetween($enrolment_date, now())->format('Y-m-d'),
            'grade' => random_int(1, 10),
        ];
    }
}
