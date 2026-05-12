<?php

namespace App\Http\Controllers;

use App\Models\CounsellingSession;
use Illuminate\Http\Request;

class CounsellingSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sessions = CounsellingSession::with('beneficiary')->latest()->get();
        return view('counselling_sessions.index', compact('sessions'));
    }

    public function create()
    {
        $beneficiaries = \App\Models\Beneficiary::all();
        return view('counselling_sessions.create', compact('beneficiaries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'beneficiary_id' => 'required|exists:beneficiaries,id',
            'session_date' => 'required|date',
            'notes' => 'required|string',
            'progress_status' => 'required|string|max:255',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id() ?? 1; // Fallback to 1 if not logged in somehow
        
        CounsellingSession::create($data);

        return redirect()->route('counselling_sessions.index')->with('success', 'Session added successfully.');
    }

    public function show(CounsellingSession $counsellingSession)
    {
        return view('counselling_sessions.show', compact('counsellingSession'));
    }

    public function edit(CounsellingSession $counsellingSession)
    {
        $beneficiaries = \App\Models\Beneficiary::all();
        return view('counselling_sessions.edit', compact('counsellingSession', 'beneficiaries'));
    }

    public function update(Request $request, CounsellingSession $counsellingSession)
    {
        $request->validate([
            'beneficiary_id' => 'required|exists:beneficiaries,id',
            'session_date' => 'required|date',
            'notes' => 'required|string',
            'progress_status' => 'required|string|max:255',
        ]);
        
        $counsellingSession->update($request->all());

        return redirect()->route('counselling_sessions.index')->with('success', 'Session updated successfully.');
    }

    public function destroy(CounsellingSession $counsellingSession)
    {
        $counsellingSession->delete();
        return redirect()->route('counselling_sessions.index')->with('success', 'Session deleted successfully.');
    }
}
