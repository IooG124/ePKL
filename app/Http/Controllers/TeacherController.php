<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();

        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:teachers',
            'name' => 'required',
            'nip' => 'required|unique:teachers',
            'password' => 'required|min:6',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $teacher = Teacher::create([
            'username' => $request->username,
            'name' => $request->name,
            'nip' => $request->nip,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        $roleStudent = Role::where('role_name', 'teachers')->first();

        $user = User::create([
            'username' => $request->nip,
            'password' => Hash::make($request->password),
            'role_id' => $roleStudent->id,
        ]);

        $teacher->user_id = $user->id;
        $teacher->save();

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:teachers,username,' . $teacher->id,
            'name' => 'required',
            'nip' => 'required|unique:teachers,nip,' . $teacher->id,
            'password' => 'nullable|min:6',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $teacher->update([
            'username' => $request->username,
            'name' => $request->name,
            'nip' => $request->nip,
            'password' => $request->password ? bcrypt($request->password) : $teacher->password,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil diperbarui');
    }

    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil dihapus');
    }
}