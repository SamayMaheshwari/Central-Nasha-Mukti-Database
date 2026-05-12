@extends('layouts.app')

@section('content')

<div style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-3">Log Treatment</h2>

    <div class="card">
        <form action="{{ route('treatments.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Select Patient</label>
                <select name="beneficiary_id" class="form-control" required>
                    <option value="">Choose Patient...</option>
                    @foreach($beneficiaries as $ben)
                        <option value="{{ $ben->id }}">{{ $ben->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Doctor Name</label>
                <input type="text" name="doctor_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Treatment Details</label>
                <textarea name="treatment_details" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label>Medication Prescribed</label>
                <input type="text" name="medication" class="form-control" required>
            </div>

            <div style="display: flex; gap: 1rem;">
                <div class="mb-3" style="flex: 1;">
                    <label>Start Date</label>
                    <input type="date" name="start_date" class="form-control" required>
                </div>
                <div class="mb-3" style="flex: 1;">
                    <label>End Date (Optional)</label>
                    <input type="date" name="end_date" class="form-control">
                </div>
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Save Treatment</button>
            </div>
        </form>
    </div>
</div>

@endsection
