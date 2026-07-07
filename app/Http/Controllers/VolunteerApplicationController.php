<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Volunteer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VolunteerApplicationController extends Controller
{
    public function create(): View
    {
        return view('volunteer.apply', [
            'divisions' => Division::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name_en' => ['required', 'string', 'max:255'],
            'mobile'  => ['nullable', 'string', 'max:20'],
            'picture' => ['nullable', 'image', 'max:2048'],
        ]);

        $picturePath = null;
        if ($request->hasFile('picture')) {
            $picturePath = $request->file('picture')->store('volunteers', 'public');
        }

        Volunteer::create([
            'name_en'               => $request->input('name_en'),
            'name_bn'               => $request->input('name_bn'),
            'nid'                   => $request->input('nid'),
            'birth_reg_no'          => $request->input('birth_reg_no'),
            'mobile'                => $request->input('mobile'),
            'father_name'           => $request->input('father_name'),
            'mother_name'           => $request->input('mother_name'),

            'present_division_id'   => $request->input('present_division_id') ?: null,
            'present_district_id'   => $request->input('present_district_id') ?: null,
            'present_thana_id'      => $request->input('present_thana_id') ?: null,
            'present_union_id'      => $request->input('present_union_id') ?: null,
            'present_ward'          => $request->input('present_ward'),
            'present_village'       => $request->input('present_village'),

            'same_as_present'       => $request->boolean('same_as_present'),

            'permanent_division_id' => $request->input('permanent_division_id') ?: null,
            'permanent_district_id' => $request->input('permanent_district_id') ?: null,
            'permanent_thana_id'    => $request->input('permanent_thana_id') ?: null,
            'permanent_union_id'    => $request->input('permanent_union_id') ?: null,
            'permanent_ward'        => $request->input('permanent_ward'),
            'permanent_village'     => $request->input('permanent_village'),

            'picture'               => $picturePath,
        ]);

        return redirect()->route('volunteer.apply')
            ->with('submitted', true);
    }
}
