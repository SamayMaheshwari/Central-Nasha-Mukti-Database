@extends('layouts.app')

@section('content')

<div style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-3">Edit Follow-up</h2>

    <div class="card">
        <form action="{{ route('follow_ups.update', $followUp->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Select Patient</label>
                <select name="beneficiary_id" class="form-control" required>
                    @foreach($beneficiaries as $ben)
                        <option value="{{ $ben->id }}" {{ $followUp->beneficiary_id == $ben->id ? 'selected' : '' }}>
                            {{ $ben->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Follow-up Date</label>
                <input type="date" name="followup_date" class="form-control" value="{{ $followUp->followup_date }}" required>
            </div>

            <div class="mb-3">
                <label>Remarks / Notes</label>
                <textarea name="remarks" class="form-control" rows="3" required>{{ $followUp->remarks }}</textarea>
            </div>

            <div class="mb-3">
                <label>Recovery Status</label>
                <select name="recovery_status" class="form-control" required>
                    <option value="Recovering" {{ $followUp->recovery_status == 'Recovering' ? 'selected' : '' }}>Recovering</option>
                    <option value="Recovered" {{ $followUp->recovery_status == 'Recovered' ? 'selected' : '' }}>Recovered</option>
                    <option value="Relapsed" {{ $followUp->recovery_status == 'Relapsed' ? 'selected' : '' }}>Relapsed</option>
                    <option value="Unknown" {{ $followUp->recovery_status == 'Unknown' ? 'selected' : '' }}>Unknown</option>
                </select>
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Update Follow-up</button>
            </div>
        </form>
    </div>
</div>

@endsection
