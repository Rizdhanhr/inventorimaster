<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuan = DB::table('satuan')->get();
        return view('satuan.index',compact('satuan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('satuan.create');
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

        DB::table('satuan')->insert([
            'nama' => $request->nama,
            'created_by' => $request->created_by,
            'updated_by' => $request->updated_by
        ]);
        return redirect('/satuan')->with('success', 'Data Berhasil Disimpan');
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
        $satuan = DB::table('satuan')->where('id',$id)->get();
        return view('satuan.edit', compact('satuan'));
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
        $satuan = DB::table('satuan')->where('id',$request->id)->update([
              'nama' => $request->nama,
              'created_by' => $request->created_by,
              'updated_by' => $request->updated_by
        ]);
        return redirect('/satuan')->with('success','Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $satuan = DB::table('satuan')->where('id',$id)->delete();
        return redirect('/satuan')->with('success','Data Berhasil Dihapus');
    }
}
