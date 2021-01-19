<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JadwalTanding extends Model
{
    protected $table = 'jadwal_tandings';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'tglTanding', 'jamTanding', 'teamHome', 'teamAway',
    ];

    protected $hidden = [
        'id',
        'tglTanding', 'jamTanding', 'teamHome', 'teamAway',
    ];
}
