<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    protected $table ='codes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id','idLink',
        'code'
    ];

    protected $hidden = [
        'id','idLink',
        'code'
    ];
}
