@extends('layouts.app')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2>Treatments & Medications</h2>
    <a href="{{ route('treatments.create') }}" class="btn btn-primary">
        + Add Treatment
    </a>
</div>

<div class="table-container">
    <table class="table">
        <tr>
            <th>Beneficiary</th>
            <th>Doctor</th>
            <th>Medication</th>
            <th>Treatment Details</th>
            <th>Period</th>
            <th>Action</th>
        </tr>

        @foreach($treatments as $treatment)
        <tr>
            <td>{{ $treatment->beneficiary->name ?? 'N/A' }}</td>
            <td>{{ $treatment->doctor_name }}</td>
            <td>{{ $treatment->medication }}</td>
            <td>{{ Str::limit($treatment->treatment_details, 50) }}</td>
            <td>
                {{ \Carbon\Carbon::parse($treatment->start_date)->format('M d, Y') }} - 
                {{ $treatment->end_date ? \Carbon\Carbon::parse($treatment->end_date)->format('M d, Y') : 'Present' }}
            </td>
            <td>
                <a href="{{ route('treatments.show', $treatment->id) }}"
                    class="btn btn-primary btn-sm" style="margin-right: 0.5rem; background-color: var(--color-secondary);">View</a>

                <a href="{{ route('treatments.edit', $treatment->id) }}"
                    class="btn btn-warning btn-sm" style="margin-right: 0.5rem;">Edit</a>

                <form action="{{ route('treatments.destroy', $treatment->id) }}"
                    method="POST"
                    style="display:inline-block;">

                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</div>

@endsection
