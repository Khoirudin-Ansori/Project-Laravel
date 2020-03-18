<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;
use PDF;

class DownloadController extends Controller
{
    public function index()
    {
        $data_mobil = \App\Mobil::all();
        $pdf = PDF::loadview('mobil/data-mobil-pdf',['data_mobil'=>$data_mobil]);
        return $pdf->stream('data-mobil-pdf');
    }
}
