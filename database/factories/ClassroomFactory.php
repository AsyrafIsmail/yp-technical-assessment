<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    protected $model = \App\Models\Classroom::class;

    public function definition()
    {
        return [
            'name' => 'IT ' . $this->faker->unique()->numberBetween(101, 499),
        ];
    }
}
