<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable){
        return $dataTable->render('kategori.index');
    }
    
    public function create(){
        return view ('kategori.create');
    }

    public function store(Request $request){
        KategoriModel::create([
            'kategori_kode' => $request->kodeKategori,
            'kategori_nama' => $request->namaKategori,
        ]);
        return redirect('/kategori');
    }

    public function ubah($id){
        $kategori = KategoriModel::find($id);
        return view('kategori.edit',['data'=>$kategori]);
    }

    public function ubah_simpan($id, Request $request){
        $kategori = KategoriModel::find($id);
        
        $kategori->kategori_kode = $request->kodeKategori;
        $kategori->kategori_nama = $request->namaKategori;

        $kategori->save();
        return redirect('/kategori');
    }

    // public function index(){
    //     $data = [
    //         'kategori_kode' => 'SNK',
    //         'kategori_nama' => 'Snack/Makanan Ringan',
    //         'created_at' => now()
    //     ];
    //     DB::table('m_kategori')->insert($data);
    //     return 'Insert data berhasil';
    // }
}
