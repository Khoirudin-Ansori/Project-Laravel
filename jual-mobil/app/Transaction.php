<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'table_transaction';

    protected $fillable = [
        "nomor_pesanan",
        "id_mobil",
    	"jumlah_beli",
    	"subtotal",
    	"pembeli",
    	"total_harga",
    	"bayar",
    	"kembali"
    ];
}
