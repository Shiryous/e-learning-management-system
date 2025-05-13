<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\Course;
use App\Models\Enrolment;
use App\Enums\CompletionStatus;

class EnrolmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $students = Student::factory()->count(10)->create();

        $courses = Course::factory()->count(5)->create();

        $completed_enrolments = Enrolment::factory()
                                    ->recycle($students)
                                    ->recycle($courses)
                                    ->count(15)
                                    ->create(['status' => CompletionStatus::COMPLETED]);

        $enrolled_enrolments = Enrolment::factory()
                                    ->recycle($students)
                                    ->recycle($courses)
                                    ->count(10)
                                    ->create(['status' => CompletionStatus::ENROLLED]);

        $failed_enrolments = Enrolment::factory()
                                    ->recycle($students)
                                    ->recycle($courses)
                                    ->count(5)
                                    ->create(['status' => CompletionStatus::FAILED]);

        foreach($students as $student){
            echo $student;
            echo "\n";
        }

        foreach($courses as $course){
            echo $course;
            echo "\n";
        }
        foreach($completed_enrolments as $enrolment){
            echo $enrolment;
            echo "\n";
        }
        foreach($enrolled_enrolments as $enrolment){
            echo $enrolment;
            echo "\n";
        }
        foreach($failed_enrolments as $enrolment){
            echo $enrolment;
            echo "\n";
        }
    }
}
