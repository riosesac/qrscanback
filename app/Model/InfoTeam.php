<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InfoTeam extends Model
{
    protected $table = 'info_teams';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'nama', 'logo', 'tahunBerdiri', 'alamat', 'kota'
    ];

    protected $hidden = [
        'id',
        'nama', 'logo', 'tahunBerdiri', 'alamat', 'kota'
    ];
}
