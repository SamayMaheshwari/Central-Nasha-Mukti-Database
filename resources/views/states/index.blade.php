@extends('layouts.app')

@section('content')

<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem;">
    <h2>States</h2>
    <a href="{{ route('states.create') }}" class="btn btn-primary">
        + Add State
    </a>
</div>

<div class="table-container">
    <table class="table">
        <tr>
            <th>Name</th>
            <th>Action</th>
        </tr>

        @foreach($states as $state)
        <tr>
            <td>{{ $state->name }}</td>
            <td>
                <a href="{{ route('states.edit', $state->id) }}"
                    class="btn btn-warning btn-sm" style="margin-right: 0.5rem;">Edit</a>

                <form action="{{ route('states.destroy', $state->id) }}"
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
