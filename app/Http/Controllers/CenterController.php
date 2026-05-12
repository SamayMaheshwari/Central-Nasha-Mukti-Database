<?php

namespace App\Http\Controllers;

use App\Models\Center;
use Illuminate\Http\Request;

class CenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // load relationships
        $centers = Center::with('state')->latest()->get();
        return view('centers.index', compact('centers'));
    }

    public function create()
    {
        $states = \App\Models\State::all();
        return view('centers.create', compact('states'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'state_id' => 'required|exists:states,id',
            'center_name' => 'required|string|max:255',
            'address' => 'required|string',
            'contact' => 'required|string|max:255',
        ]);
        
        Center::create($request->all());

        return redirect()->route('centers.index')->with('success', 'Center added successfully.');
    }

    public function show(Center $center)
    {
        return view('centers.show', compact('center'));
    }

    public function edit(Center $center)
    {
        $states = \App\Models\State::all();
        return view('centers.edit', compact('center', 'states'));
    }

    public function update(Request $request, Center $center)
    {
        $request->validate([
            'state_id' => 'required|exists:states,id',
            'center_name' => 'required|string|max:255',
            'address' => 'required|string',
            'contact' => 'required|string|max:255',
        ]);
        
        $center->update($request->all());

        return redirect()->route('centers.index')->with('success', 'Center updated successfully.');
    }

    public function destroy(Center $center)
    {
        $center->delete();

        return redirect()->route('centers.index')->with('success', 'Center deleted successfully.');
    }
}
