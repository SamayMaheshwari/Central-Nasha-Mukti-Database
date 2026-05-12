@extends('layouts.app')

@section('content')

<div style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-3">Edit Center</h2>

    <div class="card">
        <form action="{{ route('centers.update', $center->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Center Name</label>
                <input type="text" name="center_name" class="form-control" value="{{ $center->center_name }}" required>
            </div>

            <div class="mb-3">
                <label>State</label>
                <select name="state_id" class="form-control" required>
                    <option value="">Select State</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}" {{ $center->state_id == $state->id ? 'selected' : '' }}>
                            {{ $state->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>Address</label>
                <input type="text" name="address" class="form-control" value="{{ $center->address }}" required>
            </div>

            <div class="mb-3">
                <label>Contact</label>
                <input type="text" name="contact" class="form-control" value="{{ $center->contact }}" required>
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Update Center</button>
            </div>
        </form>
    </div>
</div>

@endsection
