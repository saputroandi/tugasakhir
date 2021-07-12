<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SPD extends Model
{
    protected $fillable = [
        'spd_id',
        'order_id',
        'nama_spd',
        'perusahaan_spd',
        'jabatan_spd',
        'tgl_spd',
        'penerima_spd',
        'tmpt_spd_terbit',
        'tgl_spd_terbit',
    ];

    protected $table = 'spds';
    protected $primaryKey = 'spd_id';
    public $incrementing = false;
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'spd_id';
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }
}