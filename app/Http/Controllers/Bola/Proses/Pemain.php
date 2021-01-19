<?php

namespace App\Http\Controllers\Bola\Proses;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Model;
use App\Http\Controllers\Pesan;
use Illuminate\Http\Request;

class Pemain extends Controller
{
    public $pesan;
    private $model;
    public $pemain;
    public $team;

    function __construct()
    {
        $this->pesan = new Pesan;
        $this->model = new Model;
        $this->pemain = $this->model->InfoPemain;
        $this->team = $this->model->InfoTeam;
    }

    //create
    public function Cipta($data)
    {
        try {
            $tim = $this->team->where(['nama' => $data['namaTeam']])->first();
            if ($tim->id == null) {
                # code...
                return false;
            }
            if ($this->pemain->where([
                'idTeam' => $tim->id,
                'nama' => $data['nama'],
                'tinggiBadan' => $data['tinggiBadan'],
                'beratBadan' => $data['beratBadan'],
                'posisi' => $data['posisi'],
                'nomorPunggung' => $data['nomorPunggung'],
                'deleted_at' => null
            ])->first()) {
                # code...
                return false;
            }
            if ($this->pemain->where([
                'idTeam' => $tim->id,
                'nomorPunggung' => $data['nomorPunggung'],
                'deleted_at' => null
            ])->first()) {
                # code...
                return false;
            }
            return $this->pemain->create([
                'idTeam' => $tim->id,
                'nama' => $data['nama'],
                'tinggiBadan' => $data['tinggiBadan'],
                'beratBadan' => $data['beratBadan'],
                'posisi' => $data['posisi'],
                'nomorPunggung' => $data['nomorPunggung'],
            ]);
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
            $tim = $this->team->where(['nama' => $namaTeam])->first();
            if ($tim->id == null) {
                # code...
                return false;
            }
            return $this->pemain->where(['idTeam' => $tim->id, 'deleted_at' => null])->orderBy('posisi', 'desc')->get();
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
