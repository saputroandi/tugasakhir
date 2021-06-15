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
    public function getRouteKeyName()
    {
        return 'user_id';
    }
}
