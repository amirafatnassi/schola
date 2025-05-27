<?php

namespace Database\Factories;

use App\Models\User;
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
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'rating' => $this->faker->randomFloat(1, 1, 5),
            'price' => $this->faker->randomFloat(2, 50, 500),
            'duration' => $this->faker->numberBetween(5, 120), // Random duration in hours
            'language' => $this->faker->randomElement(['fr', 'en', 'ar']),
            'level' => $this->faker->randomElement(['beginner', 'advanced']),
            'instructor_id' => User::where('role', 'instructor')->inRandomOrder()->first()->id,
            'certificate_available' => $this->faker->boolean,
            'credits' => $this->faker->boolean,
            'image' => 'img/course-' . rand(1, 3) . '.jpg',
            'category' => $this->faker->randomElement(['Informatique', 'Business', 'Marketing', 'Design', 'Santé']),
        ];
    }
}
