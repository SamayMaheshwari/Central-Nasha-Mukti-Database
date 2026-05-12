@extends('layouts.app')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2>Beneficiaries</h2>
    <a href="{{ route('beneficiaries.create') }}" class="btn btn-primary">
        + Add Beneficiary
    </a>
</div>

<div class="table-container">
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Addiction Type</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        @foreach($beneficiaries as $beneficiary)
        <tr>
            <td>{{ $beneficiary->name }}</td>
            <td>{{ $beneficiary->age }}</td>
            <td>{{ $beneficiary->gender }}</td>
            <td>{{ $beneficiary->addiction_type }}</td>
            <td>
                <span style="display: inline-block; padding: 0.25rem 0.75rem; border-radius: 99px; font-size: 0.85rem; font-weight: 500; background-color: rgba(0,0,0,0.05);">
                    {{ $beneficiary->status }}
                </span>
            </td>
            <td>
                <a href="{{ route('beneficiaries.show', $beneficiary->id) }}"
                    class="btn btn-primary btn-sm" style="margin-right: 0.5rem;">Profile</a>

                <a href="{{ route('beneficiaries.edit', $beneficiary->id) }}"
                    class="btn btn-warning btn-sm" style="margin-right: 0.5rem;">Edit</a>

                <form action="{{ route('beneficiaries.destroy', $beneficiary->id) }}"
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