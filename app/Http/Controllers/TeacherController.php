<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    // Menampilkan daftar guru
    public function index()
    {
        $teachers = Teacher::all();
        
        return view('teachers.index', compact('teachers'));
    }

    // Menampilkan form untuk menambah guru
    public function create()
    {
        return view('teachers.create');
    }

    // Menyimpan data guru baru
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:teachers',
            'nama' => 'required',
            'nip' => 'required|unique:teachers',
            'password' => 'required|min:6',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        Teacher::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit guru
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('teachers.edit', compact('teacher'));
    }

    // Mengupdate data guru
    public function update(Request $request, $id)
    {
        $teacher = Teacher::findOrFail($id);

        $request->validate([
            'username' => 'required|unique:teachers,username,' . $teacher->id,
            'nama' => 'required',
            'nip' => 'required|unique:teachers,nip,' . $teacher->id,
            'password' => 'nullable|min:6',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        $teacher->update([
            'username' => $request->username,
            'nama' => $request->nama,
            'nip' => $request->nip,
            'password' => $request->password ? bcrypt($request->password) : $teacher->password,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
        ]);

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil diperbarui');
    }

    // Menghapus data guru
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Guru berhasil dihapus');
    }
}