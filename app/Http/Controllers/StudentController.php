<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('siswa.index', compact('students'));
    }

    public function create()
    {
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:20|unique:students',
            'kelas' => 'required|string|max:20',
            'jurusan' => 'required|string|max:50',
        ]);

        $student = Student::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ]);

        $roleStudent = Role::where('role_name', 'students')->first();

        $user = User::create([
            'username' => $request->nis,
            'password' => Hash::make('1234'),
            'role_id' => $roleStudent->id,
        ]);

        $student->user_id = $user->id;
        $student->save();

        return redirect()->route('siswa')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        $user = User::where('username', $student->nis)->first();
        if ($user) {
            $user->delete();
        }

        return redirect()->route('siswa')->with('success', 'Siswa berhasil dihapus');
    }
}