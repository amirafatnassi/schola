<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModuleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $courses = Course::all();

        // Create sample modules for each course
        $courses->each(function ($course) {
            Module::factory()->count(5)->create([
                'course_id' => $course->id,
            ]);
        });
    }
}
