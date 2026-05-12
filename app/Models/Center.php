<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $fillable = [
        'state_id',
        'center_name',
        'address',
        'contact'
    ];

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class);
    }
}