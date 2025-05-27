<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Seeder;

class EnrollmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Loop through a few users and courses
        User::all()->each(function ($user) {
            // Select a random number of courses to enroll the user in
            $courses = Course::inRandomOrder()->take(rand(1, 3))->get();

            foreach ($courses as $course) {
                // Enroll user in the course with a random enrollment date
                $user->courses()->attach($course->id, [
                    'enrolled_at' => now(),
                    'completed_at' => null, // Or set to a random date based on your business rules
                    'modules_completed' => json_encode([]), // Empty array initially
                ]);
            }
        });
    }
}
