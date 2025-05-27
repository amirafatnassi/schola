<?php

namespace Database\Factories;

use App\Models\Comment;
use App\Models\Course;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'content' => $this->faker->paragraph, // Random content for the comment
            'user_id' => User::factory(), // Random user (commenter)
            'course_id' => Course::factory(), // Random course
            'parent_id' => null, // Default to root comment (no parent)
        ];
    }

    /**
     * Indicate that the comment is a reply to another comment.
     */
    public function replyTo(Comment $comment)
    {
        return $this->state([
            'parent_id' => $comment->id, // Set the parent_id to the parent comment
        ]);
    }
}
