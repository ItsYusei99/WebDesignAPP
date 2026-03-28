<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Department;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        $users = User::with('department')->get(); // Carga el departamento para evitar muchas consultas
        return view('users.index', compact('users'));
    }

    public function create() {
        $departments = Department::all();
        return view('users.create', compact('departments'));
    }

    public function store(Request $request) {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'department_id' => $request->department_id,
        ]);
        return redirect()->route('users.index');
    }

    public function edit(User $user) {
        $departments = Department::all();
        return view('users.edit', compact('user', 'departments'));
    }

    public function update(Request $request, User $user) {
        $user->update($request->all());
        return redirect()->route('users.index');
    }
}