<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class HasilTanding extends Model
{
    protected $table = 'hasil_tandings';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'tanding', 'goal', 'pemain',
    ];

    protected $hidden = [
        'id',
        'tanding', 'goal', 'pemain',
    ];
}
