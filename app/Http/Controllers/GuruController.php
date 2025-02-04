<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GuruController extends Controller
{
    // Menampilkan daftar guru
    public function index()
    {
        $teachers = Guru::with('user')->get(); // Mengambil semua data guru beserta user terkait
        return view('tguru', compact('teachers'));
    }

    // Menampilkan form tambah guru
    public function create()
    {
        $users = User::all(); // Mengambil semua user untuk dipilih
        return view('guru.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'NIP' => 'required|numeric|unique:teachers,NIP',
            'alamat' => 'required|string',
            'telpon' => 'required|string',
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:6',
        ]);

        // Simpan ke tabel users dulu
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role_id' => '2'
        ]);

        // Simpan ke tabel guru dengan user_id dari user yang baru dibuat
        Guru::create([
            'nama_guru' => $request->nama_guru,
            'NIP' => $request->NIP,
            'alamat' => $request->alamat,
            'telpon' => $request->telepon,
            'user_id' => $user->id,
        ]);

        return redirect()->back()->with('success', 'Data Guru Berhasil Ditambahkan');
    }


    // Menampilkan data guru berdasarkan ID
    public function show(Guru $guru)
    {
        return view('guru.show', compact('guru'));
    }

    // Menampilkan form edit guru
    public function edit(Guru $guru)
    {
        $users = User::all();
        return view('guru.edit', compact('guru', 'users'));
    }

    // Memperbarui data guru
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nama_guru' => 'required|string|max:255',
            'NIP' => 'required|string|unique:teachers,NIP,' . $guru->id,
            'alamat' => 'required|string|max:255',
            'telpon' => 'required|string|max:15',
            'user_id' => 'required|exists:users,id',
        ]);

        $guru->update($request->all());

        return redirect()->route('guru.index')->with('success', 'Data guru berhasil diperbarui.');
    }

    // Menghapus data guru
    public function destroy(Guru $guru)
    {
        $guru->delete();
        return redirect()->route('guru.index')->with('success', 'Data guru berhasil dihapus.');
    }
}
