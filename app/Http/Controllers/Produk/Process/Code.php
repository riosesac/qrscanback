<?php

namespace App\Http\Controllers\Produk\Process;

use App\Http\Controllers\CodeCreate;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Model;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Code extends Controller
{
    private $model;
    public $code;
    public $link;
    public $codegenerate;
    public $waktu;

    function __construct()
    {
        $this->model = new Model;
        $this->code = $this->model->Code;
        $this->link = $this->model->Link;
        $this->codegenerate = new CodeCreate;
        $this->waktu = Carbon::now();
    }

    //create
    public function Cipta($data, $nama)
    {
        if ((int)$data['jmldata'] > 0) {
            for ($i = 1; $i <= (int)$data['jmldata']; $i++) {
                $code = $this->codegenerate->generate(9);
                $link = $this->link->where(['nama' => $nama])->first();
                $this->code->create([
                    'idLink' => $link->id,
                    'code' => $code
                ]);
            }
            $datas = 'sukses';
        } else {
            $datas = null;
        }
        return $datas;
    }

    //Read or View
    public function Presentasi($data)
    {
        $waktu = $this->waktu->parse()->format('Y-m-d');
        return $this->code
            ->join('links', 'links.id', '=', 'codes.idLink')
            ->select(
                'links.nama',
                'links.link',
                'codes.code'
            )
            ->where(['links.nama' => $data])
            ->where('codes.created_at', 'like', $waktu . '%')
            ->orderBy('codes.created_at', 'desc')->get();
    }

    //update
    public function Restorasi($data)
    {
        $waktu = $this->waktu->parse()->format('Y-m-d');
        return $this->code
        ->join('links', 'links.id', '=', 'codes.idLink')
        ->select(
            'links.nama',
            'links.link',
            'codes.code'
        )
        ->where(['links.nama' => $data])
        ->where('codes.created_at', 'like', $waktu . '%')
        ->orderBy('codes.created_at', 'desc')->get();
    }

    //update
    public function RestorasiJual($data, $id)
    {
        //
    }

    //delete
    public function Runtuh($id)
    {
        //
    }

    //check
    public function Periksa($data)
    {
        //
    }
}
