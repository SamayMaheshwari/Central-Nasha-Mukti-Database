@extends('layouts.app')

@section('content')

<div style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-3">Edit Counselling Session</h2>

    <div class="card">
        <form action="{{ route('counselling_sessions.update', $counsellingSession->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Select Patient</label>
                <select name="beneficiary_id" class="form-control" required>
                    @foreach($beneficiaries as $ben)
                        <option value="{{ $ben->id }}" {{ $counsellingSession->beneficiary_id == $ben->id ? 'selected' : '' }}>
                            {{ $ben->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Session Date</label>
                <input type="date" name="session_date" class="form-control" value="{{ $counsellingSession->session_date }}" required>
            </div>

            <div class="mb-3">
                <label>Session Notes</label>
                <textarea name="notes" class="form-control" rows="4" required>{{ $counsellingSession->notes }}</textarea>
            </div>

            <div class="mb-3">
                <label>Progress Status</label>
                <select name="progress_status" class="form-control" required>
                    <option value="Improving" {{ $counsellingSession->progress_status == 'Improving' ? 'selected' : '' }}>Improving</option>
                    <option value="Stable" {{ $counsellingSession->progress_status == 'Stable' ? 'selected' : '' }}>Stable</option>
                    <option value="Deteriorating" {{ $counsellingSession->progress_status == 'Deteriorating' ? 'selected' : '' }}>Deteriorating</option>
                    <option value="Relapsed" {{ $counsellingSession->progress_status == 'Relapsed' ? 'selected' : '' }}>Relapsed</option>
                </select>
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Update Session</button>
            </div>
        </form>
    </div>
</div>

@endsection
