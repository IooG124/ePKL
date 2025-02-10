<?php

namespace App\Http\Controllers;

use App\Models\Journal;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    public function index()
    {
        // Ambil semua data jurnal dari database
        $journals = Journal::all();

        // Kirim data jurnal ke view
        return view('journals.index', compact('journals'));
    }

    public function verifyPage()
    {
        $journals = Journal::all();

        return view('journals.verify', compact('journals'));
    }

    public function show($id)
    {
        // Fetch the journal using the id
        $journal = Journal::findOrFail($id);

        // Return the view for the journal
        return view('journals.show', compact('journal'));
    }

    public function create()
    {
        // Menampilkan form untuk membuat jurnal baru
        return view('journals.create');
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:20',
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif',
            'isi' => 'required|string',
        ]);

        // Menyimpan foto
        $fotoPath = $request->file('foto')->store('journals');

        // Simpan jurnal baru ke database
        Journal::create([
            'nama' => $request->nama,
            'nis' => $request->nis,
            'foto' => $fotoPath,
            'isi' => $request->isi,
        ]);

        return redirect()->route('journals.index')->with('success', 'Jurnal berhasil ditambahkan');
    }

    public function verify($id)
    {
        $journal = Journal::findOrFail($id);

        $journal->verified = true;
        $journal->save();

        return redirect()->route('journals.verifyPage')->with('success', 'Jurnal berhasil diverifikasi');
    }
}
