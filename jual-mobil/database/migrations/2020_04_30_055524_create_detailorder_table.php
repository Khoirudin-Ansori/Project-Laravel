<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailorderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailorder', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pesanan');
            $table->unsignedBigInteger('id_mobil');
            $table->bigInteger('jumlah_beli');
            $table->bigInteger('subtotal');
            $table->string('nomor_pesanan');
            $table->string('pembeli');
            $table->bigInteger('total_harga');
            $table->bigInteger('bayar');
            $table->bigInteger('kembali');
            $table->foreign('id_mobil')->references('id')->on('mobil');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detailorder');
    }
}
