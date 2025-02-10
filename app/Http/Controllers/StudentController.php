<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        // Ambil data siswa dari database
        $students = Student::all();

        // Kirim data siswa ke view
        return view('siswa.index', compact('students'));
    }

    public function create()
    {
        // Menampilkan form untuk menambah siswa baru
        return view('siswa.create');
    }

    public function store(Request $request)
    {
        // Validasi inputan siswa
        $request->validate([
            'name' => 'required|string|max:255',
            'nis' => 'required|string|max:20',
            'kelas' => 'required|string|max:20',
            'jurusan' => 'required|string|max:50',
        ]);

        // Menyimpan data siswa
        Student::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
        ]);

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('siswa.index')->with('success', 'Siswa berhasil dihapus');
    }
}
