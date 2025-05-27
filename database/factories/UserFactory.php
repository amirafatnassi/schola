<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $roles = ['student', 'instructor', 'admin'];
        $firstname= fake()->firstName();
        $lastname= fake()->lastName();
        $username=$firstname.'-'.$lastname;

        $images = glob(storage_path('app/public/profile_pictures/*.jpg')); // récupère toutes les images
        $randomImage = $images ? basename(fake()->randomElement($images)) : null;

        return [
            'firstname' => $firstname ,
            'lastname' => $lastname ,
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role' => fake()->randomElement($roles),
            'avatar' => $randomImage ? 'profile_pictures/' . $randomImage : null,
            'rating' => fake()->randomFloat(1, 3.5, 5.0), // Ratings between 3.5 and 5
            'linkedin' => 'https://linkedin.com/' . $username,
            'facebook' =>'https://facebook.com/' . $username,
            'instagram' =>'https://instagram.com/' . $username,
            'website' => fake()->optional()->url(),

        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
