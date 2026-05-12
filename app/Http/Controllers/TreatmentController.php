<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treatments = Treatment::with('beneficiary')->latest()->get();
        return view('treatments.index', compact('treatments'));
    }

    public function create()
    {
        $beneficiaries = \App\Models\Beneficiary::all();
        return view('treatments.create', compact('beneficiaries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'beneficiary_id' => 'required|exists:beneficiaries,id',
            'treatment_details' => 'required|string',
            'medication' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);

        Treatment::create($request->all());

        return redirect()->route('treatments.index')->with('success', 'Treatment added successfully.');
    }

    public function show(Treatment $treatment)
    {
        return view('treatments.show', compact('treatment'));
    }

    public function edit(Treatment $treatment)
    {
        $beneficiaries = \App\Models\Beneficiary::all();
        return view('treatments.edit', compact('treatment', 'beneficiaries'));
    }

    public function update(Request $request, Treatment $treatment)
    {
        $request->validate([
            'beneficiary_id' => 'required|exists:beneficiaries,id',
            'treatment_details' => 'required|string',
            'medication' => 'required|string|max:255',
            'doctor_name' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
        ]);
        
        $treatment->update($request->all());

        return redirect()->route('treatments.index')->with('success', 'Treatment updated successfully.');
    }

    public function destroy(Treatment $treatment)
    {
        $treatment->delete();
        return redirect()->route('treatments.index')->with('success', 'Treatment deleted successfully.');
    }
}
