<?php

namespace App\Imports;

use App\Mobil;
use Maatwebsite\Excel\Concerns\ToModel;

class MobilImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Mobil([
            'nama_mobil' => $row[1],
            'merk_mobil' => $row[2], 
            'warna_mobil' => $row[3],
            'harga_mobil' => $row[4],
            'tahun_mobil' => $row[5],


        ]);
    }
}
