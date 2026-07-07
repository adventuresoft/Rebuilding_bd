<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreedomFighterInfo extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'is_freedom_fighter_family',
        'relation_to_freedom_fighter',
        'certificate_number',
        'freedom_fighter_notes',
    ];

    protected function casts(): array
    {
        return [
            'is_freedom_fighter_family' => 'boolean',
        ];
    }

    public function user()
    {
        return $this->belongsTo(People::class, 'user_id');
    }
}
