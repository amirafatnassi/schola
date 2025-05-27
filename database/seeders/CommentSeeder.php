<?php

namespace Database\Seeders;


use App\Models\Comment;
use App\Models\Course;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Get all courses
        $courses = Course::all();

        // Loop through each course and create comments
        foreach ($courses as $course) {
            // Create 5 root comments for each course
            $rootComments = \App\Models\Comment::factory(5)->create([
                'course_id' => $course->id,
                'parent_id' => null, // Root comments have no parent
            ]);

            // For each root comment, create 2 replies
            $rootComments->each(function ($rootComment) {
                Comment::factory(2)->replyTo($rootComment)->create();
            });
        }
    }
}
