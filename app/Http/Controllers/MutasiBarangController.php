<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MutasiBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $first = DB::table('barang_masuk')
        ->join('barang','barang.id','barang_masuk.id_barang')
        ->select('barang_masuk.id_barang','barang_masuk.tgl','barang_masuk.jumlah','barang_masuk.status','barang.nama as nama_barang','barang.stok as stokbarang');
        $second = DB::table('barang_keluar')
        ->join('barang','barang.id','barang_keluar.id_barang')
        ->select('barang_keluar.id_barang','barang_keluar.tgl','barang_keluar.jumlah','barang_keluar.status','barang.nama as nama_barang','barang.stok as stokbarang')
        ->union($first)
        ->get();
      
           
            return view('mutasibarang.index',compact('second'));
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
    public function getmutasi(){
       
    }
}
