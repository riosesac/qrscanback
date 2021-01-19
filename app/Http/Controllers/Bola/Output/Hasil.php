<?php

namespace App\Http\Controllers\Bola\Output;

use App\Http\Controllers\Bola\Proses\Hasil as ProsesHasil;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Pesan;
use Illuminate\Http\Request;

class Hasil extends Controller
{
    public $pesan;
    public $proses;

    function __construct()
    {
        $this->pesan = new Pesan;
        $this->proses = new ProsesHasil;
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
                    $tanding = $this->proses->PresentasiSecond($value['jamPertandingan']);
                    return [
                        'tanggalPertandingan' => $value['tanggalPertandingan'],
                        'jamPertandingan' => $value['jamPertandingan'],
                        'timtuan' => $value['timtuan'],
                        'timtamu' => $value['timtamu'],
                        'pertandingan' => collect($tanding)->map(function ($value) {
                            return [
                                'goals' => $value['goals'],
                                'namaPemain' => $value['namaPemain'] . ' (' . $value['teamPencetak'] . ')',
                                'teamPencetak' => $value['teamPencetak']
                            ];
                        }),
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
