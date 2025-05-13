<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enrolment;

class EnrolmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::factory()->count(10)->create();

        $courses = Course::factory()->count(5)->create();

        $enrolments = Enrolment::factory()
                        ->recycle($students)
                        ->recycle($courses)
                        ->count(30)
                        ->create();

        foreach($students as $student){
            echo $student;
            echo "\n";
        }

        foreach($courses as $course){
            echo $course;
            echo "\n";
        }
        foreach($enrolments as $enrolment){
            echo $enrolment;
            echo "\n";
        }
    }
}
