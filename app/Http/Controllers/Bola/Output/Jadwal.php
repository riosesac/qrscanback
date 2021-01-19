<?php

namespace App\Http\Controllers\Bola\Output;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pesan;
use Illuminate\Http\Request;

class Jadwal extends Controller
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
            if (empty($data)) {
                return response()->json([
                    'status' => false,
                    'data' => 'data gagal bertambah!!!',
                    'code' => $this->pesan->Gagal()
                ], $this->pesan->Gagal());
            }
            return response()->json([
                'status' => true,
                'data' => 'data berhasil bertambah!!!',
                'code' => $this->pesan->Berhasil()
            ], $this->pesan->Berhasil());
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
            if (empty($data)) {
                return response()->json([
                    'status' => 'gagal',
                    'code' => $this->pesan->Gagal()
                ], $this->pesan->Gagal());
            }
            return response()->json([
                'status' => 'sukses',
                'data' => collect($data)->map(function ($value) {
                    return [
                        'idJadwal' => $value['idJadwal'],
                        'timtuan' => $value['timtuan'],
                        'timtamu' => $value['timtamu'],
                        'tanggal' => $value['tanggal'],
                        'jam' => $value['jam'],
                    ];
                }),
                'code' => $this->pesan->Berhasil()
            ], $this->pesan->Berhasil());
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
