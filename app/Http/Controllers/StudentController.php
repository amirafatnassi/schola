<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Module;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index()
    {
        $students = User::where('role','student')->get();

        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        $student = User::create($request->validated());

        return redirect()->route('students.index')
            ->with('success', 'Instructeur ajouté avec succès.');
    }

    /**
     * Display the specified student.
     */
    public function show($id)
    {
        $student = User::findOrFail($id);

        return view('students.show', compact('student'));
    }


    /**
     * Show the form for editing the specified student.
     */
    public function edit(User $student)
    {
        return view('students.edit', compact('student'));
    }

    /**
     * Update the specified student in storage.
     */
    public function update(Request $request, User $student)
    {
        $student->update($request->validated());

        return redirect()->route('students.index')
            ->with('success', 'Instructeur mis à jour avec succès.');
    }

    /**
     * Remove the specified student from storage.
     */
    public function destroy(User $student)
    {
        $student->delete();

        return redirect()->route('students.index')
            ->with('success', 'student supprimé avec succes.');
    }
}
