<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{

    public function addUser(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'address' => 'required|array',
            'address.0.type' => 'required|string',
            'address.0.address_line' => 'required|string',
            'address.0.city' => 'required|string',
            'address.0.postal_code' => 'required|string',
            'phone' => 'required|string|max:15',
            'password' => 'required|string|min:8'
        ]);
        

        // Hash the password before saving
        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);

        Auth::login($user);

        return redirect('/');
    }

    // READ all users
    public function getAllUser()
    {
        $users = User::all();

        return response()->json($users);
    }

    // READ a single user by ID
    public function getUserById($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    // UPDATE a user by ID
    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);

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
    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }

    
    public function loginView(){
        return view('auth.login');
    }

    // LOGIN a user
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        Log::info("Attempting login with credentials:", $credentials);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return response()->json(['error' => 'Invalid credentials'], 401);
    }

    public function registerView(){
        return view('auth.register');
    }

    public function logout(){
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }
}