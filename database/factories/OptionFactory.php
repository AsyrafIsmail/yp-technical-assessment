<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Question;

/**
 * @extends Factory<\App\Models\Option>
 */
class OptionFactory extends Factory
{
    protected $model = \App\Models\Option::class;

    public function definition()
    {
        $question = Question::where('type', 'mcq')->inRandomOrder()->first();

        return [
            'question_id' => $question?->id ?? 1,
            'option_text' => $this->faker->word(),
            'is_correct' => false, // will set correct later
        ];
    }
}
