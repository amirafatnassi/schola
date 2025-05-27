<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\userController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\auth\loginController as loginController;
use App\Http\Controllers\auth\sessionController as sessionController;
use App\Http\Controllers\StudentController;


Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile');
});

Route::get('/', function () {
    return view('index');
})->name('home');
Route::get('/login', [sessionController::class, 'create'])->name('login');
Route::post('/login', [sessionController::class, 'store'])->name('login');
Route::post('/logout', [sessionController::class, 'destroy'])->name('logout');
Route::get('/register', [loginController::class, 'create'])->name('register');
Route::post('/register', [loginController::class, 'store']);
Route::resource('courses', CourseController::class);
Route::get('my-courses', [CourseController::class, 'myCourses'])->middleware('auth');
Route::post('/courses/{id}/enroll', [CourseController::class, 'enroll'])->name('courses.enroll')->middleware('auth');
Route::resource('users', userController::class);
Route::resource('instructors', InstructorController::class);
Route::resource('students', StudentController::class);
Route::get('theme', function () {
    return view('theme');
})->name('theme');
Route::get('/set-theme/{theme}', function ($theme) {
    session(['theme' => $theme]);
    return redirect()->back();
})->name('set-theme');

Route::get('index', function () {
    return view('index');
});
Route::get('404', function () {
    return view('404');
});
Route::get('about', function () {
    return view('about');
})->name('about');
Route::get('blog', function () {
    return view('blog');
});
Route::get('contact', function () {
    return view('contact');
});
Route::get('testimonial', function () {
    return view('testimonial');
});
