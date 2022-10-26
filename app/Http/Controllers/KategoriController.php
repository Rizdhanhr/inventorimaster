<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = DB::table('kategori')->get();
        return view('kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'created_by' => 'required',
            'updated_by' => 'required',
        ]);
        try {
            DB::transaction(function () use ($request) {
               
                DB::table('kategori')->insert(
                    [
                        'nama' => $request->nama,
                        'created_by' => $request->created_by,
                        'updated_by' => $request->updated_by
                    ]
                );
            });

            return redirect('/kategori')->with('success', 'Data Berhasil Disimpan');
        } catch (Exception $e) {
            return redirect('/kategori')->with('error', 'Data Gagal Disimpan');
        }

      
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
        $kategori = DB::table('kategori')->where('id',$id)->get();
        return view('kategori.edit', compact('kategori'));
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
        
        try{
            DB::transaction(function () use ($request,$id) {

                DB::table('kategori')->where('id',$request->id)->update([
                    'nama' => $request->nama,
                    'created_by' => $request->created_by,
                    'updated_by' => $request->updated_by
                ]);
            });

            return redirect('/kategori')->with('success','Data Berhasil Diupdate');
        } catch (exception $e){
            return redirect('/kategori')->with('error','Data Gagal Diupdate');
        }
        // DB::table('kategori')->where('id',$request->id)->update([
        //     'nama' => $request->nama,
        //     'created_by' => $request->created_by,
        //     'updated_by' => $request->updated_by
        // ]);
        // // alihkan halaman ke halaman pegawai
        // return redirect('/kategori')->with('success','Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kategori')->where('id',$id)->delete();
        return redirect('/kategori')->with('success', 'Data Berhasil Dihapus');
    }
}
