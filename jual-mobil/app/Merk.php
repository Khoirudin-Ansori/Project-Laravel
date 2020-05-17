<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merk extends Model
{
    protected $table = 'tb_merk';

    protected $fillable = ['merk_mobil'];

    public function car()
    {
    	return $this->hasMany(Car::class);
    }    
}
