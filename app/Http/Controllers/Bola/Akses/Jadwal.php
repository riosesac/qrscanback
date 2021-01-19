<?php

namespace App\Http\Controllers\Bola\Akses;

use App\Http\Controllers\Bola\Input\Jadwal as InputJadwal;
use App\Http\Controllers\Bola\Output\Jadwal as OutputJadwal;
use App\Http\Controllers\Bola\Proses\Jadwal as ProsesJadwal;
use App\Http\Controllers\Bola\Validasi\Jadwal as ValidasiJadwal;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pesan;
use Illuminate\Http\Request;

class Jadwal extends Controller
{
    public $pesan;
    public $input;
    public $validasi;
    public $proses;
    public $output;

    function __construct()
    {
        $this->pesan = new Pesan;
        $this->input = new InputJadwal;
        $this->validasi = new ValidasiJadwal;
        $this->proses = new ProsesJadwal;
        $this->output = new OutputJadwal;
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
            $proses = $this->proses->Presentasi();
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
