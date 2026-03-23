<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = \App\Models\User::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'role' => 'student',
            'classroom_id' => null,
            'remember_token' => Str::random(10),
        ];
    }

    public function lecturer()
    {
        return $this->state(fn () => ['role' => 'lecturer']);
    }

    public function student()
    {
        return $this->state(fn () => ['role' => 'student']);
    }
}
