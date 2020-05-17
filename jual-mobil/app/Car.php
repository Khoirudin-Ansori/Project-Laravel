<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Car extends Model
{
    use SoftDeletes;
    protected $table = 'tb_mobil';
    protected $fillable = ['nama_mobil','warna_mobil','harga_mobil','tahun_mobil'];
    protected $dates =['deleted_at'];

    public function merk()
    {
    	return $this->belongsTo(Merk::class);
    }
}
