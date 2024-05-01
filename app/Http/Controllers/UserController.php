<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
        // Menampilkan daftar pengguna
        public function index()
        {
            $users = User::all();
            return view('admin.userstable', ['users' => $users]);
        }
    
        // Menampilkan form untuk menambah pengguna baru
        public function create()
        {
            return view('users.create');
        }
    
        // Menyimpan pengguna baru
        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);
    
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
    
            return redirect()->route('users.index')->with('success', 'User created successfully');
        }
    
        // Menampilkan form untuk mengedit pengguna
        public function edit(User $user)
        {
            return view('users.edit', ['user' => $user]);
        }
    
        // Menyimpan perubahan pada pengguna yang diubah
        public function update(Request $request, User $user)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
            ]);
    
            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
    
            return redirect()->route('users.index')->with('success', 'User updated successfully');
        }
    
        // Menghapus pengguna
        public function destroy(User $user)
        {
            $user->delete();
            return redirect()->route('users.index')->with('success', 'User deleted successfully');
        }
}
