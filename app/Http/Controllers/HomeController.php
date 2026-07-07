<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function __invoke(): View
    {
        return view('welcome', [
            'portalCount' => \App\Models\People::count(),
            'fighterCount' => \App\Models\JulyFighterInfo::where('is_july_fighter', true)->count(),
        ]);
    }
}
