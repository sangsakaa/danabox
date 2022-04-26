<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class NasabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nas = Nasabah::paginate(10);
        return view('admin/nasabah/nasabah',['nasabah'=>$nas]);
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
        $nasabah = new Nasabah ;
        $nasabah->nama_nasabah = $request->nama_nasabah;
        $nasabah->jenis_kelamin = $request->jenis_kelamin;
        $nasabah->alamat = $request->alamat;
        $nasabah->kecamatan = $request->kecamatan;
        $nasabah->kabupaten = $request->kabupaten;
        $nasabah->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function show(Nasabah $nasabah)
    {
        $setor = Setor::where('nasabah_id',$nasabah->id)->get();
        return view('admin/nasabah/detailnasabah',['nasabah'=>$nasabah,'setor'=>$setor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function edit(Nasabah $nasabah)
    {
        return view('admin/nasabah/editnasabah',['nasabah'=>$nasabah]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nasabah $nasabah)
    {
        Nasabah::where('id', $nasabah->id)
            ->update([

                'nama_nasabah' => $request->nama_nasabah,
                'jenis_kelamin' => $request->jenis_kelamin,
                'alamat' => $request->alamat,
                'kecamatan' => $request->kecamatan,
                'kabupaten' => $request->kabupaten,
                
            ]);
            return redirect('/nasabah') ;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nasabah  $nasabah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nasabah $nasabah)
    {
        Nasabah::destroy($nasabah->id);
        return redirect()->back();
    }
}