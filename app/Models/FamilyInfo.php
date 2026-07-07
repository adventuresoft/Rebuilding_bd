<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FamilyInfo extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return [
            'married_date' => 'date',
            'have_children' => 'boolean',
            'children_details' => 'array',
        ];
    }

    public function user()
    {
        return $this->belongsTo(People::class, 'user_id');
    }
}
