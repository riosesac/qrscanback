<?php

namespace App\Http\Controllers\Produk\Output;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pesan;
use Illuminate\Http\Request;

class Link extends Controller
{
    public $pesan;

    function __construct()
    {
        $this->pesan = new Pesan;
    }

    //create
    public function Cipta($data)
    {
        if(empty($data)){
            return response()->json([
                'status' => 'gagal',
                'data' => 'data gagal bertambah!!!',
                'code' => $this->pesan->Gagal()
            ],$this->pesan->Gagal());
        }
        return response()->json([
            'status' => 'sukses',
            'data' => 'data berhasil bertambah!!!',
            'code' => $this->pesan->Berhasil()
        ],$this->pesan->Berhasil());
    }

    //Read or View
    public function Presentasi($data)
    {
        if(empty($data)){
            return response()->json([
                'status' => 'gagal',
                'data' => 'data gagal tampil!!!',
                'code' => $this->pesan->Gagal()
            ],$this->pesan->Gagal());
        }
        return response()->json([
            'status' => 'sukses',
            'data' => collect($data)->map(function ($value)
                    {    
                        return[
                                'nama' => $value->nama,
                                'produk' => $value->produk,
                                'link' => $value->link,
                        ];
                    }),
            'code' => $this->pesan->Berhasil()
        ],$this->pesan->Berhasil());
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
