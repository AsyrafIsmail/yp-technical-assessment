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
        foreach ($request->questions as $q) {

            $question = Question::create([
                'exam_id' => $examId,
                'question_text' => $q['question_text'],
                'type' => $q['type']
            ]);

            if ($q['type'] === 'mcq' && isset($q['options'])) {
                $correctIndex = strtolower($q['correct_index']);
                $map = ['a' => 0, 'b' => 1, 'c' => 2, 'd' => 3];
                $correctIndex = $map[$correctIndex] ?? null;

                foreach ($q['options'] as $index => $optionText) {

                    Option::create([
                        'question_id' => $question->id,
                        'option_text' => $optionText,
                        'is_correct' => $index == $correctIndex
                    ]);
                }
            }
        }

        return redirect()->route('exams.index')->with('success', 'Questions added');
    }
}
