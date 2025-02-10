<?php

namespace App\Http\Controllers;

use App\Models\Dudi;
use App\Models\Periode;
use App\Models\Student;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    // Show list of periods (index)
    public function index()
    {
        $periodes = Periode::with(['students', 'dudi'])->get(); // Ambil semua data dengan relasi
        return view('periode.index', compact('periodes'));
    }


    // Show the create form
    public function create()
    {
        $students = Student::all(); // Ambil semua siswa dari database
        $dudis = Dudi::all(); // Ambil semua DUDI dari database

        return view('periode.create', compact('students', 'dudis'));
    }


    // Store a new period
    public function store(Request $request)
    {
        $request->validate([
            'namasiswa' => 'required|array', // Bisa lebih dari satu siswa
            'namasiswa.*' => 'exists:students,id', // Pastikan siswa ada di database
            'namadudi' => 'required|exists:dudis,id', // Pastikan DUDI ada di database
            'tanggalmulai' => 'required|date',
            'tanggalberakhir' => 'required|date|after:tanggalmulai',
        ]);

        // Simpan periode
        $periode = Periode::create([
            'dudi_id' => $request->namadudi,
            'tanggalmulai' => $request->tanggalmulai,
            'tanggalberakhir' => $request->tanggalberakhir,
        ]);

        // Simpan hubungan siswa ke periode di tabel pivot `periode_student`
        $periode->students()->attach($request->namasiswa);

        return redirect()->route('periode.index')->with('success', 'Periode berhasil ditambahkan');
    }


    // Show the edit form
    public function edit($id)
    {
        $periode = Periode::with(['students', 'dudi'])->findOrFail($id); // Ambil data periode + relasinya
        $students = Student::all(); // Ambil semua siswa
        $dudis = Dudi::all(); // Ambil semua DUDI

        return view('periode.edit', compact('periode', 'students', 'dudis'));
    }


    // Update the period
    public function update(Request $request, $id)
    {
        $request->validate([
            'students' => 'required|array',
            'students.*' => 'exists:students,id',
            'dudi_id' => 'required|exists:dudis,id',
            'tanggalmulai' => 'required|date',
            'tanggalberakhir' => 'required|date|after:tanggalmulai',
        ]);

        $periode = Periode::findOrFail($id);
        $periode->update([
            'dudi_id' => $request->dudi_id,
            'tanggalmulai' => $request->tanggalmulai,
            'tanggalberakhir' => $request->tanggalberakhir,
        ]);

        // Sync siswa ke periode
        $periode->students()->sync($request->students);

        return redirect()->route('periode.index')->with('success', 'Periode berhasil diperbarui!');
    }


    // Delete the period
    public function destroy($id)
    {
        // Find the period by its ID
        $periode = Periode::findOrFail($id);

        // Delete the period from the database
        $periode->delete();

        // Redirect to the periods list page with a success message
        return redirect()->route('periode.index')->with('success', 'Periode PKL deleted successfully');
    }
}
