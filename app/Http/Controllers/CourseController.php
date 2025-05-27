<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the courses.
     */
    public function index()
    {
        // $courses = Course::latest()->paginate(10);
        $courses = Course::get();

        return view('courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new course.
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created course in storage.
     */
    public function store(Request $request)
    {
        $course = Course::create($request->validated());

        return redirect()->route('courses.index')
            ->with('success', 'Cours ajouté avec succès.');
    }

    /**
     * Display the specified course.
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);

        return view('courses.show', compact('course'));
    }


    /**
     * Show the form for editing the specified course.
     */
    public function edit(Course $course)
    {
        return view('courses.edit', compact('course'));
    }

    /**
     * Update the specified course in storage.
     */
    public function update(Request $request, Course $course)
    {
        $course->update($request->validated());

        return redirect()->route('courses.index')
            ->with('success', 'Cours mis à jour avec succès.');
    }

    /**
     * Remove the specified course from storage.
     */
    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('courses.index')
            ->with('success', 'Cours supprimé avec succes.');
    }

    public function enroll($id)
    {
        $user = Auth::user();
        $course = Course::findOrFail($id);

        if (!$user->courses()->where('course_id', $course->id)->exists()) {
            $user->courses()->attach($course->id);

            // Store in session that user is now enrolled
            session()->flash('enrolled_course', $course->id);
            return redirect()->back();
        }

        // Already enrolled - also flash course ID
        session()->flash('already_enrolled', $course->id);
        return redirect()->back();
    }

    public function myCourses()
    {
        $user = Auth::user();
        $courses = $user->courses; // Or ->paginate(10) for pagination

        return view('courses.my-courses', compact('courses'));
    }
}
