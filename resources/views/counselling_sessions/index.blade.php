@extends('layouts.app')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2>Counselling Sessions</h2>
    <a href="{{ route('counselling_sessions.create') }}" class="btn btn-primary">
        + Log New Session
    </a>
</div>

<div class="table-container">
    <table class="table">
        <tr>
            <th>Date</th>
            <th>Patient (Beneficiary)</th>
            <th>Notes</th>
            <th>Progress Status</th>
            <th>Action</th>
        </tr>

        @foreach($sessions as $session)
        <tr>
            <td>{{ $session->session_date }}</td>
            <td><a href="{{ route('beneficiaries.show', $session->beneficiary_id) }}" style="color: var(--color-accent); font-weight: 500;">{{ $session->beneficiary->name }}</a></td>
            <td>{{ \Illuminate\Support\Str::limit($session->notes, 50) }}</td>
            <td>{{ $session->progress_status }}</td>
            <td>
                <a href="{{ route('counselling_sessions.edit', $session->id) }}"
                    class="btn btn-warning btn-sm" style="margin-right: 0.5rem;">Edit</a>

                <form action="{{ route('counselling_sessions.destroy', $session->id) }}"
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
