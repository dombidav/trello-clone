<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Http\Requests\StoreStageRequest;
use App\Http\Requests\UpdateStageRequest;
use App\Utils\ResponseCodes;

class StageController extends Controller
{
    public function index()
    {
        return Stage::all();
    }

    public function store(StoreStageRequest $request)
    {
        $validated = $request->validated();

        $stage = Stage::create($validated);

        return response($stage, ResponseCodes::CREATED);
    }

    public function show(Stage $stage)
    {
        return $stage->load(['tasks', 'project']);
    }

    public function update(UpdateStageRequest $request, Stage $stage)
    {
        $stage->update($request->validated());
        return $stage;
    }

    public function destroy(Stage $stage)
    {
        $stage->delete();
        return response()->json(null, ResponseCodes::NO_CONTENT);
    }
}
