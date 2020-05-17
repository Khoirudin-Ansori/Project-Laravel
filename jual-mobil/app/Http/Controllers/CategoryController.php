<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Merk;
use App\Car;


class CategoryController extends Controller
{
     public function index()
    {
        $data_mobil = \App\Merk::all();
        return view('merk/home',['data_mobil' => $data_mobil]);
    }

    public function create(Request $request)
    {
        \App\Merk::create($request->all());
        return redirect('/home')->with('sukses','Data Berhasil Di Input');
    }

    public function edit($id)
    {
        $merk = \App\Merk::find($id);
        return view('mobil/update',['merk' => $merk]);
    }

    public function detail($id)
    {
        $merk = \App\Merk::find($id);
        return view('mobilnew/detail',['merk' => $merk]);
    }

    public function update(Request $request,$id)
    {
        $merk = \App\Merk::find($id);
        $merk->update($request->all());
        return redirect('/home')->with('sukses','Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $merk = \App\Merk::find($id);
        $merk->delete();
        return redirect('/home')->with('sukses','Data Berhasil Di Hapus');
    }
}
