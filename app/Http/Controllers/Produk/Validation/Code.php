<?php

namespace App\Http\Controllers\Produk\Validation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Code extends Controller
{
    function __construct()
    {
        
    }

    //create
    public function Cipta($data)
    {
        $val = Validator::make($data,[
            'jmldata' => 'required'
        ],[
            'jmldata.required' => 'silahkan jumlah data yang anda butuhkan'
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
