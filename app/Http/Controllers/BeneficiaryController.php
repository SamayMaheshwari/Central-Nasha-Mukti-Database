<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\Center;
use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{
    public function index()
    {
        $beneficiaries = Beneficiary::latest()->get();
        return view('beneficiaries.index', compact('beneficiaries'));
    }

    public function create()
    {
        $centers = Center::all();
        return view('beneficiaries.create', compact('centers'));
    }

    public function store(Request $request)
    {
        Beneficiary::create($request->all());

        return redirect()->route('beneficiaries.index')
            ->with('success', 'Beneficiary Added Successfully');
    }

    public function show(Beneficiary $beneficiary)
    {
        $beneficiary->load(['center.state', 'counsellingSessions', 'treatments', 'followUps']);
        return view('beneficiaries.show', compact('beneficiary'));
    }

    public function edit(Beneficiary $beneficiary)
    {
        $centers = Center::all();
        return view('beneficiaries.edit', compact('beneficiary', 'centers'));
    }

    public function update(Request $request, Beneficiary $beneficiary)
    {
        $beneficiary->update($request->all());

        return redirect()->route('beneficiaries.index')
            ->with('success', 'Beneficiary Updated');
    }

    public function destroy(Beneficiary $beneficiary)
    {
        $beneficiary->delete();

        return redirect()->route('beneficiaries.index')
            ->with('success', 'Beneficiary Deleted');
    }
}