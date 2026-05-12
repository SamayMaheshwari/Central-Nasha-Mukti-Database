@extends('layouts.app')

@section('content')

<div style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-3">Edit State</h2>

    <div class="card">
        <form action="{{ route('states.update', $state->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>State Name</label>
                <input type="text" name="name" class="form-control" value="{{ $state->name }}" required>
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Update State</button>
            </div>
        </form>
    </div>
</div>

@endsection
