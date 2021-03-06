<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'password',
        'email_verifikasi'
    ];

    protected $primaryKey = 'user_id';
    public $incrementing = false;
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'user_id';
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
}
