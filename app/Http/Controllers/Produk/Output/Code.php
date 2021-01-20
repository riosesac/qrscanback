<?php

namespace App\Http\Controllers\Produk\Output;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Pesan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\QrExport;

class Code extends Controller
{
    public $pesan;
    public $qr;
    public $waktu;

    function __construct()
    {
        $this->pesan = new Pesan;
        $this->waktu = Carbon::now();
    }

    //create
    public function Cipta($data)
    {
        if (empty($data)) {
            return response()->json([
                'status' => 'gagal',
                'data' => 'data gagal bertambah!!!',
                'code' => $this->pesan->Gagal()
            ], $this->pesan->Gagal());
        }
        return response()->json([
            'status' => 'sukses',
            'data' => 'data berhasil bertambah!!!',
            'code' => $this->pesan->Berhasil()
        ], $this->pesan->Berhasil());
    }

    //Read or View
    public function Presentasi($data)
    {
        if (empty($data)) {
            return response()->json([
                'status' => 'gagal',
                'data' => 'data gagal tampil!!!',
                'code' => $this->pesan->Gagal()
            ], $this->pesan->Gagal());
        }
        return response()->json([
            'status' => 'sukses',
            'data' => collect($data)->map(function ($data) {
                return [
                    'nama' => $data->nama,
                    'code' => $data->code,
                    'link' => $data->link .= $data->code,
                    'qrcode' => \QrCode::generate($data->link .= $data->code),
                ];
            }),
            'code' => $this->pesan->Berhasil()
        ], $this->pesan->Berhasil());
    }

    //update
    public function Restorasi($data)
    {
        if (empty($data)) {
            return response()->json([
                'status' => 'gagal',
                'data' => 'data gagal download!!!',
                'code' => $this->pesan->Gagal()
            ], $this->pesan->Gagal());
        }
        $dataku = collect($data)->map(function ($val) {
            return $val;
        });
        $waktu = $this->waktu->parse()->format('YmdHis');
        // $pdf = PDF::loadView('pdf.qrcode', ['data' => ($dataku)])->setPaper('A7', 'potrait');
        // return $pdf->stream();
        return Excel::download(new QrExport, $waktu.'-code.xlsx');
    }

    //update
    public function RestorasiJual($data)
    {
        //
    }

    //delete
    public function Runtuh()
    {
        # code...
    }
}
