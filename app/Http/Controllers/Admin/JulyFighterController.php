<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Division;
use App\Models\JulyFighterInfo;
use App\Models\People;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class JulyFighterController extends Controller
{
    public function index(Request $request): View
    {
        $tab = $request->string('tab', 'applicant')->toString();
        $query = People::query()->with(['julyFighterInfo', 'personalInfo', 'addressInfo', 'professionInfo']);

        if ($tab === 'registered') {
            $query->whereHas('julyFighterInfo', function ($q) {
                $q->where('is_july_fighter', true);
            });
        } else {
            $query->where(function ($builder) {
                $builder->whereDoesntHave('julyFighterInfo')
                    ->orWhereHas('julyFighterInfo', function ($q) {
                        $q->where('is_july_fighter', false);
                    });
            });
        }

        if ($name = $request->string('search_name')->trim()->toString()) {
            $query->where('name', 'like', "%{$name}%");
        }

        if ($mobile = $request->string('mobile')->trim()->toString()) {
            $query->where('phone', 'like', "%{$mobile}%");
        }

        if ($gender = $request->string('gender')->trim()->toString()) {
            $query->whereHas('personalInfo', function ($q) use ($gender) {
                $q->where('gender', $gender);
            });
        }

        if ($search = $request->string('q')->trim()->toString()) {
            $query->where(function ($builder) use ($search): void {
                $builder->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%")
                    ->orWhere('nid_number', 'like', "%{$search}%");
            });
        }

        return view('admin.july-fighter.index', [
            'people' => $query->latest()->paginate(10)->withQueryString(),
            'tab' => $tab,
            'search_name' => $request->string('search_name')->toString(),
            'mobile' => $request->string('mobile')->toString(),
            'gender' => $request->string('gender')->toString(),
            'search' => $request->string('q')->toString(),
        ]);
    }

    public function create(): View
    {
        return view('admin.july-fighter.create', [
            'divisions' => Division::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $email = $request->filled('email') 
            ? $request->input('email') 
            : 'fighter_' . uniqid() . '_' . rand(100, 999) . '@julyfighter.local';

        if (People::where('email', $email)->exists()) {
            $email = 'fighter_' . uniqid() . '_' . rand(1000, 9999) . '@julyfighter.local';
        }

        $person = People::create([
            'name' => $request->input('name', 'Unnamed Fighter'),
            'email' => $email,
            'phone' => $request->input('phone'),
            'nid_number' => $request->input('nid_number'),
            'date_of_birth' => $request->input('date_of_birth') ?: null,
            'password' => bcrypt($request->input('password', '12345678')),
            'profile_completed_at' => now(),
        ]);

        $person->personalInfo()->create([
            'full_name' => $request->input('name', 'Unnamed Fighter'),
            'father_name' => $request->input('father_name'),
            'mother_name' => $request->input('mother_name'),
            'date_of_birth' => $request->input('date_of_birth') ?: null,
            'gender' => $request->input('gender'),
            'marital_status' => $request->input('marital_status'),
            'phone' => $request->input('phone'),
            'national_id' => $request->input('nid_number'),
            'blood_group' => $request->input('blood_group'),
        ]);

        $person->familyInfo()->create([
            'family_member_type' => $request->input('family_member_type'),
            'father_name' => $request->input('father_name'),
            'father_name_bangla' => $request->input('father_name_bangla'),
            'father_live_status' => $request->input('father_live_status'),
            'father_id' => $request->input('father_id'),
            'mother_name' => $request->input('mother_name'),
            'mother_name_bangla' => $request->input('mother_name_bangla'),
            'mother_live_status' => $request->input('mother_live_status'),
            'mother_id' => $request->input('mother_id'),
            'marital_status' => $request->input('marital_status'),
            'spouse_name' => $request->input('spouse_name'),
            'spouse_name_bangla' => $request->input('spouse_name_bangla'),
            'spouse_nid' => $request->input('spouse_nid'),
            'married_date' => $request->input('married_date') ?: null,
            'family_head_name' => $request->input('family_head_name', $request->input('father_name')),
            'have_children' => $request->boolean('have_children'),
            'number_of_boys' => $request->input('number_of_boys') ?: 0,
            'number_of_girls' => $request->input('number_of_girls') ?: 0,
            'children_details' => [
                'boys' => $request->input('boys', []),
                'girls' => $request->input('girls', []),
            ],
            'monthly_family_income' => $request->input('monthly_family_income') ?: null,
            'guardian_notes' => $request->input('guardian_notes'),
        ]);

        $person->addressInfo()->create([
            'current_address' => $request->input('current_address'),
            'permanent_address' => $request->input('permanent_address'),
            'division' => $request->input('division'),
            'district' => $request->input('district'),
            'upazila' => $request->input('upazila'),
            'postal_code' => $request->input('postal_code'),

            'permanent_division_id' => $request->input('permanent_division_id') ?: null,
            'permanent_district_id' => $request->input('permanent_district_id') ?: null,
            'permanent_thana_id' => $request->input('permanent_thana_id') ?: null,
            'permanent_post_office_id' => $request->input('permanent_post_office_id') ?: null,
            'permanent_union_id' => $request->input('permanent_union_id') ?: null,
            'permanent_village' => $request->input('permanent_village'),
            'permanent_ward' => $request->input('permanent_ward'),
            'permanent_road' => $request->input('permanent_road'),
            'permanent_house' => $request->input('permanent_house'),
            'permanent_house_bn' => $request->input('permanent_house_bn'),

            'same_as_permanent' => $request->boolean('same_as_permanent'),

            'present_division_id' => $request->input('present_division_id') ?: null,
            'present_district_id' => $request->input('present_district_id') ?: null,
            'present_thana_id' => $request->input('present_thana_id') ?: null,
            'present_post_office_id' => $request->input('present_post_office_id') ?: null,
            'present_union_id' => $request->input('present_union_id') ?: null,
            'present_village' => $request->input('present_village'),
            'present_ward' => $request->input('present_ward'),
            'present_road' => $request->input('present_road'),
            'present_house' => $request->input('present_house'),
            'present_house_bn' => $request->input('present_house_bn'),
        ]);

        $educations = array_values(array_filter($request->input('educations', []), function($row) {
            return !empty(array_filter((array) $row));
        }));
        $firstEdu = $educations[0] ?? [];

        $person->educationInfo()->create([
            'highest_education' => !empty($firstEdu['degree']) ? $firstEdu['degree'] : $request->input('highest_education'),
            'institution_name' => !empty($firstEdu['institute']) ? $firstEdu['institute'] : $request->input('institution_name'),
            'passing_year' => !empty($firstEdu['passing_year']) ? $firstEdu['passing_year'] : $request->input('passing_year'),
            'result' => !empty($firstEdu['grade']) ? $firstEdu['grade'] : $request->input('result'),
            'study_status' => !empty($firstEdu['group']) ? $firstEdu['group'] : $request->input('study_status'),
            'education_details' => $educations,
        ]);

        $person->professionInfo()->create([
            'profession' => $request->input('profession'),
            'workplace' => $request->input('workplace'),
            'designation' => $request->input('designation'),
            'experience_years' => $request->input('experience_years') ?: null,
            'profession_notes' => $request->input('profession_notes'),
        ]);

        $person->treatmentInfo()->create([
            'treatment_location' => $request->input('treatment_location'),
            'hospital_type' => $request->input('hospital_type'),
            'hospital_name' => $request->input('hospital_name'),
            'doctor_name' => $request->input('doctor_name'),
            'treatment_status' => $request->input('treatment_status'),
            'admission_date' => $request->input('admission_date') ?: null,
            'release_date' => $request->input('release_date') ?: null,
            'treatment_details' => $request->input('treatment_details'),
            'medical_expenses' => $request->input('medical_expenses') ?: null,
        ]);

        $person->julyFighterInfo()->create([
            'is_july_fighter' => false,
            'fighter_type' => $request->input('fighter_type', 'General Participant'),
            'incident_date' => $request->input('incident_date') ?: null,
            'date_of_death' => $request->input('date_of_death') ?: null,
            'incident_location' => $request->input('incident_location'),
            'injury_details' => $request->input('injury_details'),
            'contribution_description' => $request->input('contribution_description'),
        ]);

        return redirect()->route('admin.july-fighter.index', ['tab' => 'applicant'])->with('success', 'July Fighter applicant created successfully! Now showing in Applicant List.');
    }

    public function show(People $person): View
    {
        $person->load([
            'personalInfo',
            'familyInfo',
            'addressInfo',
            'educationInfo',
            'professionInfo',
            'financialInfo',
            'propertyInfo',
            'disabilityInfo',
            'freedomFighterInfo',
            'treatmentInfo',
            'julyFighterInfo',
        ]);

        return view('admin.july-fighter.show', [
            'person' => $person,
        ]);
    }

    public function edit(People $person): View
    {
        $person->load([
            'personalInfo',
            'familyInfo',
            'addressInfo',
            'educationInfo',
            'professionInfo',
            'treatmentInfo',
            'julyFighterInfo',
        ]);

        return view('admin.july-fighter.create', [
            'person' => $person,
            'divisions' => Division::orderBy('name')->get(),
        ]);
    }

    public function update(Request $request, People $person): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $person->update([
            'name' => $request->input('name', $person->name),
            'phone' => $request->input('phone', $person->phone),
            'nid_number' => $request->input('nid_number', $person->nid_number),
            'date_of_birth' => $request->input('date_of_birth') ?: $person->date_of_birth,
        ]);

        $person->personalInfo()->updateOrCreate(
            ['user_id' => $person->id],
            [
                'full_name' => $request->input('name', $person->name),
                'father_name' => $request->input('father_name'),
                'mother_name' => $request->input('mother_name'),
                'date_of_birth' => $request->input('date_of_birth') ?: null,
                'gender' => $request->input('gender'),
                'marital_status' => $request->input('marital_status'),
                'phone' => $request->input('phone'),
                'national_id' => $request->input('nid_number'),
                'blood_group' => $request->input('blood_group'),
            ]
        );

        $person->familyInfo()->updateOrCreate(
            ['user_id' => $person->id],
            [
                'family_member_type' => $request->input('family_member_type'),
                'father_name' => $request->input('father_name'),
                'father_name_bangla' => $request->input('father_name_bangla'),
                'father_live_status' => $request->input('father_live_status'),
                'father_id' => $request->input('father_id'),
                'mother_name' => $request->input('mother_name'),
                'mother_name_bangla' => $request->input('mother_name_bangla'),
                'mother_live_status' => $request->input('mother_live_status'),
                'mother_id' => $request->input('mother_id'),
                'marital_status' => $request->input('marital_status'),
                'spouse_name' => $request->input('spouse_name'),
                'spouse_name_bangla' => $request->input('spouse_name_bangla'),
                'spouse_nid' => $request->input('spouse_nid'),
                'married_date' => $request->input('married_date') ?: null,
                'family_head_name' => $request->input('family_head_name', $request->input('father_name')),
                'have_children' => $request->boolean('have_children'),
                'number_of_boys' => $request->input('number_of_boys') ?: 0,
                'number_of_girls' => $request->input('number_of_girls') ?: 0,
                'children_details' => [
                    'boys' => $request->input('boys', []),
                    'girls' => $request->input('girls', []),
                ],
                'monthly_family_income' => $request->input('monthly_family_income') ?: null,
                'guardian_notes' => $request->input('guardian_notes'),
            ]
        );

        $person->addressInfo()->updateOrCreate(
            ['user_id' => $person->id],
            [
                'current_address' => $request->input('current_address'),
                'permanent_address' => $request->input('permanent_address'),
                'division' => $request->input('division'),
                'district' => $request->input('district'),
                'upazila' => $request->input('upazila'),
                'postal_code' => $request->input('postal_code'),

                'permanent_division_id' => $request->input('permanent_division_id') ?: null,
                'permanent_district_id' => $request->input('permanent_district_id') ?: null,
                'permanent_thana_id' => $request->input('permanent_thana_id') ?: null,
                'permanent_post_office_id' => $request->input('permanent_post_office_id') ?: null,
                'permanent_union_id' => $request->input('permanent_union_id') ?: null,
                'permanent_village' => $request->input('permanent_village'),
                'permanent_ward' => $request->input('permanent_ward'),
                'permanent_road' => $request->input('permanent_road'),
                'permanent_house' => $request->input('permanent_house'),
                'permanent_house_bn' => $request->input('permanent_house_bn'),

                'same_as_permanent' => $request->boolean('same_as_permanent'),

                'present_division_id' => $request->input('present_division_id') ?: null,
                'present_district_id' => $request->input('present_district_id') ?: null,
                'present_thana_id' => $request->input('present_thana_id') ?: null,
                'present_post_office_id' => $request->input('present_post_office_id') ?: null,
                'present_union_id' => $request->input('present_union_id') ?: null,
                'present_village' => $request->input('present_village'),
                'present_ward' => $request->input('present_ward'),
                'present_road' => $request->input('present_road'),
                'present_house' => $request->input('present_house'),
                'present_house_bn' => $request->input('present_house_bn'),
            ]
        );

        $educationsUpdate = array_values(array_filter($request->input('educations', []), function($row) {
            return !empty(array_filter((array) $row));
        }));
        $firstEduUpdate = $educationsUpdate[0] ?? [];

        $person->educationInfo()->updateOrCreate(
            ['user_id' => $person->id],
            [
                'highest_education' => !empty($firstEduUpdate['degree']) ? $firstEduUpdate['degree'] : $request->input('highest_education'),
                'institution_name' => !empty($firstEduUpdate['institute']) ? $firstEduUpdate['institute'] : $request->input('institution_name'),
                'passing_year' => !empty($firstEduUpdate['passing_year']) ? $firstEduUpdate['passing_year'] : $request->input('passing_year'),
                'result' => !empty($firstEduUpdate['grade']) ? $firstEduUpdate['grade'] : $request->input('result'),
                'study_status' => !empty($firstEduUpdate['group']) ? $firstEduUpdate['group'] : $request->input('study_status'),
                'education_details' => $educationsUpdate,
            ]
        );

        $person->professionInfo()->updateOrCreate(
            ['user_id' => $person->id],
            [
                'profession' => $request->input('profession'),
                'workplace' => $request->input('workplace'),
                'designation' => $request->input('designation'),
                'experience_years' => $request->input('experience_years') ?: null,
                'profession_notes' => $request->input('profession_notes'),
            ]
        );

        $person->treatmentInfo()->updateOrCreate(
            ['user_id' => $person->id],
            [
                'treatment_location' => $request->input('treatment_location'),
                'hospital_type' => $request->input('hospital_type'),
                'hospital_name' => $request->input('hospital_name'),
                'doctor_name' => $request->input('doctor_name'),
                'treatment_status' => $request->input('treatment_status'),
                'admission_date' => $request->input('admission_date') ?: null,
                'release_date' => $request->input('release_date') ?: null,
                'treatment_details' => $request->input('treatment_details'),
                'medical_expenses' => $request->input('medical_expenses') ?: null,
            ]
        );

        $person->julyFighterInfo()->updateOrCreate(
            ['user_id' => $person->id],
            [
                'fighter_type' => $request->input('fighter_type', 'General Participant'),
                'incident_date' => $request->input('incident_date') ?: null,
                'date_of_death' => $request->input('date_of_death') ?: null,
                'incident_location' => $request->input('incident_location'),
                'injury_details' => $request->input('injury_details'),
                'contribution_description' => $request->input('contribution_description'),
            ]
        );

        return redirect()->route('admin.july-fighter.show', $person)->with('success', 'July Fighter record updated successfully!');
    }

    public function approve(People $person): RedirectResponse
    {
        if ($person->julyFighterInfo) {
            $person->julyFighterInfo()->update(['is_july_fighter' => true]);
        } else {
            $person->julyFighterInfo()->create([
                'is_july_fighter' => true,
                'fighter_type' => 'Approved Fighter',
            ]);
        }

        return redirect()->route('admin.july-fighter.index', ['tab' => 'registered'])->with('success', 'July Fighter record approved successfully! Now showing in Reg. July Fighter List.');
    }

    public function search(Request $request): RedirectResponse
    {
        return redirect()->route('admin.july-fighter.index', ['q' => $request->string('q')->toString()]);
    }
}
