<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnrollmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Get random user and course
        $user = User::inRandomOrder()->first(); // Select a random user
        $course = Course::inRandomOrder()->first(); // Select a random course

        // Enrolled date
        $enrolledAt = $this->faker->dateTimeThisYear;

        // Completion date, optional (might be null if not completed yet)
        $completedAt = rand(0, 1) ? $this->faker->dateTimeBetween($enrolledAt) : null;

        // Random modules completed
        $modulesCompleted = Course::find($course->id)
            ->modules()
            ->pluck('id')
            ->random(rand(1, 5)) // Random number of modules completed
            ->toArray();

        return [
            'user_id' => $user->id,
            'course_id' => $course->id,
            'enrolled_at' => $enrolledAt,
            'completed_at' => $completedAt,
            'modules_completed' => json_encode($modulesCompleted),
        ];
    }
}
