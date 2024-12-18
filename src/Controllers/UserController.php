<?php

namespace App\Controllers;

use App\Models\User;
//use App\Models\Role;
use Illuminate\Http\Request;
require_once 'helpers.php';
class UserController
{


    // عرض جميع المستخدمين
    public function index()
    {
        $users = User::with('roles')->get();
        return view('users/index', compact('users'));
    }

    // إنشاء مستخدم جديد
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $validated['password'] = password_hash($validated['password'], PASSWORD_BCRYPT);
        User::create($validated);

        return redirect('/users')->with('success', 'User created successfully!');
    }

    // حذف مستخدم
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect('/users')->with('success', 'User deleted successfully!');
    }

}
