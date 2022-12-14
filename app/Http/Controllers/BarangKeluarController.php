<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BarangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangkeluar = DB::select('select barang_keluar.no_trx, barang_keluar.surat, barang_keluar.tgl, count(no_trx) as jumlah_barang
        from barang_keluar join barang on barang.id = barang_keluar.id_barang 
        where status = 1 group by barang_keluar.no_trx, barang_keluar.tgl, barang_keluar.surat ');
        // $barangkeluar = DB::query('barang_keluar')
        // ->join('barang', 'barang.id','barang_keluar.id_barang')
        // // ->select(DB::raw('count(*) as jumlah_barang, no_trx'))
        // ->where('status',1)
        // ->groupBy('barang_keluar.no_trx')
        // ->get(array(
            
        //     'barang_keluar.no_trx'
           
        // ));
        // DD($barangkeluar[]);
        return view('barangkeluar.index', compact('barangkeluar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $barang = DB::table('barang')->get();
        $barangkeluar = DB::table('barang_keluar')->where('status',0)
        ->join('barang', 'barang.id','barang_keluar.id_barang')
        ->get(array(
            'barang_keluar.*',
            'barang.nama as nama_barang',
        ));
        return view('barangkeluar.create',compact('barang','barangkeluar'));
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
               $cekbarang = DB::table('barang_keluar')
                            ->where('id_barang',$request->barang)
                            ->where('status',0)
                            ->count();
                           
                if($cekbarang > 0){
                    $cekqty = DB::table('barang_keluar')
                    ->where('id_barang',$request->barang)
                    ->where('status',0)
                    ->get();
                    // DD($cekqty[0]->jumlah);
                    DB::table('barang_keluar')
                    ->where('id_barang',$request->barang)
                    ->where('status',0)
                    ->update(
                        [
                            'id_barang' => $request->barang,
                            'jumlah' => $request->jumlah + $cekqty[0]->jumlah
                        ]
                    );
                }else{
                    DB::table('barang_keluar')->insert(
                        [
                            'id_barang' => $request->barang,
                            'jumlah' => $request->jumlah
                        ]
                    );
                }
                
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
        $detail = DB::table('barang_keluar')
        // ->join('barang', function ($join) {
        //  $join->on('barang.id', '=', 'barang_keluar.id_barang');
        // })
        ->join('barang','barang.id','barang_keluar.id_barang')
        ->where('no_trx',$no_trx)
        ->get(array('barang_keluar.*','barang.nama as nama_barang'));

        return view('barangkeluar.show',compact('detail'));
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

    public function getbarangout($id){
        $barang = DB::table('barang')->where('id',$id)->get();
        return $barang[0];

    }

    public function barangkeluar(Request $request){
      
        try {
            DB::transaction(function () use ($request) {
                // upload image
                // print_r($request->all()); die();
                $kode = 'TRX';
                $barang = DB::select('SELECT SUM(total) as jumlah FROM ( SELECT COUNT(DISTINCT(no_trx)) as total FROM barang_keluar where status = 1 GROUP BY no_trx ) hasil');
               
                // DD((int)$barang[0]->jumlah+1);
                if($barang[0]->jumlah < 10){
                    $sku = $kode.'00'.((int)$barang[0]->jumlah+1);
                }else if($barang[0]->jumlah > 10 && $barang[0]->jumlah < 100){
                    $sku = $kode.'0'.((int)$barang[0]->jumlah+1);
                }else{
                    $sku = $kode.((int)$barang[0]->jumlah+1);
                }
                DB::table('barang_keluar')->where('status',0)->update(
                    [
                        'no_trx' => $sku,
                        'tgl' => $request->tanggal,
                        'keterangan' => $request->keterangan,
                        'status' => 1
                    ]
                );
                
                
                $updatebarang = DB::table('barang_keluar')
                ->join('barang','barang.id','barang_keluar.id_barang')
                ->where('no_trx',$sku)
                ->get(array(
                    'barang_keluar.*',
                    'barang.stok as barang_stok',
                ));
                
                foreach($updatebarang as $row){
                    DB::table('barang')->where('id',$row->id_barang)->update(
                        [
                            'stok' => $row->barang_stok - $row->jumlah
                            
                        ]
                    );
                }
            });


            return redirect('/barangkeluar')->with('status', 'trueinsert');
        } catch (Exception $e) {
            return redirect('/barangkeluar')->with('status_fail', 'falseinsert');
        }

    }
}
