<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalInfo extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'full_name',
        'father_name',
        'mother_name',
        'date_of_birth',
        'gender',
        'marital_status',
        'phone',
        'national_id',
        'blood_group',
    ];

    public function user()
    {
        return $this->belongsTo(People::class, 'user_id');
    }
}
