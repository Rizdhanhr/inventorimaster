<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brand = DB::table('brand')->get();
        return view('brand.index',compact('brand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
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
            'nama'=>'required',
            'created_by'=>'required',
            'updated_by'=>'required'
        ]);

        DB::table('brand')->insert([
            'nama' => $request->nama,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by
        ]);

        return redirect('/brand')->with('success', 'Data Berhasil Disimpan');
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
        $brand = DB::table('brand')->where('id',$id)->get();
        return view('brand.edit', compact('brand'));
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
        DB::table('brand')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by
        ]);
        // alihkan halaman ke halaman pegawai
        return redirect('/brand')->with('success','Data Berhasil Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('brand')->where('id',$id)->delete();
        return redirect('/brand')->with('success','Data Berhasil Dihapus');
    }
}
