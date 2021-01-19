<?php

namespace App\Http\Controllers\Produk\Input;

// use App\Http\Controllers\CodeCreate;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Code extends Controller
{
    // public $codes;

    function __construct()
    {
        // $this->codes = new CodeCreate;
    }

    //create
    public function Cipta($data)
    {
        $reqdata['jmldata'] = $data['jmldata'];
        return $reqdata;
    }

    //Read or View
    public function Presentasi()
    {
        # code...
    }

    //update
    public function RestorasiBeli($data)
    {
        //
    }

    //update
    public function RestorasiJual($data)
    {
        //
    }

    //delete
    public function Runtuh()
    {
        # code...
    }
}
