<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\Option;
use App\Models\Exam;

class QuestionController extends Controller
{
    public function index($examId) {
        $exam = Exam::with('questions.options')->findOrFail($examId);

        return view('lecturer.questions.index', compact('exam'));
    }

    public function create($examId) {
        return view('lecturer.questions.create', compact('examId'));
    }

    public function store(Request $request, $examId) {
        foreach ($request->questions as $q) {

            if (!isset($q['question_text']) || !isset($q['type'])) {
                continue;
            }

            $question = Question::create([
                'exam_id' => $examId,
                'question_text' => $q['question_text'],
                'type' => $q['type']
            ]);

            if ($q['type'] === 'mcq') {

                if (!isset($q['correct_index'])) {
                    continue;
                }

                $correctIndex = strtolower($q['correct_index']);
                $map = ['a' => 0, 'b' => 1, 'c' => 2, 'd' => 3];

                $correctIndex = $map[$correctIndex] ?? null;

                if ($correctIndex === null) {
                    continue;
                }

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

    public function edit($id) {
        $question = Question::with('options')->findOrFail($id);

        return view('lecturer.questions.edit', compact('question'));
    }

    public function update(Request $request, $id) {
        $question = Question::findOrFail($id);

        $question->update([
            'question_text' => $request->question_text,
            'type' => $request->type
        ]);

        if ($request->type === 'mcq') {

            $question->options()->delete();

            $map = ['a' => 0, 'b' => 1, 'c' => 2, 'd' => 3];
            $correctIndex = strtolower($request->correct_index);
            $correctIndex = $map[$correctIndex] ?? null;

            foreach ($request->options as $index => $optionText) {
                $question->options()->create([
                    'option_text' => $optionText,
                    'is_correct' => $index == $correctIndex
                ]);
            }

        } else {
            $question->options()->delete();
        }

        return redirect()->route('questions.index', $question->exam_id)->with('success', 'Question updated');    }

    public function destroy($id) {
        $question = Question::findOrFail($id);

        $question->delete();

        return back()->with('success', 'Question deleted');
    }

}
