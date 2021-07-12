<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'nama_order',
    ];

    protected $primaryKey = 'order_id';
    public $incrementing = false;
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'order_id';
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function spds()
    {
        return $this->hasMany(SPD::class, 'order_id');
    }

    public function slps()
    {
        return $this->hasMany(SLP::class, 'order_id');
    }

    public function sks()
    {
        return $this->hasMany(SK::class, 'order_id');
    }

    public function spms()
    {
        return $this->hasMany(SPM::class, 'order_id');
    }

    public function sitmks()
    {
        return $this->hasMany(SITMK::class, 'order_id');
    }
}
