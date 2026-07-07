<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DisabilityInfo extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'has_disability',
        'disability_type',
        'disability_details',
        'support_required',
    ];

    protected function casts(): array
    {
        return [
            'has_disability' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(People::class, 'user_id');
    }
}
