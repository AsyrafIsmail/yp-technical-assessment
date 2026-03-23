<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Classroom;
use App\Models\Subject;
use App\Models\Exam;
use App\Models\Question;
use App\Models\Option;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create classrooms
        $classrooms = Classroom::factory(3)->create();

        // Create subjects
        $subjects = Subject::factory(6)->create();

        // Assign subjects to classrooms (pivot table)
        foreach ($classrooms as $classroom) {
            $classroom->subjects()->attach($subjects->random(3));
        }

        // Create lecturers
        User::factory(2)->lecturer()->create();

        // Create students and assign to classrooms
        foreach ($classrooms as $classroom) {
            User::factory(5)->student()->create([
                'classroom_id' => $classroom->id
            ]);
        }

        // Create exams for each classroom and subject
        foreach ($classrooms as $classroom) {
            foreach ($classroom->subjects as $subject) {
                $exam = Exam::factory()->create([
                    'classroom_id' => $classroom->id,
                    'subject_id' => $subject->id
                ]);

                // Create 3 questions per exam
                $questions = Question::factory(3)->create([
                    'exam_id' => $exam->id
                ]);

                // Add 4 MCQ options per MCQ question
                foreach ($questions as $question) {
                    if ($question->type === 'mcq') {
                        $letters = ['A', 'B', 'C', 'D'];
                        foreach ($letters as $i => $letter) {
                            Option::factory()->create([
                                'question_id' => $question->id,
                                'option_text' => "Option $letter",
                                'is_correct' => $i === 0 // first option is correct
                            ]);
                        }
                    }
                }
            }
        }
    }
}
