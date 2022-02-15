<?php

namespace Database\Factories;

use App\Models\Stage;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    public function definition():array
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'stage_id' => Stage::randomId(),
        ];
    }
}
