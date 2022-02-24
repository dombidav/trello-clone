<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Utils\ResponseCodes;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::all();
    }

    function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();

       /* $validated[''] = ($request,['' => 'required|max:255',]); */

        $task = Task::create($validated);

        return response($task, 201);
    }

    public function show(Task $task)
    {
        return $task->load(['user', 'project', 'stage']);
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return $task;
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
    }
}
