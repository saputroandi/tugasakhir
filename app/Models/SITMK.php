<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SITMK extends Model
{
    protected $guarded = [];
    protected $table = 'sitmks';
    protected $primaryKey = 'sitmk_id';
    public $incrementing = false;
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'sitmk_id';
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
