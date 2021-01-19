<?php

namespace App\Http\Controllers\Bola\Proses;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Model;
use App\Http\Controllers\Pesan;
use Illuminate\Http\Request;

class Team extends Controller
{
    public $pesan;
    private $model;
    public $team;

    function __construct()
    {
        $this->pesan = new Pesan;
        $this->model = new Model;
        $this->team = $this->model->InfoTeam;
    }

    //create
    public function Cipta($data)
    {
        try {
            if ($this->team->where(['nama' => $data['nama']])->first()) {
                # code...
                return false;
            }
            if ($data['logo']) {
                $ekstensi = time() . "." . $data['logo']->getClientOriginalExtension();
                $nama_file = rand(111, 99999) . '_' . $ekstensi;
                $filektp = public_path() . '/logo';
                $data['logo']->move($filektp, $nama_file);
            } else {
                $nama_file = null;
            }
            return $this->team->create([
                'nama' => $data['nama'],
                'logo' => $nama_file,
                'tahunBerdiri' => $data['tahunBerdiri'],
                'alamat' => $data['alamat'],
                'kota' => $data['kota'],
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
    public function Presentasi()
    {
        try {
            return $this->team->where(['deleted_at' => null])->orderBy('nama')->get();
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
