<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $count = 100;
        Task::factory($count)->create();
        $rand = rand($count / 2, floor($count * 0.8));
        Task::inRandomOrder()->limit($rand)->each(function (Task $task) {
            $task->user_id = User::inRandomOrder()->first()->id;
            $task->save();
        });
    }
}
