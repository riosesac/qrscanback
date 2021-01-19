<?php

namespace App\Http\Controllers\Produk\Input;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Link extends Controller
{
    function __construct()
    {
        
    }

    //create
    public function Cipta($data)
    {
        $input['nama'] = $data['nama'];
        $input['produk'] = $data['produk'];
        $input['link'] = $data['link'];
        return $input;
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
