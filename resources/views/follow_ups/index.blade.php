@extends('layouts.app')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2>Follow-ups</h2>
    <a href="{{ route('follow_ups.create') }}" class="btn btn-primary">
        + Log New Follow-up
    </a>
</div>

<div class="table-container">
    <table class="table">
        <tr>
            <th>Patient</th>
            <th>Date</th>
            <th>Remarks</th>
            <th>Recovery Status</th>
            <th>Action</th>
        </tr>

        @foreach($followUps as $followup)
        <tr>
            <td><a href="{{ route('beneficiaries.show', $followup->beneficiary_id) }}" style="color: var(--color-accent); font-weight: 500;">{{ $followup->beneficiary->name }}</a></td>
            <td>{{ $followup->followup_date }}</td>
            <td>{{ \Illuminate\Support\Str::limit($followup->remarks, 50) }}</td>
            <td>
                <span style="display: inline-block; padding: 0.2rem 0.6rem; border-radius: 99px; font-size: 0.85rem; font-weight: 500; background-color: rgba(0,0,0,0.05);">
                    {{ $followup->recovery_status }}
                </span>
            </td>
            <td>
                <a href="{{ route('follow_ups.edit', $followup->id) }}"
                    class="btn btn-warning btn-sm" style="margin-right: 0.5rem;">Edit</a>

                <form action="{{ route('follow_ups.destroy', $followup->id) }}"
                    method="POST"
                    style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>
</div>

@endsection
