<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Exam;
use App\Models\Answer;

class ExamController extends Controller
{
    public function index() {
        $user = Auth::user();
        $exams = Exam::where('classroom_id', $user->classroom_id)->get();

        return view('student.exams.index', compact('exams'));
    }

    public function show($id) {
        $exam = Exam::with('questions.options')->findOrFail($id);

        return view('student.exams.show', compact('exam'));
    }

    public function submit(Request $request, $examId) {
        foreach ($request->answers as $questionId => $answer) {

            if (is_numeric($answer)) {
                Answer::create([
                    'user_id' => Auth::user()->id,
                    'question_id' => $questionId,
                    'option_id' => $answer
                ]);
            } else {
                Answer::create([
                    'user_id' => Auth::user()->id,
                    'question_id' => $questionId,
                    'answer_text' => $answer
                ]);
            }
        }

        return redirect()->route('student.exams')->with('success', 'Exam submitted');
    }

}
