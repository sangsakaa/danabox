<?php

namespace App\Http\Controllers;

use App\Models\Kordes;
use App\Models\Nasabah;
use Illuminate\Http\Request;

class KordesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nasabah = Nasabah::all();
        $kordes = Kordes::paginate(4);
        return view('admin/kordes/kordes',['kordes'=>$kordes,'nasabah'=>$nasabah]);
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
        $kordes = new Kordes ;
        $kordes->nasabah_id = $request->nasabah_id;
        $kordes->awal_jabat = $request->awal_jabat;
        $kordes->akhir_jabat = $request->akhir_jabat;
        $kordes->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kordes  $kordes
     * @return \Illuminate\Http\Response
     */
    public function show(Kordes $kordes)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kordes  $kordes
     * @return \Illuminate\Http\Response
     */
    public function edit(Kordes $kordes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kordes  $kordes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kordes $kordes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kordes  $kordes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kordes $kordes)
    {
        
        Kordes::destroy($kordes->id);
        return redirect()->back();
    }
}