<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a few sample courses with random instructors
        $instructors = User::where('role', 'instructor')->get();

        Course::factory()->count(10)->create()->each(function ($course) use ($instructors) {
            $course->instructor_id = $instructors->random()->id;
            $course->save();
        });
    }
}
