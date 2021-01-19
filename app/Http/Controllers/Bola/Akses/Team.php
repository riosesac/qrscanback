<?php

namespace App\Http\Controllers\Bola\Akses;

use App\Http\Controllers\Bola\Input\Team as InputTeam;
use App\Http\Controllers\Bola\Output\Team as OutputTeam;
use App\Http\Controllers\Bola\Proses\Team as ProsesTeam;
use App\Http\Controllers\Bola\Validasi\Team as ValidasiTeam;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pesan;
use Illuminate\Http\Request;

class Team extends Controller
{
    public $pesan;
    public $input;
    public $validasi;
    public $proses;
    public $output;

    function __construct()
    {
        $this->pesan = new Pesan;
        $this->input = new InputTeam;
        $this->validasi = new ValidasiTeam;
        $this->proses = new ProsesTeam;
        $this->output = new OutputTeam;
    }

    //create
    public function Cipta(Request $request)
    {
        try {
            $nilai = $request->all();
            $val = $this->validasi->Cipta($nilai);
            if ($val->fails()) {
                return response()->json([
                    'error' => $val->errors()
                ], $this->pesan->TidakDitemukan());
            }
            $data = $this->input->Cipta($nilai);
            $proses = $this->proses->Cipta($data);
            return $this->output->Cipta($proses);
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
    public function Presentasi()
    {
        try {
            $data = $this->proses->Presentasi();
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
