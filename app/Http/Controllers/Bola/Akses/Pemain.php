<?php

namespace App\Http\Controllers\Bola\Akses;

use App\Http\Controllers\Bola\Input\Pemain as InputPemain;
use App\Http\Controllers\Bola\Output\Pemain as OutputPemain;
use App\Http\Controllers\Bola\Proses\Pemain as ProsesPemain;
use App\Http\Controllers\Bola\Validasi\Pemain as ValidasiPemain;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pesan;
use Illuminate\Http\Request;

class Pemain extends Controller
{
    public $pesan;
    public $input;
    public $validasi;
    public $proses;
    public $output;

    function __construct()
    {
        $this->pesan = new Pesan;
        $this->input = new InputPemain;
        $this->validasi = new ValidasiPemain;
        $this->proses = new ProsesPemain;
        $this->output = new OutputPemain;
    }

    //create
    public function Cipta(Request $request, $namaTeam)
    {
        try {
            $nilai = $request->all();
            $val = $this->validasi->Cipta($nilai);
            if ($val->fails()) {
                return response()->json([
                    'error' => $val->errors()
                ], $this->pesan->TidakDitemukan());
            }
            $data = $this->input->Cipta($nilai, $namaTeam);
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
    public function Presentasi($namaTeam)
    {
        try {
            $proses = $this->proses->Presentasi($namaTeam);
            return $this->output->Presentasi($proses);
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
