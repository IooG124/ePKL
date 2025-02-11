<?php

namespace App\Http\Controllers;

use App\Models\Dudi;
use Illuminate\Http\Request;

class DudiController extends Controller
{
    public function index()
    {
        // Fetch all Dudis from the database
        $dudis = Dudi::all();

        // Return the view with the data
        return view('dudi.index', compact('dudis'));
    }

    public function listDudi()
    {
        // Fetch all Dudis from the database
        $dudis = Dudi::all();

        // Return the view with the data
        return view('dudi.listDudi', compact('dudis'));
    }

    public function show($id)
    {
        $dudi = Dudi::findOrFail($id);
        return view('dudi.show', compact('dudi'));
    }

    public function create()
    {
        // Show the form to create a new DUDI
        return view('dudi.create');
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'namadudi' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'contactperson' => 'required|string|max:255',
        ]);

        // Create a new DUDI
        Dudi::create($request->all());

        // Redirect to the DUDI list with a success message
        return redirect()->route('dudi.listDudi')->with('success', 'DUDI created successfully');
    }

    public function edit($id)
    {
        // Find the DUDI by its ID
        $dudi = Dudi::findOrFail($id);

        // Return the edit view with the DUDI data
        return view('dudi.edit', compact('dudi'));
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request
        $request->validate([
            'namadudi' => 'required|string|max:255',
            'lokasi' => 'required|string|max:255',
            'contactperson' => 'required|string|max:255',
        ]);

        // Find and update the DUDI
        $dudi = Dudi::findOrFail($id);
        $dudi->update($request->all());

        // Redirect to the DUDI list with a success message
        return redirect()->route('dudi.listDudi')->with('success', 'DUDI updated successfully');
    }

    public function destroy($id)
    {
        // Find and delete the DUDI
        $dudi = Dudi::findOrFail($id);
        $dudi->delete();

        // Redirect to the DUDI list with a success message
        return redirect()->route('dudi.listDudi')->with('success', 'DUDI deleted successfully');
    }
}