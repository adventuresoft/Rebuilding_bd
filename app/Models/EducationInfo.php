<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationInfo extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'highest_education',
        'institution_name',
        'passing_year',
        'result',
        'study_status',
        'education_details',
    ];

    protected function casts(): array
    {
        return [
            'education_details' => 'array',
        ];
    }

    public function user()
    {
        return $this->belongsTo(People::class, 'user_id');
    }
}
