<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Exam;

/**
 * @extends Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    protected $model = \App\Models\Question::class;

    public function definition()
    {
        $types = ['text', 'mcq'];

        $type = $this->faker->randomElement($types);

        return [
            'exam_id' => Exam::inRandomOrder()->first()?->id ?? 1,
            'question_text' => $this->faker->sentence(),
            'type' => $type,
        ];
    }
}
