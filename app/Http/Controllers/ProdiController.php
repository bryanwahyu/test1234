<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $json['data']=Prodi::with('falkutas','mahasiswa')->get();
        $json['kode']=200;

        return response()->json($json);
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
        $prodi=new Prodi;
        $prodi->falkutas_id=$request->falkutas_id;
        $prodi->nama_prodi=$request->nama_prodi;
        $prodi->save();

        $json['data']=$prodi->load('falkutas','mahasiswa');
        $json['kode']=200;

        return response()->json($json);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {

        $json['data']=$prodi->load('falkutas','mahasiswa');
        $json['kode']=200;

        return response()->json($json);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodi $prodi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodi $prodi)
    {

        $prodi->falkutas_id=$request->falkutas_id;
        $prodi->nama_prodi=$request->nama_prodi;
        $prodi->save();

        $json['data']=$prodi->load('falkutas','mahasiswa');
        $json['kode']=200;

        return response()->json($json);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodi $prodi)
    {
        $prodi->delete();


        $json['kode']=200;

        return response()->json($json);
    }
}
