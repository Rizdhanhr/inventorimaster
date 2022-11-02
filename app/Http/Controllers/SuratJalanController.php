<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SuratJalanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratjalan = DB::table('surat_jalan')
        ->join('pelanggan','pelanggan.id','surat_jalan.id_pelanggan')
        ->get(array('surat_jalan.*','pelanggan.nama as nama_pelanggan'));
        return view('suratjalan.index',compact('suratjalan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $this->validate($request,[
        //     'tgl' => 'required',
        //     'pelanggan' => 'required',
        //     'driver' => 'required',
        //     'no_hp' => 'required',
        //     'ket' => 'required'
        // ]);
            try{
                DB::transaction(function () use($request) {
                    $surat = DB::table('surat_jalan')->insert([
                        'no_surat' => $request->no_surat,
                        'no_trx' => $request->no_trx,
                        'no_hp' => $request->no_hp,
                        'tgl' => $request->tgl,
                        'id_pelanggan' => $request->pelanggan,
                        'driver' => $request->no_hp,
                        'nopol' => $request->nopol,
                        'ket' => $request->ket
                    ]);
                });
                return redirect('/suratjalan')->with('success','Data Berhasil Disimpan');
            }catch(Exception $e){
                return redirect('/barangkeluar')->with('error','Data Gagal Disimpan');
            }
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($no_trx)
    {
        $namabarang = DB::table('barang_keluar')
        ->join('barang','barang.id','barang_keluar.id_barang')
        ->select('barang_keluar.*','barang.nama as nama_barang')
        ->where('no_trx',$no_trx)
        ->get();

        $pelanggan = DB::table('pelanggan')->get();
        // $surat = DB::table('surat_jalan')->get();
        $q = DB::table('surat_jalan')->select(DB::raw('MAX(RIGHT(no_surat,4)) as kode'));
        $kd="";
        if($q->count()>0){
            foreach($q->get() as $k){
                $tmp = ((int)$k->kode)+1;
                $kd = sprintf("%04s",$tmp);
            }
        }
        else{
            $kd = date('Y-m-d').'-'."0001";
        }
        return view('suratjalan.create',compact('kd','pelanggan','namabarang'));
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
    public function update(Request $request, $no_trx)
    {
        
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

    public function getpelanggan($id){
        $getpelanggan = DB::table('pelanggan')->where('id',$id)->get();
        return $getpelanggan[0];
    }

    public function cetak($no_trx){
        $cetaksurat =  DB::table('surat_jalan')
        ->join('barang_keluar','barang_keluar.no_trx','surat_jalan.no_trx')
        ->join('pelanggan','pelanggan.id','=','surat_jalan.id_pelanggan')

        ->select('surat_jalan.*','barang_keluar.id_barang as barang_id','pelanggan.nama as nama_pelanggan','barang_keluar.jumlah as jml')
        ->where('surat_jalan.no_trx',$no_trx)
    
        ->get();
        return view('suratjalan.cetak',compact('cetaksurat'));

        // DD($cetaksurat);
    }

    
}
