<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Carbon\Carbon;
use App\Http\Controllers\Model;
use App\Model\Link;
use App\Model\Code;

class QrExport implements FromCollection, WithMapping
{
    use Exportable;
    
    // private $model;
    public $waktu;
    // public $code;

    function __construct(){
    //     $this->model = new Model;
        $this->waktu = Carbon::now();
    //     $this->code = $this->model->Code; 
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $waktu = $this->waktu->parse()->format('Y-m-d');
        return Code::join('links', 'links.id', '=', 'codes.idLink')
        ->select(
            'links.nama',
            'links.link',
            'codes.code'
        )
        ->where('codes.created_at', 'like', $waktu . '%')
        ->orderBy('codes.created_at', 'desc')->get();
        // return Link::get();
    }
    public function map($code): array
    {
        return [
            $code->link,
            $code->code,
        ];
    }
}
