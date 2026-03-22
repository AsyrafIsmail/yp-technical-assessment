<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Exam;

class ExamController extends Controller
{
    public function index() {
        $user = Auth::user();
        $exams = Exam::where('classroom_id', $user->classroom_id)->get();

        return view('student.exams.index', compact('exams'));
    }
}
