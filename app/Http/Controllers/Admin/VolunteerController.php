<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\Volunteer;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VolunteerController extends Controller
{
    public function index(): View
    {
        $volunteers = Volunteer::with([
            'presentDivision', 'presentDistrict', 'presentThana', 'presentUnion',
            'permanentDivision', 'permanentDistrict', 'permanentThana', 'permanentUnion',
        ])->latest()->paginate(15);

        return view('admin.volunteer.index', compact('volunteers'));
    }

    public function create(): View
    {
        return view('admin.volunteer.create', [
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
            'name_en'                => $request->input('name_en'),
            'name_bn'                => $request->input('name_bn'),
            'nid'                    => $request->input('nid'),
            'birth_reg_no'           => $request->input('birth_reg_no'),
            'mobile'                 => $request->input('mobile'),
            'father_name'            => $request->input('father_name'),
            'mother_name'            => $request->input('mother_name'),

            'present_division_id'    => $request->input('present_division_id') ?: null,
            'present_district_id'    => $request->input('present_district_id') ?: null,
            'present_thana_id'       => $request->input('present_thana_id') ?: null,
            'present_union_id'       => $request->input('present_union_id') ?: null,
            'present_ward'           => $request->input('present_ward'),
            'present_village'        => $request->input('present_village'),

            'same_as_present'        => $request->boolean('same_as_present'),

            'permanent_division_id'  => $request->input('permanent_division_id') ?: null,
            'permanent_district_id'  => $request->input('permanent_district_id') ?: null,
            'permanent_thana_id'     => $request->input('permanent_thana_id') ?: null,
            'permanent_union_id'     => $request->input('permanent_union_id') ?: null,
            'permanent_ward'         => $request->input('permanent_ward'),
            'permanent_village'      => $request->input('permanent_village'),

            'picture'                => $picturePath,
        ]);

        return redirect()->route('admin.volunteers.index')
            ->with('success', 'Volunteer added successfully!');
    }

    public function show(Volunteer $volunteer): View
    {
        $volunteer->load([
            'presentDivision', 'presentDistrict', 'presentThana', 'presentUnion',
            'permanentDivision', 'permanentDistrict', 'permanentThana', 'permanentUnion',
        ]);

        return view('admin.volunteer.show', compact('volunteer'));
    }
}
