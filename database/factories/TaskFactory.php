<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userIds = User::pluck('id')->toArray();
        $randUser = array_rand($userIds);
        return [
            'title' => fake()->title,
            'status' =>fake()->randomElement(['pending', 'in-progress', 'completed']) ,
            'user_id' => $userIds[$randUser],

        ];
    }
}
