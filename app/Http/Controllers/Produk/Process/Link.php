<?php

namespace App\Http\Controllers\Produk\Process;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Model;
use Illuminate\Http\Request;

class Link extends Controller
{
    private $model;
    public $link;

    function __construct()
    {
        $this->model = new Model;
        $this->link = $this->model->Link;
    }

    //create
    public function Cipta($data)
    {
        // dd($data);
        return $this->link->create($data);
    }

    //Read or View
    public function Presentasi()
    {
        return $this->link->get();
    }

    //update
    public function RestorasiBeli($data,$id)
    {
        //
    }

    //update
    public function RestorasiJual($data,$id)
    {
        //
    }

    //delete
    public function Runtuh($id)
    {
        //
    }

    //check
    public function Periksa($data)
    {
        //
    }
}
