<?php

namespace App\Http\Controllers;

use App\Order;
use App\Mobil;
use App\DetailOrder;
use App\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['maxValue'] = Transaction::max('id');
        $data['maxValue']++;
        $data['trcode'] = "TRXC". Carbon::now()->month . sprintf("%03s", $data['maxValue']);
        //
        $data['list_mobil'] = Mobil::all();
        //
        $data['detail'] = Mobil::join('table_transaction','table_transaction.id_mobil','mobil.id')
            ->select(
                'table_transaction.id', 
                'table_transaction.nomor_pesanan', 
                'mobil.nama_mobil', 
                'mobil.harga_mobil', 
                'table_transaction.jumlah_beli', 
                'table_transaction.subtotal',
                'table_transaction.pembeli',
                'table_transaction.total_harga',
                'table_transaction.bayar',
                'table_transaction.kembali',
            )
            ->where("nomor_pesanan",$data['trcode'])
            ->orderBy('table_transaction.id', 'ASC')
            ->get();
        //
        return view('order.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Transaction::create([
            'nomor_pesanan' => $request->nomor_pesanan,
            'id_mobil' => $request->id_mobil,
            'jumlah_beli' => $request->jumlah,
            'subtotal' => $request->harga,
            'pembeli' => $request->pembeli,
            'total_harga' => $request->harga,
            'bayar' => $request->bayar,
            'kembali' => $request->kembali,
        ]);
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data['detail'] = Mobil::join('table_transaction','table_transaction.id_mobil','mobil.id')
            ->select(
                'table_transaction.id', 
                'table_transaction.nomor_pesanan', 
                'mobil.nama_mobil', 
                'mobil.harga_mobil', 
                'table_transaction.jumlah_beli', 
                'table_transaction.subtotal',
                'table_transaction.pembeli',
                'table_transaction.total_harga',
                'table_transaction.bayar',
                'table_transaction.kembali',
            )
            ->get();
        //
        return view('order.report', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function simpan_detail(Request $request)
    {
        $nomor_pesanan = $request->get('nomor_pesanan');
        $id_mobil = $request->get('id_mobil');
        $jumlah_beli = $request->get('jumlah_beli');
        $subtotal = $request->get('subtotal');

        $insert = DetailOrder::create([
            'nomor_pesanan' => $request->nomor_pesanan,
            'id_mobil' => $request->id_mobil,
            'jumlah_beli' => $request->jumlah_beli,
            'subtotal' => $request->subtotal,
        ]);

        if ($insert) {
            return response()->json(['task'  => $insert]);            
        } else {
            return response()->json(['error' => true]);
        }       

    }
}
