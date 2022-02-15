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
        $asd = User::inRandomOrder()->take($rand)->get();
        Task::inRandomOrder()->limit($rand)->get()->each(function (Task $task) {
            $task->user_id = User::randomId();
            $task->save();
        });
    }
}
