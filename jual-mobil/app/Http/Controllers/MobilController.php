<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MobilController extends Controller
{
    public function index()
    {
        $data_mobil = \App\Car::all();
        $merk_mobil = \App\Merk::all();
        return view('mobil/home',['data_mobil' => $data_mobil,'merk_mobil'=>$merk_mobil]);
    }

    public function create(Request $request,$idmobil)
    {
        $mobil = \App\Car::find($idmobil);
        $mobil->merk()->attach($request->merk,['merk'=>$request->merk_mobil]);
        return redirect('/home')->with('sukses','Data Berhasil Di Update');
    }

    public function edit($id)
    {
        $mobil = \App\Car::find($id);
        return view('mobil/update',['mobil' => $mobil]);
    }

    public function detail($id)
    {
        $mobil = \App\Car::find($id);
        return view('mobilnew/detail',['mobil' => $mobil]);
    }

    public function update(Request $request,$id)
    {
        $mobil = \App\Car::find($id);
        $mobil->update($request->all());
        return redirect('/home')->with('sukses','Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $mobil = \App\Car::find($id);
        $mobil->delete();
        return redirect('/home')->with('sukses','Data Berhasil Di Hapus');
    }


}
