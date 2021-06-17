<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_id',
        'user_id',
        'payment_status',
        'proof_of_payment',
        'note',
    ];

    protected $primaryKey = 'payment_id';
    public $incrementing = false;

    public function getRouteKeyName()
    {
        return 'payment_id';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
