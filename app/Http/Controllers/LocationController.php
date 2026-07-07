<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\PostOffice;
use App\Models\Thana;
use App\Models\Union;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function getDistricts($divisionId)
    {
        $districts = District::where('division_id', $divisionId)->orderBy('name')->get(['id', 'name', 'bn_name']);
        return response()->json($districts);
    }

    public function getThanas($districtId)
    {
        $thanas = Thana::where('district_id', $districtId)->orderBy('name')->get(['id', 'name', 'bn_name']);
        return response()->json($thanas);
    }

    public function getPostOffices($thanaId)
    {
        $postOffices = PostOffice::where('thana_id', $thanaId)->orderBy('name')->get(['id', 'name', 'bn_name', 'postal_code']);
        return response()->json($postOffices);
    }

    public function getUnions($thanaId)
    {
        $unions = Union::where('thana_id', $thanaId)->orderBy('name')->get(['id', 'name', 'bn_name']);
        return response()->json($unions);
    }
}
