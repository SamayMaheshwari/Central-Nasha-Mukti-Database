@extends('layouts.app')

@section('content')

<div style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-3">Add State</h2>

    <div class="card">
        <form action="{{ route('states.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>State Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Save State</button>
            </div>
        </form>
    </div>
</div>

@endsection
