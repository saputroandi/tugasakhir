<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SK extends Model
{
    protected $guarded = [];
    protected $table = 'sks';
    protected $primaryKey = 'sk_id';
    public $incrementing = false;
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'sk_id';
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
