@extends('layouts.app')

@section('content')

<div style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-3">Edit Treatment</h2>

    <div class="card">
        <form action="{{ route('treatments.update', $treatment->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Select Patient</label>
                <select name="beneficiary_id" class="form-control" required>
                    @foreach($beneficiaries as $ben)
                        <option value="{{ $ben->id }}" {{ $treatment->beneficiary_id == $ben->id ? 'selected' : '' }}>
                            {{ $ben->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Doctor Name</label>
                <input type="text" name="doctor_name" class="form-control" value="{{ $treatment->doctor_name }}" required>
            </div>

            <div class="mb-3">
                <label>Treatment Details</label>
                <textarea name="treatment_details" class="form-control" rows="3" required>{{ $treatment->treatment_details }}</textarea>
            </div>

            <div class="mb-3">
                <label>Medication Prescribed</label>
                <input type="text" name="medication" class="form-control" value="{{ $treatment->medication }}" required>
            </div>

            <div style="display: flex; gap: 1rem;">
                <div class="mb-3" style="flex: 1;">
                    <label>Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="{{ $treatment->start_date }}" required>
                </div>
                <div class="mb-3" style="flex: 1;">
                    <label>End Date</label>
                    <input type="date" name="end_date" class="form-control" value="{{ $treatment->end_date }}">
                </div>
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Update Treatment</button>
            </div>
        </form>
    </div>
</div>

@endsection
