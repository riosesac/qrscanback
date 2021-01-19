<?php

namespace App\Http\Controllers\Bola\Proses;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Model;
use App\Http\Controllers\Pesan;
use Illuminate\Http\Request;

class Jadwal extends Controller
{
    public $pesan;
    private $model;
    public $pemain;
    public $team;
    public $jadwal;

    function __construct()
    {
        $this->pesan = new Pesan;
        $this->model = new Model;
        $this->pemain = $this->model->InfoPemain;
        $this->team = $this->model->InfoTeam;
        $this->jadwal = $this->model->JadwalTanding;
    }

    //create
    public function Cipta($data)
    {
        try {
            $timTuan = $this->team->where(['nama' => $data['teamHome']])->first();
            $timTamu = $this->team->where(['nama' => $data['teamAway']])->first();
            if ($timTuan->id == null) {
                # code...
                return false;
            }
            if ($timTamu->id == null) {
                # code...
                return false;
            }
            if ($timTuan->id == $timTamu->id) {
                # code...
                return false;
            }
            if ($this->jadwal->where([
                'tglTanding' => $data['tglTanding'],
                'jamTanding' => $data['jamTanding']
            ])->first()) {
                # code...
                return false;
            }
            return $this->jadwal->create([
                'teamHome' => $timTuan->id,
                'teamAway' => $timTamu->id,
                'tglTanding' => $data['tglTanding'],
                'jamTanding' => $data['jamTanding']
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
            return $this->jadwal
                ->join('info_teams as home', 'home.id', '=', 'jadwal_tandings.teamHome')
                ->join('info_teams as away', 'away.id', '=', 'jadwal_tandings.teamAway')
                ->select(
                    'jadwal_tandings.id as idJadwal',
                    'home.nama as timtuan',
                    'away.nama as timtamu',
                    'jadwal_tandings.tglTanding as tanggal',
                    'jadwal_tandings.jamTanding as jam'
                )
                ->where(['jadwal_tandings.deleted_at' => null])
                ->orderBy('jadwal_tandings.tglTanding', 'desc')
                ->get();
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
