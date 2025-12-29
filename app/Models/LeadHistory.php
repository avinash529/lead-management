<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadHistory extends Model
{
    protected $fillable = [
        'lead_id',
        'user_id',
        'old_status',
        'new_status',
        'changed_at',
    ];

    public function lead()
    {
        return $this->belongsTo(\App\Models\Lead::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
