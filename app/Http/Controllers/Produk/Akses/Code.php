<?php

namespace App\Http\Controllers\Produk\Akses;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pesan;
use App\Http\Controllers\Produk\Input\Code as InputCode;
use App\Http\Controllers\Produk\Output\Code as OutputCode;
use App\Http\Controllers\Produk\Process\Code as ProcessCode;
use App\Http\Controllers\Produk\Validation\Code as ValidationCode;
use Illuminate\Http\Request;

class Code extends Controller
{
    public $pesan;
    public $input;
    public $validasi;
    public $proses;
    public $output;

    function __construct()
    {
        $this->pesan = new Pesan;
        $this->input = new InputCode;
        $this->validasi = new ValidationCode;
        $this->proses = new ProcessCode;
        $this->output = new OutputCode;
    }

    //create
    public function Cipta(Request $request, $nama)
    {
        try {
            $code = $request->all();
            $val = $this->validasi->Cipta($code);
            if ($val->fails()) {
                return response()->json([
                    'error' => $val->errors()
                ], $this->pesan->TidakDitemukan());
            }
            $input = $this->input->Cipta($code);
            $data = $this->proses->Cipta($input, $nama);
            return $this->output->Cipta($data);
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
    public function Presentasi($nama)
    {
        try {
            $data = $this->proses->Presentasi($nama);
            return $this->output->Presentasi($data);
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'errors' => $th->getMessage(),
                'code' => $this->pesan->TidakDitemukan()
            ], $this->pesan->TidakDitemukan());
        }
    }

    //update
    public function Restorasi($nama)
    {
        try {
            $data = $this->proses->Restorasi($nama);
            return $this->output->Restorasi($data);
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'errors' => $th->getMessage(),
                'message' => 'terjadi kesalahan!!!',
                'code' => $this->pesan->TidakDitemukan()
            ], $this->pesan->TidakDitemukan());
        }
    }

    //update
    public function RestorasiJual(Request $request, $id)
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
