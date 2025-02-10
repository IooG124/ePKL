<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Models\Student;
use Illuminate\Http\Request;

class PeriodeController extends Controller
{
    // Show list of periods (index)
    public function index()
    {
        $periodePKL = Periode::all();

        return view('periode.index', compact('periodePKL'));
    }

    // Show the create form
    public function create()
    {
        $students = Student::all();

        // Return the create form view for adding a new period
        return view('periode.create', compact('students'));
    }

    // Store a new period
    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'namasiswa' => 'required|string|max:255',
            'namadudi' => 'required|string|max:255',
            'tanggalmulai' => 'required|date',
            'tanggalberakhir' => 'required|date|after:tanggalmulai',
        ]);

        // Create a new period in the database
        Periode::create([
            'namasiswa' => $request->namasiswa,
            'namadudi' => $request->namadudi,
            'tanggalmulai' => $request->tanggalmulai,
            'tanggalberakhir' => $request->tanggalberakhir,
        ]);

        // Redirect to the periods index page with a success message
        return redirect()->route('periode.index')->with('success', 'Periode PKL created successfully');
    }

    // Show the edit form
    public function edit($id)
    {
        $periode = Periode::findOrFail($id);

        return view('periode.edit', compact('periode'));
    }

    // Update the period
    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'namasiswa' => 'required|string|max:255',
            'namadudi' => 'required|string|max:255',
            'tanggalmulai' => 'required|date',
            'tanggalberakhir' => 'required|date|after:tanggalmulai',
        ]);

        // Find the period by its ID
        $periode = Periode::findOrFail($id);

        // Update the period with the new data
        $periode->update([
            'namasiswa' => $request->namasiswa,
            'namadudi' => $request->namadudi,
            'tanggalmulai' => $request->tanggalmulai,
            'tanggalberakhir' => $request->tanggalberakhir,
        ]);

        // Redirect to the periods list page with a success message
        return redirect()->route('periode.index')->with('success', 'Periode PKL updated successfully');
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