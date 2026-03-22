<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;

class QuestionController extends Controller
{
    public function create($examId) {
        return view('lecturer.questions.create', compact('examId'));
    }

    public function store(Request $request, $examId) {
        $question = Question::create([
            'exam_id' => $examId,
            'question_text' => $request->question_text,
            'type' => $request->type
        ]);

        if ($request->type === 'mcq') {
            foreach ($request->options as $index => $optionText) {
                Option::create([
                    'question_id' => $question->id,
                    'option_text' => $optionText,
                    'is_correct' => $index == $request->correct_index
                ]);
            }
        }
        return redirect()->route('exams.index')->with('success', 'Question created!');
    }
}
