<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    protected $table = 'detailorder';

    protected $fillable = [
        "nomor_pesanan",
    	"id_mobil",
    	"jumlah_beli",
    	"subtotal"
    ];
}
