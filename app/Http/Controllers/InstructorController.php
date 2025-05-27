<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Module;

class InstructorController extends Controller
{
    /**
     * Display a listing of the instructors.
     */
    public function index()
    {
        $instructors = User::where('role','instructor')->get();

        return view('instructors.index', compact('instructors'));
    }

    /**
     * Show the form for creating a new instructor.
     */
    public function create()
    {
        return view('instructors.create');
    }

    /**
     * Store a newly created instructor in storage.
     */
    public function store(Request $request)
    {
        $instructor = User::create($request->validated());

        return redirect()->route('instructors.index')
            ->with('success', 'Instructeur ajouté avec succès.');
    }

    /**
     * Display the specified instructor.
     */
    public function show($id)
    {
        $instructor = User::findOrFail($id);

        return view('instructors.show', compact('instructor'));
    }


    /**
     * Show the form for editing the specified instructor.
     */
    public function edit(User $instructor)
    {
        return view('instructors.edit', compact('instructor'));
    }

    /**
     * Update the specified instructor in storage.
     */
    public function update(Request $request, User $instructor)
    {
        $instructor->update($request->validated());

        return redirect()->route('instructors.index')
            ->with('success', 'Instructeur mis à jour avec succès.');
    }

    /**
     * Remove the specified instructor from storage.
     */
    public function destroy(User $instructor)
    {
        $instructor->delete();

        return redirect()->route('instructors.index')
            ->with('success', 'instructor supprimé avec succes.');
    }
}
