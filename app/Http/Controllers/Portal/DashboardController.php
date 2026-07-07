<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $person = Auth::guard('people')->user();

        return view('portal.dashboard', [
            'person' => $person,
        ]);
    }
}
