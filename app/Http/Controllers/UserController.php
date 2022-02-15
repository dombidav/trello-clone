<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'username' => ['required', 'max:32', 'unique:users,username'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed', /* 'password_format' */ ], // TODO: Add password validation rule
       ]);

        $validated['password'] = password_hash($validated['password'], PASSWORD_DEFAULT);

        $user = User::create($validated);

        return response($user, 201);
    }

    public function show(User $user)
    {
        return $user->load(['projects', 'owning', 'tasks']);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(null, 204);
    }
}
