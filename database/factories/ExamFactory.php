<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Classroom;
use App\Models\Subject;

/**
 * @extends Factory<\App\Models\Exam>
 */
class ExamFactory extends Factory
{
    protected $model = \App\Models\Exam::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3),
            'classroom_id' => Classroom::inRandomOrder()->first()?->id ?? 1,
            'subject_id' => Subject::inRandomOrder()->first()?->id ?? 1,
            'duration' => $this->faker->numberBetween(10, 60), // minutes
        ];
    }
}
