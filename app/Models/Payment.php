<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_id',
        'payment_status',
        'proof_of_payment',
        'pay_date',
        'note',
    ];

    protected $primaryKey = 'payment_id';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
