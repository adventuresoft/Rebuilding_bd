<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TreatmentInfo extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'treatment_location',
        'hospital_type',
        'hospital_name',
        'doctor_name',
        'treatment_status',
        'admission_date',
        'release_date',
        'treatment_details',
        'medical_expenses',
    ];

    protected function casts(): array
    {
        return [
            'admission_date' => 'date',
            'release_date' => 'date',
            'medical_expenses' => 'decimal:2',
        ];
    }

    public function user()
    {
        return $this->belongsTo(People::class, 'user_id');
    }
}
