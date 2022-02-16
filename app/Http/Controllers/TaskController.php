<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Utils\ResponseCodes;

class TaskController extends Controller
{
<<<<<<< HEAD
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Task::all();
    }
=======
>>>>>>> master

    public function index()
    {
        return Task::all();
    }

    function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();
<<<<<<< HEAD

       /* $validated[''] = ($request,['' => 'required|max:255',]); */

        $task = Task::create($validated);

        return response($task, 201);
=======
        $task = Task::create($validated);
        return response($task, ResponseCodes::CREATED);
>>>>>>> master
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

<<<<<<< HEAD
     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, 204);
=======
    public function destroy(Task $task)
    {
        $task->delete();
        return response()->json(null, ResponseCodes::NO_CONTENT);
>>>>>>> master
    }
}
