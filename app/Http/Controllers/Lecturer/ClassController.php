<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ClassRoom;
use SebastianBergmann\CodeCoverage\Test\Target\Class_;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = ClassRoom::all();
        return view('lecturer.classes.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lecturer.classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        ClassRoom::create([
            'name' => $request->name
        ]);

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
        $class = ClassRoom::findOrFail($id);

        return view('lecturer.classes.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $class = ClassRoom::findOrFail($id);
        $class->update([
            'name' => $request->name
        ]);

        return redirect()->route('classes.index')->with('success', 'Class updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = ClassRoom::findOrFail($id);
        $class->delete();

        return redirect()->route('classes.index')->with('success', 'Class deleted');
    }
}
