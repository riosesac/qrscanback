<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $table ='links';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id',
        'nama','link','produk'
    ];

    protected $hidden = [
        'id',
        'nama','link','produk'
    ];
}
