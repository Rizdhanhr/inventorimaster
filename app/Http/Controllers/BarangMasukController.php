<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangmasuk = DB::table('barang_masuk')
       
        ->join('supplier','supplier.id','barang_masuk.id_supplier')
        ->join('barang', 'barang.id','barang_masuk.id_barang')
        ->select(DB::raw('count(*) as jumlah_barang, no_trx'))
       
        ->where('status',1)
        ->groupBy('barang_masuk.no_trx')
        ->get(array(
            'barang_masuk.*',
            'supplier.nama as nama_supplier',
            'barang.nama as nama_barang'
        ));
        // DD($barangmasuk);
    
       
        return view('barangmasuk.index',compact('barangmasuk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = DB::table('barang')->get();
        $supplier = DB::table('supplier')->get();
        $barangmasuk = DB::table('barang_masuk')->where('status',0)
        ->join('barang', 'barang.id','barang_masuk.id_barang')
        ->get(array(
            'barang_masuk.*',
            'barang.nama as nama_barang',
        ));
        return view('barangmasuk.create',compact('barang','supplier','barangmasuk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::transaction(function () use ($request) {
                // upload image
                // print_r($request->all()); die();

                DB::table('barang_masuk')->insert(
                    [
                        'id_barang' => $request->barang,
                        'jumlah' => $request->jumlah
                    ]
                );
            });

            return back()->with('status', 'trueinsert');
        } catch (Exception $e) {
            return back()->with('status_fail', 'falseinsert');
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
        $detail = DB::table('barang_masuk')
        // ->join('barang', function ($join) {
        // $join->on('barang.id', '=', 'barang_masuk.id_barang');
        // })
        ->join('barang','barang.id','barang_masuk.id_barang')
        ->where('no_trx',$no_trx)
        ->get(array(
            'barang_masuk.*',
            'barang.nama as nama_barang',
        ));
        
        return view('barangmasuk.show',compact('detail'));
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

    public function getbarang($id){
        $barang = DB::table('barang')->where('id',$id)->get();
        return $barang[0];
      

    }

    public function barangmasuk(Request $request){
      
        try {
            DB::transaction(function () use ($request) {
                // upload image
                // print_r($request->all()); die();
                $kode = 'TRX';
                $barang = DB::select('SELECT SUM(total) as jumlah FROM ( SELECT COUNT(DISTINCT(no_trx)) as total FROM barang_masuk where status = 1 GROUP BY no_trx ) hasil');
               
                // DD((int)$barang[0]->jumlah+1);
                if($barang[0]->jumlah < 10){
                    $sku = $kode.'00'.((int)$barang[0]->jumlah+1);
                }else if($barang[0]->jumlah > 10 && $barang[0]->jumlah < 100){
                    $sku = $kode.'0'.((int)$barang[0]->jumlah+1);
                }else{
                    $sku = $kode.((int)$barang[0]->jumlah+1);
                }
                DB::table('barang_masuk')->where('status',0)->update(
                    [
                        'no_trx' => $sku,
                        'id_supplier' => $request->supplier,
                        'tgl' => $request->tanggal,
                        'status' => 1
                    ]
                );
                
                
                $updatebarang = DB::table('barang_masuk')
                ->join('barang','barang.id','barang_masuk.id_barang')
                ->where('no_trx',$sku)
                ->get(array(
                    'barang_masuk.*',
                    'barang.stok as barang_stok',
                ));
                
                foreach($updatebarang as $row){
                    DB::table('barang')->where('id',$row->id_barang)->update(
                        [
                            'stok' => $row->barang_stok + $row->jumlah
                            
                        ]
                    );
                }
            });


            return redirect('/barangmasuk')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/barangmasuk')->with('status_fail', 'falseinsert');
        }

    }
}
