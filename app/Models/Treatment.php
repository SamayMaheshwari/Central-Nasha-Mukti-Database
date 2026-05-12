<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    protected $fillable = [
        'beneficiary_id',
        'treatment_details',
        'medication',
        'doctor_name',
        'start_date',
        'end_date'
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
