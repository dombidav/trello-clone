<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Stage;
use Illuminate\Database\Seeder;

class StageSeeder extends Seeder
{
    public function run()
    {
        Project::all()->each(function(Project $project) {
            $rand = rand(3, 10);
            Stage::factory($rand)->create([
                'project_id' => $project->id,
            ]);
        });

    }
}
