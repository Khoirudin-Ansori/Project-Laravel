<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\DataMobilExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Session;
use App\Mobil;
use PDF;
use App\Imports\MobilImport;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_mobil = \App\Mobil::all();
        return view('home',['data_mobil' => $data_mobil]);
    }

    public function create(Request $request)
    {
        \App\Mobil::create($request->all());
        return redirect('/home')->with('sukses','Data Berhasil Di Input');
    }

    public function edit($id)
    {
        $mobil = \App\Mobil::find($id);
        return view('mobil/edit',['mobil' => $mobil]);
    }

    public function detail($id)
    {
        $mobil = \App\Mobil::find($id);
        return view('mobil/detail',['mobil' => $mobil]);
    }

    public function update(Request $request,$id)
    {
        $mobil = \App\Mobil::find($id);
        $mobil->update($request->all());
        return redirect('/home')->with('sukses','Data Berhasil Di Update');
    }

    public function delete($id)
    {
        $mobil = \App\Mobil::find($id);
        $mobil->delete();
        return redirect('/home')->with('sukses','Data Berhasil Di Hapus');
    }

    public function trash()
    {
        $mobil = \App\Mobil::onlyTrashed()->get();
        return view('/trash/trashmobil',['mobil'=>$mobil]);
    }

    public function restore($id)
    {
        $mobil = \App\Mobil::onlyTrashed()->where('id',$id);
        $mobil->restore();
        return view('/trash/trashmobil',['mobil'=>$mobil]);   
    }
    public function restoreall()
    {
            
        $mobil = \App\Mobil::onlyTrashed();
        $mobil->restore();
 
        return redirect('/trash/trashmobil')->with('sukses','Semua Data Berhasil Di Restore');
    }
    public function downloadasexcel()
    {
        return Excel::download(new DataMobilExport, 'data_mobil.xlsx');
    }
    public function downlaodaspdf()
    {
        $mobilpdf = Mobil::all();

        $pdf = PDF::loadview('mobil/data-mobil-pdf',['mobilpdf'=>$mobilpdf]);
        return $pdf->download('data-mobil-pdf');
    }
    public function import_excel(Request $request) 
    {
        // validasi
        $this->validate($request, [
            'file' => 'required|mimes:csv,xls,xlsx'
        ]);
 
        // menangkap file excel
        $file = $request->file('file');
 
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
 
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_data_mobil',$nama_file);
 
        // import data
        Excel::import(new MobilImport, public_path('/file_data_mobil/'.$nama_file));
 
        // notifikasi dengan session
        Session::flash('sukses','Data Siswa Berhasil Diimport!');
 
        // alihkan halaman kembali
        return redirect('/home');
    }

    public function total()
    {
        $mobil = Mobil::count();
        return view('home', compact('mobil'));
    }


}
