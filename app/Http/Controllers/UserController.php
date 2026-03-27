<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;

class UserController extends Controller
{
    public function index()
    {
        // We'll bring all users with their associated department to show in the list (active or not)
        $users = User::with('department')->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('users.create', compact('departments'));
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'department_id' => $request->department_id,
            'is_active' => true,
        ]);

        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $departments = Department::all();
        return view('users.edit', compact('user', 'departments'));
    }

    public function update(Request $request, User $user)
    {
        // Update basic data, department and if it's inactive
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'department_id' => $request->department_id,
            'is_active' => $request->has('is_active'), // If the checkbox is checked, it's true
        ]);

        // If they sent a new password, we'll encrypt it and save it
        if ($request->filled('password')) {
            $user->update(['password' => bcrypt($request->password)]);
        }

        return redirect()->route('users.index');
    }
}