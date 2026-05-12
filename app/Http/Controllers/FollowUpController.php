<?php

namespace App\Http\Controllers;

use App\Models\FollowUp;
use Illuminate\Http\Request;

class FollowUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $followUps = FollowUp::with('beneficiary')->latest()->get();
        return view('follow_ups.index', compact('followUps'));
    }

    public function create()
    {
        $beneficiaries = \App\Models\Beneficiary::all();
        return view('follow_ups.create', compact('beneficiaries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'beneficiary_id' => 'required|exists:beneficiaries,id',
            'followup_date' => 'required|date',
            'remarks' => 'required|string',
            'recovery_status' => 'required|string|max:255',
        ]);

        FollowUp::create($request->all());

        return redirect()->route('follow_ups.index')->with('success', 'Follow-up added successfully.');
    }

    public function show(FollowUp $followUp)
    {
        return view('follow_ups.show', compact('followUp'));
    }

    public function edit(FollowUp $followUp)
    {
        $beneficiaries = \App\Models\Beneficiary::all();
        return view('follow_ups.edit', compact('followUp', 'beneficiaries'));
    }

    public function update(Request $request, FollowUp $followUp)
    {
        $request->validate([
            'beneficiary_id' => 'required|exists:beneficiaries,id',
            'followup_date' => 'required|date',
            'remarks' => 'required|string',
            'recovery_status' => 'required|string|max:255',
        ]);
        
        $followUp->update($request->all());

        return redirect()->route('follow_ups.index')->with('success', 'Follow-up updated successfully.');
    }

    public function destroy(FollowUp $followUp)
    {
        $followUp->delete();
        return redirect()->route('follow_ups.index')->with('success', 'Follow-up deleted successfully.');
    }
}
