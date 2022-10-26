<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DataStokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = DB::table('barang')
        ->count();
        $stok = DB::table('barang')
        ->sum('stok');
        $barangkeluar = DB::table('barang_keluar')
        ->sum('jumlah');
        $barangmasuk = DB::table('barang_masuk')
        ->sum('jumlah');
        $datastok = DB::table('barang')
        ->join('brand','brand.id','barang.id_brand')
        ->get(array(
            'barang.*',
            'brand.nama as nama_brand'
        ));
        return view('stok_barang.index',compact('barang','stok','barangkeluar','barangmasuk','datastok'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function cari(Request $request){
        $barang = DB::table('barang')
        ->count();
        $stok = DB::table('barang')
        ->sum('stok');
        $barangkeluar = DB::table('barang_keluar')
        ->sum('jumlah');
        $barangmasuk = DB::table('barang_masuk')
        ->sum('jumlah');
        $cari = $request->cari;

        $datastok = DB::table('barang')
        ->join('brand', 'brand.id', '=', 'barang.id_brand')
        ->select('barang.*', 'brand.nama as nama_brand')
        ->where('barang.nama','like',"%".$cari."%")
        ->orWhere('barang.sku','like',"%".$cari."%")
        ->orWhere('brand.nama','like',"%".$cari."%")
        ->get();

        return view('stok_barang.index',compact('barang','stok','barangkeluar','barangmasuk','datastok'));
    }
}
