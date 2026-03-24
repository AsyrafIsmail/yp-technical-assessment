<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Classroom;

class StudentController extends Controller
{
    public function index() {
        $students = User::where('role', 'student')->when(request('search'), function ($query) {
            $query->where('name', 'like', '%' . request('search') . '%');
        })->get();
        $students = User::where('role', 'student')->paginate(10);

        return view('lecturer.students.index', compact('students'));
    }

    public function show($id) {
        $student = User::with('classroom')->findOrFail($id);
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
