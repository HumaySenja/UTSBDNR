<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    // CREATE a new user
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'address' => 'array',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8'
        ]);

        // Hash the password before saving
        $data['password'] = Hash::make($data['password']);

        $user = Users::create($data);

        return response()->json($user, 201);
    }

    // READ all users
    public function index()
    {
        $users = Users::all();

        return response()->json($users);
    }

    // READ a single user by ID
    public function show($id)
    {
        $user = Users::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    // UPDATE a user by ID
    public function update(Request $request, $id)
    {
        $user = Users::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'address' => 'array',
            'phone' => 'sometimes|string|max:15',
            'password' => 'sometimes|string|min:8'
        ]);

        // Hash the password if it's being updated
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        $user->update($data);

        return response()->json($user);
    }

    // DELETE a user by ID
    public function destroy($id)
    {
        $user = Users::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
