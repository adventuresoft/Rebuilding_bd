<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyInfo extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'land_ownership',
        'house_ownership',
        'vehicle_ownership',
        'property_notes',
    ];

    public function user()
    {
        return $this->belongsTo(People::class, 'user_id');
    }
}
