@extends('layouts.app')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2>Patient Profile: {{ $beneficiary->name }}</h2>
    <a href="{{ route('beneficiaries.index') }}" class="btn btn-warning">Back to List</a>
</div>

<div class="row">
    <!-- Patient Info Card -->
    <div class="col-md-4" style="flex: 1 1 100%;">
        <div class="card" style="margin-bottom: 2rem;">
            <h3 style="margin-bottom: 1rem; border-bottom: 1px solid var(--color-border); padding-bottom: 0.5rem;">Basic Information</h3>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <div><strong>Age:</strong> {{ $beneficiary->age }}</div>
                <div><strong>Gender:</strong> {{ $beneficiary->gender }}</div>
                <div><strong>Addiction Type:</strong> {{ $beneficiary->addiction_type }}</div>
                <div><strong>Status:</strong> <span style="display: inline-block; padding: 0.2rem 0.6rem; border-radius: 99px; font-size: 0.85rem; font-weight: 500; background-color: rgba(0,0,0,0.05);">{{ $beneficiary->status }}</span></div>
                <div><strong>Admission Date:</strong> {{ $beneficiary->admission_date }}</div>
                <div><strong>Center:</strong> {{ $beneficiary->center ? $beneficiary->center->center_name : 'N/A' }} ({{ $beneficiary->center && $beneficiary->center->state ? $beneficiary->center->state->name : 'N/A' }})</div>
            </div>
        </div>
    </div>
</div>

<!-- Counselling Sessions -->
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
    <h3 style="margin: 0;">Counselling Sessions</h3>
    <button class="btn btn-primary btn-sm">+ Add Session</button>
</div>
<div class="table-container" style="margin-top: 0; margin-bottom: 2rem;">
    <table class="table">
        <tr>
            <th>Date</th>
            <th>Notes</th>
            <th>Progress Status</th>
        </tr>
        @forelse($beneficiary->counsellingSessions as $session)
        <tr>
            <td>{{ $session->session_date }}</td>
            <td>{{ $session->notes }}</td>
            <td>{{ $session->progress_status }}</td>
        </tr>
        @empty
        <tr><td colspan="3" style="text-align: center; color: var(--color-text-secondary);">No counselling sessions recorded yet.</td></tr>
        @endforelse
    </table>
</div>

<!-- Treatments -->
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
    <h3 style="margin: 0;">Treatments & Medication</h3>
    <button class="btn btn-primary btn-sm">+ Add Treatment</button>
</div>
<div class="table-container" style="margin-top: 0; margin-bottom: 2rem;">
    <table class="table">
        <tr>
            <th>Doctor</th>
            <th>Treatment Details</th>
            <th>Medication</th>
            <th>Period</th>
        </tr>
        @forelse($beneficiary->treatments as $treatment)
        <tr>
            <td>{{ $treatment->doctor_name }}</td>
            <td>{{ $treatment->treatment_details }}</td>
            <td>{{ $treatment->medication }}</td>
            <td>{{ $treatment->start_date }} to {{ $treatment->end_date ?? 'Present' }}</td>
        </tr>
        @empty
        <tr><td colspan="4" style="text-align: center; color: var(--color-text-secondary);">No treatments recorded yet.</td></tr>
        @endforelse
    </table>
</div>

<!-- Follow Ups -->
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
    <h3 style="margin: 0;">Follow-ups</h3>
    <button class="btn btn-primary btn-sm">+ Add Follow-up</button>
</div>
<div class="table-container" style="margin-top: 0; margin-bottom: 2rem;">
    <table class="table">
        <tr>
            <th>Date</th>
            <th>Remarks</th>
            <th>Recovery Status</th>
        </tr>
        @forelse($beneficiary->followUps as $followup)
        <tr>
            <td>{{ $followup->followup_date }}</td>
            <td>{{ $followup->remarks }}</td>
            <td>{{ $followup->recovery_status }}</td>
        </tr>
        @empty
        <tr><td colspan="3" style="text-align: center; color: var(--color-text-secondary);">No follow-ups recorded yet.</td></tr>
        @endforelse
    </table>
</div>

@endsection
