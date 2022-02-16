<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Utils\ResponseCodes;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = password_hash($validated['password'], PASSWORD_DEFAULT);

        $user = User::create($validated);

        return response($user, ResponseCodes::CREATED);
    }

    public function show(User $user)
    {
        return $user->load(['projects', 'owning', 'tasks']);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validated = $request->validated();

        if (isset($validated['password'])) {
            $validated['password'] = password_hash($validated['password'], PASSWORD_DEFAULT);
        }

        $user->update($validated);

        return $user;
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, ResponseCodes::NO_CONTENT);
    }
}
