<?php

namespace App\Http\Controllers\Produk\Akses;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pesan;
use App\Http\Controllers\Produk\Input\Link as InputLink;
use App\Http\Controllers\Produk\Output\Link as OutputLink;
use App\Http\Controllers\Produk\Process\Link as ProcessLink;
use App\Http\Controllers\Produk\Validation\Link as ValidationLink;
use Illuminate\Http\Request;

class Link extends Controller
{
    public $pesan;
    public $input;
    public $validasi;
    public $proses;
    public $output;

    function __construct()
    {
        $this->pesan = new Pesan;
        $this->input = new InputLink;
        $this->validasi = new ValidationLink;
        $this->proses = new ProcessLink;
        $this->output = new OutputLink;
    }

    //create
    public function Cipta(Request $request)
    {
        try {
            $link = $request->all();
            $val = $this->validasi->Cipta($link);
            if ($val->fails()) {
                return response()->json([
                    'error' => $val->errors()
                ],$this->pesan->TidakDitemukan());
            }
            $input = $this->input->Cipta($link);
            $data = $this->proses->Cipta($input);
            return $this->output->Cipta($data);
        } catch (\Throwable $th) {
            return response([
                'status' => false, 
                'errors' => $th->getMessage(),
                'message' => 'terjadi kesalahan!!!', 
                'code' => $this->pesan->TidakDitemukan()
            ],$this->pesan->TidakDitemukan());
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
                'message' => 'terjadi kesalahan!!!', 
                'code' => $this->pesan->TidakDitemukan()
            ],$this->pesan->TidakDitemukan());
        }
    }

    //update
    public function RestorasiBeli(Request $request,$id)
    {
        try {
            //
        } catch (\Throwable $th) {
            return response([
                'status' => false, 
                'errors' => $th->getMessage(),
                'message' => 'terjadi kesalahan!!!', 
                'code' => $this->pesan->TidakDitemukan()
            ],$this->pesan->TidakDitemukan());
        }
    }

    //update
    public function RestorasiJual(Request $request,$id)
    {
        try {
            //
        } catch (\Throwable $th) {
            return response([
                'status' => false, 
                'errors' => $th->getMessage(),
                'message' => 'terjadi kesalahan!!!', 
                'code' => $this->pesan->TidakDitemukan()
            ],$this->pesan->TidakDitemukan());
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
            ],$this->pesan->TidakDitemukan());
        }
    }
}
