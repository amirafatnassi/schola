<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'rating',
        'level',
        'language',
        'duration',
        'instructor',
        'certificate_available',
        'credits',
        'image',
        'category_id',
    ];

    // Relationships
    public function instructor()
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class)->orderBy('order');
    }

    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user')
            ->withPivot('enrolled_at', 'completed_at', 'modules_completed') // Include pivot data
            ->withTimestamps();
    }
}
