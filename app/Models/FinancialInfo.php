<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialInfo extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'user_id',
        'monthly_income',
        'income_source',
        'financial_support',
        'bank_account',
        'financial_notes',
    ];

    public function user()
    {
        return $this->belongsTo(People::class, 'user_id');
    }
}
