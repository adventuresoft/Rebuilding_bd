<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfessionInfo extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'profession',
        'workplace',
        'designation',
        'experience_years',
        'profession_notes',
    ];

    public function user()
    {
        return $this->belongsTo(People::class, 'user_id');
    }
}
