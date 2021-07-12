<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SPM extends Model
{
    protected $guarded = [];
    protected $table = 'spms';
    protected $primaryKey = 'spm_id';
    public $incrementing = false;
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'spm_id';
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}
