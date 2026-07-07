<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JulyFighterInfo extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'is_july_fighter',
        'fighter_type',
        'incident_date',
        'date_of_death',
        'incident_location',
        'injury_details',
        'contribution_description',
    ];

    protected function casts(): array
    {
        return [
            'is_july_fighter' => 'boolean',
            'incident_date' => 'date',
            'date_of_death' => 'date',
        ];
    }

    public function user()
    {
        return $this->belongsTo(People::class, 'user_id');
    }
}
