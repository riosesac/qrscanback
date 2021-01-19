<?php

namespace App\Http\Controllers\Bola\Validasi;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pesan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class Hasil extends Controller
{
    public $pesan;

    function __construct()
    {
        $this->pesan = new Pesan;
    }

    //create
    public function Cipta($data)
    {
        try {
            $val = Validator::make($data, [
                'namaPemain' => 'required',
            ], [
                'namaPemain.required' => 'silahkan input pemain',
            ]);
            return $val;
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'errors' => $th->getMessage(),
                'message' => 'terjadi kesalahan!!!',
                'code' => $this->pesan->TidakDitemukan()
            ], $this->pesan->TidakDitemukan());
        }
    }

    //Read or View
    public function Presentasi($data)
    {
        try {
            //
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'errors' => $th->getMessage(),
                'code' => $this->pesan->TidakDitemukan()
            ], $this->pesan->TidakDitemukan());
        }
    }

    //update
    public function Restorasi($data)
    {
        try {
            //
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'errors' => $th->getMessage(),
                'message' => 'terjadi kesalahan!!!',
                'code' => $this->pesan->TidakDitemukan()
            ], $this->pesan->TidakDitemukan());
        }
    }

    //delete
    public function Runtuh($id)
    {
        try {
            //
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'errors' => $th->getMessage(),
                'message' => 'terjadi kesalahan!!!',
                'code' => $this->pesan->TidakDitemukan()
            ], $this->pesan->TidakDitemukan());
        }
    }
}
