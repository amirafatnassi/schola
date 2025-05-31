<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('duration'); // durée en heures
            $table->foreignId('instructor_id')->constrained('users')->onDelete('cascade');  // Related to users table (instructors)
            $table->enum('level', ['beginner', 'intermediate', 'advanced']);
            $table->float('rating')->nullable();
            $table->string('image')->nullable(); // URL ou chemin
            $table->enum('language', ['fr', 'en', 'ar'])->default('fr');
            $table->boolean('certificate_available')->default(false);
            $table->boolean('credits')->default(false);
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
