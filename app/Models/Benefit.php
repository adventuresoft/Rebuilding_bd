<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    protected $fillable = [
        'person_id',
        'title',
        'type_of_benefit',
        'category',
        'amount',
        'payment_method',
        'status',
        'approval_date',
        'remarks',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'decimal:2',
            'approval_date' => 'date',
        ];
    }

    public function person()
    {
        return $this->belongsTo(People::class, 'person_id');
    }
}
