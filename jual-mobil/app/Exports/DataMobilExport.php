<?php

namespace App\Exports;

use App\Mobil;
use Maatwebsite\Excel\Concerns\FromCollection;

class DataMobilExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Mobil::all();
    }
}
