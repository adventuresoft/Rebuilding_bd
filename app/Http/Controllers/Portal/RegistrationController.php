<?php

namespace App\Http\Controllers\Portal;

use App\Http\Controllers\Controller;
use App\Models\AddressInfo;
use App\Models\Division;
use App\Models\EducationInfo;
use App\Models\FamilyInfo;
use App\Models\JulyFighterInfo;
use App\Models\People;
use App\Models\PersonalInfo;
use App\Models\ProfessionInfo;
use App\Models\TreatmentInfo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RegistrationController extends Controller
{
    public function create(): View
    {
        return view('portal.registration', [
            'divisions' => Division::orderBy('name')->get(),
        ]);
    }

    public function edit(): View
    {
        return $this->create();
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

        return redirect()->route('home')->with('success', 'আপনার আবেদন সফলভাবে জমা হয়েছে! এটি এখন যাচাইয়ের অপেক্ষায় রয়েছে (Applicant List - Pending Verification)।');
    }

    public function update(Request $request): RedirectResponse
    {
        return back();
    }
}
