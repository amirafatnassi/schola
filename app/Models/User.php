<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'password',
        'role',
        'avatar',
        'rating',
        'linkedin',
        'facebook',
        'instagram',
        'website'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relationships
    public function coursesTaught()
    {
        return $this->hasMany(Course::class, 'instructor_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)
            ->withPivot('enrolled_at', 'completed_at', 'modules_completed')
            ->withTimestamps();
    }
}
