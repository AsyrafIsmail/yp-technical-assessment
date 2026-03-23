<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    protected $model = \App\Models\Subject::class;

    public function definition()
    {
        $subjects = ['Programming', 'Database', 'Networking', 'Cybersecurity', 'Web Development', 'AI', 'Cloud Computing'];

        return [
            'name' => $this->faker->unique()->randomElement($subjects),
        ];
    }
}
