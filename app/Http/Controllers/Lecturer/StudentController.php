<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classroom;

class StudentController extends Controller
{
    public function index() {
        $students = User::where('role', 'student')->get();

        return view('lecturer.students.index', compact('students'));
    }

    public function show($id) {
        $student = User::findOrFail($id);
        $classrooms = Classroom::all();

        return view('lecturer.students.show', compact('student', 'classrooms'));
    }

    public function update(Request $request, $id){
        $student = User::findOrFail($id);
        $request->validate([
            'classroom_id' => 'required|exists:classrooms,id'
        ]);
        $student->update([
            'classroom_id' => $request->classroom_id
        ]);

        return redirect()->route('students.index')->with('success', 'Student assigned to class');
    }
}
