<?php

namespace App\Http\Controllers\Produk\Validation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Link extends Controller
{
    function __construct()
    {
        
    }

    //create
    public function Cipta($data)
    {
        $val = Validator::make($data,[
            'nama' => 'required'
        ],[
            'nama.required' => 'silahkan input data produk anda'
            ]);
        return $val;
    }

    //Read or View
    public function Presentasi($data)
    {
        
    }

    //update
    public function Restorasi($data)
    {
        $val = Validator::make($data,[
            '' => 'required'
        ],[
            '.required' => 'silahkan input data akses'
            ]);
        return $val;
    }

    //delete
    public function Runtuh($data)
    {
       
    }
}
