<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beneficiary extends Model
{
    protected $fillable = [
        'center_id',
        'name',
        'age',
        'gender',
        'addiction_type',
        'admission_date',
        'status'
    ];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function counsellingSessions()
    {
        return $this->hasMany(CounsellingSession::class);
    }

    public function treatments()
    {
        return $this->hasMany(Treatment::class);
    }

    public function followUps()
    {
        return $this->hasMany(FollowUp::class);
    }
}