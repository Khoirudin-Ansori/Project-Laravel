<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Mobil extends Model
{

	use SoftDeletes;
    protected $table = 'mobil';
    protected $fillable = ['nama_mobil','merk_mobil','warna_mobil','harga_mobil','tahun_mobil'];
    protected $dates =['deleted_at'];
}
