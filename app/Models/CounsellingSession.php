<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CounsellingSession extends Model
{
    protected $fillable = [
        'beneficiary_id',
        'user_id',
        'session_date',
        'notes',
        'progress_status'
    ];

    public function beneficiary()
    {
        return $this->belongsTo(Beneficiary::class);
    }
}
