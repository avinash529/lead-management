<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'status',
        'date_added',
        'last_updated',
    ];

    // Each lead belongs to a user
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function histories()
    {
        return $this->hasMany(\App\Models\LeadHistory::class);
    }
}
