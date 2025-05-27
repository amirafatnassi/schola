<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $students = User::where('role', 'student')->get();
        $courses = Course::all();

        $courses->each(function ($course) use ($students) {
            // Create random testimonials for each course
            Testimonial::factory()->count(3)->create([
                'course_id' => $course->id,
                'user_id' => $students->random()->id,
            ]);
        });
    }
}
