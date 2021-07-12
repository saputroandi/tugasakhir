<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lampiran extends Model
{
    protected $fillable = [
        'lampiran_id',
        'slp_id',
        'nama_lampiran',
    ];

    protected $table = 'lampirans';
    protected $primaryKey = 'lampiran_id';
    public $incrementing = false;
    public $timestamps = false;

    public function getRouteKeyName()
    {
        return 'lampiran_id';
    }

    public function slp()
    {
        return $this->belongsTo(SLP::class, 'slp_id');
    }
}
