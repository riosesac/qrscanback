<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CodeCreate extends Controller
{
    function __construct()
    {
        $this->char = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    }
    public function generate($data)
    {
        $input = $this->char;
        $codechar = strlen($input);
        $randomstr = '';
        for ($i=0; $i < $data; $i++) { 
            $randomchar = $input[mt_rand(0,$codechar - 1)];
            $randomstr.= $randomchar; 
        }
        return $randomstr;
    }
}
