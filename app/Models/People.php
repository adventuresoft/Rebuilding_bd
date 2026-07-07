<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class People extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'nid_number',
        'date_of_birth',
        'password',
        'profile_completed_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'date_of_birth' => 'date',
            'profile_completed_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function personalInfo()
    {
        return $this->hasOne(PersonalInfo::class, 'user_id');
    }

    public function familyInfo()
    {
        return $this->hasOne(FamilyInfo::class, 'user_id');
    }

    public function addressInfo()
    {
        return $this->hasOne(AddressInfo::class, 'user_id');
    }

    public function educationInfo()
    {
        return $this->hasOne(EducationInfo::class, 'user_id');
    }

    public function professionInfo()
    {
        return $this->hasOne(ProfessionInfo::class, 'user_id');
    }

    public function financialInfo()
    {
        return $this->hasOne(FinancialInfo::class, 'user_id');
    }

    public function propertyInfo()
    {
        return $this->hasOne(PropertyInfo::class, 'user_id');
    }

    public function disabilityInfo()
    {
        return $this->hasOne(DisabilityInfo::class, 'user_id');
    }

    public function freedomFighterInfo()
    {
        return $this->hasOne(FreedomFighterInfo::class, 'user_id');
    }

    public function julyFighterInfo()
    {
        return $this->hasOne(JulyFighterInfo::class, 'user_id');
    }

    public function treatmentInfo()
    {
        return $this->hasOne(TreatmentInfo::class, 'user_id');
    }

    public function benefits()
    {
        return $this->hasMany(Benefit::class, 'person_id');
    }
}
