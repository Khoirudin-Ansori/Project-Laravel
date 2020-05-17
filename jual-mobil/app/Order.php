<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';

    protected $fillable = [
        "nomor_pesanan",
    	"pembeli",
    	"total_harga",
    	"bayar",
    	"kembali"
    ];

}
