<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SLP extends Model
{
    protected $fillable = [
        'slp_id',
        'order_id',
        'nama_slp',
        'tmpt_lahir_slp',
        'tgl_lahir_slp',
        'jns_klm_slp',
        'pendidikan_slp',
        'no_hp_slp',
        'email_slp',
        'alamat_slp',
        'posisi_slp',
        'penerima_slp',
        'tmpt_slp_terbit',
        'tgl_slp_terbit',
    ];

    protected $table = 'slps';
    protected $primaryKey = 'slp_id';
    public $incrementing = false;
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'slp_id';
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function lampirans()
    {
        return $this->hasMany(Lampiran::class, 'slp_id');
    }
}
