<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\User;
use App\Utils\ResponseCodes;


class ProjectController extends Controller
{
    public function index()
    {
        return Project::all();
    }

    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();
        if(!isset($validated['user_id'])){
            $validated['user_id'] = User::where('username', '=', $validated['username'])->first()->id;
        }
        return response(Project::create($validated), ResponseCodes::CREATED);
    }


    public function show(Project $project)
    {
        return $project->load(['user', 'users', 'stages']);
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $validated = $request->validated();
        $project->update($validated);
        return $project;
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return response()->json(null, ResponseCodes::NO_CONTENT);
    }
}
