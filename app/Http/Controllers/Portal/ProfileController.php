<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(): View
    {
        return view('portal.profile', [
            'person' => Auth::guard('people')->user(),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $person = Auth::guard('people')->user();

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['nullable', 'string', 'max:20'],
            'nid_number' => ['nullable', 'string', 'max:50'],
            'date_of_birth' => ['nullable', 'date'],
        ]);

        $person->update($data);

        return back()->with('status', 'Profile updated.');
    }
}
