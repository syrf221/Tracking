<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $provinsi = Provinsi::all();
        return view("admin.provinsi.index", compact("provinsi"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Tambah Data";
        return view('admin.provinsi.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
            $provinsi = new Provinsi();
        $provinsi->kode_nama = $request->kode_nama;
        $provinsi->nama_provinsi = $request->nama_provinsi;
        $provinsi->save();
            \Session::flash('sukses','Data Berhasil Di Tambah');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->route('provinsi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail provinsi';
        $provinsi = Provinsi::findOrFail($id);
        return view('admin.provinsi.show',compact('provinsi','title'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data';
        $provinsi = Provinsi::findOrFail($id);
        return view('admin.provinsi.edit',compact('provinsi','title'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $provinsi = Provinsi::findOrFail($id);
            $provinsi->kode_nama = $request->kode_nama;
            $provinsi->nama_provinsi = $request->nama_provinsi;
            $provinsi->save();
            \Session::flash('sukses','Data Berhasil Di Tambah');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->route('provinsi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\provinsi  $provinsi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $provinsi = provinsi::findOrFail($id)->delete();
            \Session::flash('sukses','Data Berhasil Di Hapus');
        }catch(\Exception $e){
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->route("provinsi.index");
        // $provinsi = provinsi::findOrFail($id)->delete();
        // return redirect()->route('provinsi.index')->with('sukses','Data Berhasil Di Hapus');
    }
}
