<?php

namespace App\Http\Controllers;

use App\Models\Falkutas;
use Illuminate\Http\Request;

class FalkutasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $json['data']=Falkutas::with('prodi.mahasiswa')->get();
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
         $falkutas=new Falkutas;
         $falkutas->nama_falkutas=$request->nama_falkutas;
         $falkutas->save();

         $json{'data'}=$falkutas->load('prodi.mahasiswa');
         $json['kode']=200;

         return response()->json($json);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Falkutas  $falkutas
     * @return \Illuminate\Http\Response
     */
    public function show(Falkutas $falkutas)
    {
        $json['data']=$falkutas->load('prodi.mahasiswa');
        $json['kode']=200;

        return response()->json($json);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Falkutas  $falkutas
     * @return \Illuminate\Http\Response
     */
    public function edit(Falkutas $falkutas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Falkutas  $falkutas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Falkutas $falkutas)
    {
        $falkutas->nama_falkutas=$request->falkutas;
        $falkutas->save();

        $json['data']=$falkutas->load('prodi.mahasiswa');
        $json['kode']=200;

        return response()->json($json);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Falkutas  $falkutas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Falkutas $falkutas)
    {
        $falkutas->delete();

         $json['kode']=200;

         return response()->json($json);
    }
}
