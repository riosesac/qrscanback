<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class InfoPemain extends Model
{
    protected $table = 'info_pemains';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'idTeam', 'nama', 'tinggiBadan', 'beratBadan', 'posisi', 'nomorPunggung'
    ];

    protected $hidden = [
        'id',
        'idTeam', 'nama', 'tinggiBadan', 'beratBadan', 'posisi', 'nomorPunggung'
    ];
}
