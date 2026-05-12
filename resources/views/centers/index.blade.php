@extends('layouts.app')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2>Centers</h2>
    <a href="{{ route('centers.create') }}" class="btn btn-primary">
        + Add Center
    </a>
</div>

<div class="table-container">
    <table class="table">
        <tr>
            <th>Center Name</th>
            <th>State</th>
            <th>Address</th>
            <th>Contact</th>
            <th>Action</th>
        </tr>

        @foreach($centers as $center)
        <tr>
            <td>{{ $center->center_name }}</td>
            <td>{{ $center->state ? $center->state->name : 'N/A' }}</td>
            <td>{{ $center->address }}</td>
            <td>{{ $center->contact }}</td>
            <td>
                <a href="{{ route('centers.edit', $center->id) }}"
                    class="btn btn-warning btn-sm" style="margin-right: 0.5rem;">Edit</a>

                <form action="{{ route('centers.destroy', $center->id) }}"
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
