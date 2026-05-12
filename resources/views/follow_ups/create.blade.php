@extends('layouts.app')

@section('content')

<div style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-3">Log Follow-up</h2>

    <div class="card">
        <form action="{{ route('follow_ups.store') }}" method="POST">
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
                <label>Follow-up Date</label>
                <input type="date" name="followup_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Remarks / Notes</label>
                <textarea name="remarks" class="form-control" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label>Recovery Status</label>
                <select name="recovery_status" class="form-control" required>
                    <option value="Recovering">Recovering</option>
                    <option value="Recovered">Recovered</option>
                    <option value="Relapsed">Relapsed</option>
                    <option value="Unknown">Unknown</option>
                </select>
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Save Follow-up</button>
            </div>
        </form>
    </div>
</div>

@endsection
