@extends('layouts.app')

@section('content')

<div style="max-width: 600px; margin: 0 auto;">
    <h2 class="mb-3">Add Beneficiary</h2>

    <div class="card">
        <form action="{{ route('beneficiaries.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Age</label>
                <input type="number" name="age" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Gender</label>
                <select name="gender" class="form-control" required>
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Addiction Type</label>
                <input type="text" name="addiction_type" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Admission Date</label>
                <input type="date" name="admission_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Center</label>

                <select name="center_id" class="form-control" required>
                    <option value="">Select Center</option>
                    @foreach($centers as $center)
                        <option value="{{ $center->id }}">
                            {{ $center->center_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div style="margin-top: 2rem;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Save Beneficiary</button>
            </div>

        </form>
    </div>
</div>

@endsection