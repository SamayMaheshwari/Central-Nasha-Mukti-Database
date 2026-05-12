@extends('layouts.app')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2>Treatment Details</h2>
    <a href="{{ route('treatments.index') }}" class="btn btn-warning">Back to List</a>
</div>

<div class="card" style="max-width: 800px; margin: 0 auto;">
    <div style="border-bottom: 1px solid var(--color-border); padding-bottom: 1rem; margin-bottom: 1.5rem;">
        <h3 style="color: var(--color-accent);">{{ $treatment->beneficiary->name ?? 'Unknown' }}</h3>
        <p style="color: var(--color-text-secondary);">Assigned Doctor: <strong>{{ $treatment->doctor_name }}</strong></p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
        <div>
            <label>Medication</label>
            <p style="font-size: 1.1rem; font-weight: 500;">{{ $treatment->medication }}</p>
        </div>
        <div>
            <label>Period</label>
            <p>
                {{ \Carbon\Carbon::parse($treatment->start_date)->format('M d, Y') }} to 
                {{ $treatment->end_date ? \Carbon\Carbon::parse($treatment->end_date)->format('M d, Y') : 'Present' }}
            </p>
        </div>
    </div>

    <div style="margin-top: 2rem;">
        <label>Treatment Details</label>
        <div style="background: var(--color-bg); padding: 1.5rem; border-radius: var(--radius-md); border: 1px solid var(--color-border);">
            {{ $treatment->treatment_details }}
        </div>
    </div>

    <div style="margin-top: 2rem; display: flex; gap: 1rem;">
        <a href="{{ route('treatments.edit', $treatment->id) }}" class="btn btn-warning">Edit Treatment</a>
        <form action="{{ route('treatments.destroy', $treatment->id) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete Record</button>
        </form>
    </div>
</div>

@endsection
