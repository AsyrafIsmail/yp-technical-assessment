<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassRoom;
use SebastianBergmann\CodeCoverage\Test\Target\Class_;
use App\Models\Subject;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classrooms = Classroom::all();
        return view('lecturer.classes.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = Subject::all();
        return view('lecturer.classes.create', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $classrooms = Classroom::create([
            'name' => $request->name
        ]);
        // attach subjects
        if ($request->subjects) {
            $classrooms->subjects()->attach($request->subjects);
        }

        return redirect()->route('classes.index')->with('success', 'Class created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $classroom = Classroom::findOrFail($id);
        $subjects = Subject::all();

        return view('lecturer.classes.edit', compact('classroom', 'subjects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $classroom = Classroom::findOrFail($id);
        $classroom->update([
            'name' => $request->name
        ]);
        // sync subjects
        $classroom->subjects()->sync($request->subjects ?? []);
        return redirect()->route('classes.index')->with('success', 'Class updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted');
    }
}
