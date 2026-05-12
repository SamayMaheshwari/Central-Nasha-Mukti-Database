@extends('layouts.app')

@section('content')

<h2 class="mb-3">Analytics Dashboard</h2>

<h3 style="margin-top: 2rem; margin-bottom: 1rem;">System Overview</h3>
<div class="row">
    <div class="col-md-4">
        <div class="card stat-card">
            <h3>Total Beneficiaries</h3>
            <h1>{{ $beneficiaries }}</h1>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card">
            <h3>Total Centers</h3>
            <h1>{{ $centers }}</h1>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card">
            <h3>Total States</h3>
            <h1>{{ $states }}</h1>
        </div>
    </div>
</div>

<h3 style="margin-top: 2rem; margin-bottom: 1rem;">Intervention Metrics</h3>
<div class="row">
    <div class="col-md-4">
        <div class="card stat-card" style="background: linear-gradient(145deg, #FDF2F8, #FCE7F3);">
            <h3>Counselling Sessions</h3>
            <h1 style="background: linear-gradient(to right, #D946EF, #C026D3); -webkit-background-clip: text;">{{ $counselling_sessions }}</h1>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card" style="background: linear-gradient(145deg, #F5F3FF, #EDE9FE);">
            <h3>Treatments Administered</h3>
            <h1 style="background: linear-gradient(to right, #8B5CF6, #7C3AED); -webkit-background-clip: text;">{{ $treatments }}</h1>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card stat-card" style="background: linear-gradient(145deg, #FFF1F2, #FFE4E6);">
            <h3>Follow-ups Completed</h3>
            <h1 style="background: linear-gradient(to right, #FB7185, #E11D48); -webkit-background-clip: text;">{{ $follow_ups }}</h1>
        </div>
    </div>
</div>

<div class="row" style="margin-top: 2rem;">
    <div class="col-md-4" style="flex: 1;">
        <h3 style="margin-bottom: 1rem;">State-wise Breakdown</h3>
        <div class="table-container" style="margin-top: 0;">
            <table class="table">
                <tr>
                    <th>State</th>
                    <th>Beneficiaries Reached</th>
                </tr>
                @foreach($stateWise as $state)
                <tr>
                    <td>{{ $state->name }}</td>
                    <td><strong>{{ $state->beneficiaries_count }}</strong></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="col-md-4" style="flex: 1;">
        <h3 style="margin-bottom: 1rem;">Center-wise Breakdown</h3>
        <div class="table-container" style="margin-top: 0;">
            <table class="table">
                <tr>
                    <th>Center</th>
                    <th>Beneficiaries Reached</th>
                </tr>
                @foreach($centerWise as $center)
                <tr>
                    <td>{{ $center->center_name }}</td>
                    <td><strong>{{ $center->beneficiaries_count }}</strong></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection