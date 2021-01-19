<?php

namespace App\Http\Controllers\Bola\Proses;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Model;
use App\Http\Controllers\Pesan;
use Illuminate\Http\Request;

class Hasil extends Controller
{
    public $pesan;
    private $model;
    public $pemain;
    public $team;
    public $jadwal;
    public $hasil;

    function __construct()
    {
        $this->pesan = new Pesan;
        $this->model = new Model;
        $this->pemain = $this->model->InfoPemain;
        $this->team = $this->model->InfoTeam;
        $this->jadwal = $this->model->JadwalTanding;
        $this->hasil = $this->model->HasilTanding;
    }

    //create
    public function Cipta($data)
    {
        try {
            // dd($data);
            $pemain = $this->pemain
                ->join('info_teams as team', 'team.id', '=', 'info_pemains.idTeam')
                ->select('info_pemains.id as pemainId', 'info_pemains.nama as pemain', 'team.nama as team')
                ->where(['info_pemains.nama' => $data['pemain']])
                ->first();
            if (!$pemain->pemainId) {
                # code...
                return false;
            }
            $tanding = $this->jadwal->where(['id' => $data['tanding']])->first();
            if (!$tanding->id) {
                # code...
                return false;
            }
            return $this->hasil->create([
                'tanding' => $tanding->id,
                'pemain' => $pemain->pemainId,
                'goal' => $data['goal'],
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
            return $this->hasil
                ->join('jadwal_tandings as jadwal', 'jadwal.id', '=', 'hasil_tandings.tanding')
                ->join('info_teams as home', 'home.id', '=', 'jadwal.teamHome')
                ->join('info_teams as away', 'away.id', '=', 'jadwal.teamAway')
                ->select(
                    'jadwal.tglTanding as tanggalPertandingan',
                    'jadwal.jamTanding as jamPertandingan',
                    'home.nama as timtuan',
                    'away.nama as timtamu'
                )
                ->distinct('tanggalPertandingan')
                ->orderBy('tanggalPertandingan', 'desc')
                ->get();
        } catch (\Throwable $th) {
            return response([
                'status' => false,
                'errors' => $th->getMessage(),
                'code' => $this->pesan->TidakDitemukan()
            ], $this->pesan->TidakDitemukan());
        }
    }

    public function PresentasiSecond($data)
    {
        try {
            return $this->hasil
                ->join('jadwal_tandings as jadwal', 'jadwal.id', '=', 'hasil_tandings.tanding')
                // ->join('info_teams as home', 'home.id', '=', 'jadwal.teamHome')
                // ->join('info_teams as away', 'away.id', '=', 'jadwal.teamAway')
                ->join('info_pemains as pemain', 'pemain.id', '=', 'hasil_tandings.pemain')
                ->join('info_teams as team', 'team.id', '=', 'pemain.idTeam')
                ->select(
                    // 'jadwal.tglTanding as tanggalPertandingan',
                    // 'jadwal.jamTanding as jamPertandingan',
                    // 'home.nama as timtuan',
                    // 'away.nama as timtamu',
                    'hasil_tandings.goal as goals',
                    'pemain.nama as namaPemain',
                    'team.nama as teamPencetak'
                )
                ->where('jadwal.jamTanding', 'like', $data)
                // ->distinct('tanggalPertandingan')
                // ->orderBy('tanggalPertandingan', 'desc')
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
