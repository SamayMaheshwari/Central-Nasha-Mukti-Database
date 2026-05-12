@extends('layouts.app')

@section('content')

<div style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-3">Log Counselling Session</h2>

    <div class="card">
        <form action="{{ route('counselling_sessions.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Select Patient</label>
                <select name="beneficiary_id" class="form-control" required>
                    <option value="">Choose Patient...</option>
                    @foreach($beneficiaries as $ben)
                        <option value="{{ $ben->id }}">{{ $ben->name }} (ID: {{ $ben->id }})</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Session Date</label>
                <input type="date" name="session_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Session Notes</label>
                <textarea name="notes" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label>Progress Status</label>
                <select name="progress_status" class="form-control" required>
                    <option value="Improving">Improving</option>
                    <option value="Stable">Stable</option>
                    <option value="Deteriorating">Deteriorating</option>
                    <option value="Relapsed">Relapsed</option>
                </select>
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Save Session</button>
            </div>
        </form>
    </div>
</div>

@endsection
