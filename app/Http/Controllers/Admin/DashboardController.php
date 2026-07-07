<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JulyFighterInfo;
use App\Models\People;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('admin.dashboard', [
            'peopleCount' => People::count(),
            'fighterCount' => JulyFighterInfo::where('is_july_fighter', true)->count(),
            'profileCompletedCount' => People::whereNotNull('profile_completed_at')->count(),
        ]);
    }
}
