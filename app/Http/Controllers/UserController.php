<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:30|unique:users,username',
            'password' => 'required|string|min:6',
            'role'     => 'required|in:admin,operator,Admin,Operator',
        ]);

        User::create([
            'nama'     => $request->username, // <-- Wajib diisi! Otomatis disamakan dengan username
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role'     => strtolower($request->role),
        ]);

        return redirect()->route('user.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'username' => 'required|string|max:30|unique:users,username,' . $user->id_user . ',id_user',
            'role'     => 'required|in:admin,operator,Admin,Operator',
        ]);

        $data = [
            'nama'     => $request->username, // Update nama juga mengikuti username
            'username' => $request->username,
            'role'     => strtolower($request->role),
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('user.index')->with('success', 'User berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user.index')->with('success', 'User berhasil dihapus!');
    }
}