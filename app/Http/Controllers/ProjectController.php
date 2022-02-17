<?php

namespace App\Http\Controllers;

use App\Http\Requests\AttachRequest;
use App\Models\Project;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\User;
use App\Utils\ResponseCodes;


class ProjectController extends Controller
{
    public function index()
    {
        if(auth()->user()->can('index', Project::class))
            return Project::all();

        return auth()->user()->projects;
    }

    public function store(StoreProjectRequest $request)
    {
        $validated = $request->validated();
        $validated['user_id'] = auth()->user()->id;
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

    public function attach(AttachRequest $request) {
        $user = User::findOrFail($request->user_id);
        $project = Project::findOrFail($request->project_id);
        $user->projects()->attach($project);
        return response()->json(null, ResponseCodes::NO_CONTENT);
    }
}
