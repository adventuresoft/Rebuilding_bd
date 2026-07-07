<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    protected $guarded = [];

    public function presentDivision()
    {
        return $this->belongsTo(Division::class, 'present_division_id');
    }

    public function presentDistrict()
    {
        return $this->belongsTo(District::class, 'present_district_id');
    }

    public function presentThana()
    {
        return $this->belongsTo(Thana::class, 'present_thana_id');
    }

    public function presentUnion()
    {
        return $this->belongsTo(Union::class, 'present_union_id');
    }

    public function permanentDivision()
    {
        return $this->belongsTo(Division::class, 'permanent_division_id');
    }

    public function permanentDistrict()
    {
        return $this->belongsTo(District::class, 'permanent_district_id');
    }

    public function permanentThana()
    {
        return $this->belongsTo(Thana::class, 'permanent_thana_id');
    }

    public function permanentUnion()
    {
        return $this->belongsTo(Union::class, 'permanent_union_id');
    }
}
