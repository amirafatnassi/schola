<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'firstname' => 'Admin',
            'lastname' => 'User',
            'email' => 'admin@example.com',
            'role'=>'admin'
        ]);

        User::factory()->count(5)->create(['role' => 'instructor']);
        User::factory()->count(20)->create(['role' => 'student']);

        $this->call([
            CourseSeeder::class,
            CourseSeeder::class,
            ModuleSeeder::class,
            CommentSeeder::class,
            TestimonialSeeder::class,
            EnrollmentSeeder::class,
        ]);
    }
}
