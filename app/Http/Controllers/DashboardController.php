<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use App\Models\Center;
use App\Models\State;
use App\Models\CounsellingSession;
use App\Models\Treatment;
use App\Models\FollowUp;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $stateWise = State::withCount(['centers as beneficiaries_count' => function ($query) {
            $query->join('beneficiaries', 'centers.id', '=', 'beneficiaries.center_id');
        }])->get();

        $centerWise = Center::withCount('beneficiaries')->get();

        return view('dashboard', [
            'beneficiaries' => Beneficiary::count(),
            'centers' => Center::count(),
            'states' => State::count(),
            'counselling_sessions' => CounsellingSession::count(),
            'treatments' => Treatment::count(),
            'follow_ups' => FollowUp::count(),
            'stateWise' => $stateWise,
            'centerWise' => $centerWise,
        ]);
    }
}