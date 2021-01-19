<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Pesan extends Controller
{
    public function Berhasil()
    {
        return 200;
    }

    public function TidakDitemukan()
    {
        return 404;
    }

    public function TidakDiterima()
    {
        return 406;
    }

    public function Gagal()
    {
        return 500;
    }
}
