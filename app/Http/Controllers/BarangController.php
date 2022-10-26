<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = DB::table('barang')
        ->join('kategori','kategori.id','barang.id_kategori')
        ->join('brand','brand.id','barang.id_brand')
        ->join('satuan','satuan.id','barang.id_satuan')
        ->get(array(
            'barang.*',
            'kategori.nama as nama_kategori',
            'brand.nama as nama_brand',
            'satuan.nama as nama_satuan'
        ));
        return view('barang.index',compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $kategori = DB::table('kategori')->get();
        $brand = DB::table('brand')->get();
        $satuan = DB::table('satuan')->get();
        return view('barang.create',compact('kategori','brand','satuan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori = DB::table('kategori')->where('id',$request->kategori)->first();
        $kode = strtoupper(substr($kategori->nama,0,2));
        $barang = DB::table('barang')->where('id_kategori',$request->kategori)->count();
        if($barang < 10){
            $sku = $kode.'00'.($barang+1);
        }else if($barang > 10 && $barang < 100){
            $sku = $kode.'0'.($barang+1);
        }else{
            $sku = $kode.($barang+1);
        }
        
        $this->validate($request, [
        // 'sku' => 'required',
        // 'nama' => 'required',
        // // 'id_kategori' => 'required',
        // // // 'id_brand' => 'required',
        // // // 'id_satuan' => 'required',
        // 'spesifikasi' => 'required',
        'gambar'     => 'image|mimes:png,jpg,jpeg',
        ]
    //     // ,[
    //     // // 'id_kategori.required' => 'The kategori field is required.',
    //     // // 'id_brand.required' => 'The brand field is required.',
    //     // // 'id_satuan.required' => 'The satuan field is required.',
    //     // 'gambar'=> 'Gambar must png,jpg,jpeg',
    //     // ]
    );

      if($file = $request->file('gambar')){
        $nama_file = time()."_".$file->getClientOriginalName();
        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload,$nama_file);
        $barang = DB::table('barang')->insert([
            'sku' => $sku,
            'nama' => $request->nama,
            'id_kategori' => $request->kategori,
            'id_brand' => $request->brand,
            'id_satuan' => $request->satuan,
            'stok' => $request->stok,
            'stok_minimal' => $request->stok_minimal,
            'spesifikasi' => $request->spesifikasi,
            'gambar' => $tujuan_upload.'/'.$nama_file,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by
        ]);
      }else{
        $barang = DB::table('barang')->insert([
            'sku' => $sku,
            'nama' => $request->nama,
            'id_kategori' => $request->kategori,
            'id_brand' => $request->brand,
            'id_satuan' => $request->satuan,
            'stok' => $request->stok,
            'stok_minimal' => $request->stok_minimal,
            'spesifikasi' => $request->spesifikasi,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by
        ]);
      }
          
      
       
       

        return redirect('/barang')->with('success','Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = DB::table('barang')
        ->join('kategori','kategori.id','barang.id_kategori')
        ->join('brand','brand.id','barang.id_brand')
        ->join('satuan','satuan.id','barang.id_satuan')
        ->select('barang.*','satuan.nama as nama_satuan','brand.nama as nama_brand','kategori.nama as nama_kategori')
        ->where('barang.id',$id)
        ->get();
        
        return view('barang.detail',compact('barang'));
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = DB::table('barang')->where('id',$id)->get();
        $kategori = DB::table('kategori')->get();
        $brand = DB::table('brand')->get();
        $satuan = DB::table('satuan')->get();
        return view('barang.edit',compact('barang','kategori','brand','satuan'));
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
        $barang = DB::table('barang')->where('id',$id)->update([
            'nama' => $request->nama,
            'id_kategori' => $request->kategori,
            'id_brand' => $request->brand,
            'id_satuan' => $request->satuan,
            'spesifikasi' => $request->spesifikasi,
            'updated_by' => $request->updated_by
        ]);
        return redirect('/barang')->with('success','Data Berhasil DiUpdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('barang')->where('id',$id)->delete();
        return redirect('/barang')->with('success','Data Berhasil Dihapus');
    }
}
