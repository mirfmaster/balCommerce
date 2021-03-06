<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    protected $fillable = ['username', 'name', 'birth_date', 'address', 'password', 'phone'];
    protected $dates = ['created_at', 'updated_at', 'deleted_at'];
    protected $guard = 'web';
    public function user()
    {
        return $this->belongsToMany('App\Models\User', 'diagnosis')
            ->withPivot('id', 'diagnose')
            ->withTimestamps();
    }
    public function prescriptions()
    {
        return $this->belongsToMany('App\Models\Patient', 'prescriptions')
            ->withPivot('medical_prescription', 'validity_period')
            ->withTimestamps();
    }
}
