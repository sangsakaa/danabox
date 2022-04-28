<?php

namespace App\Http\Controllers;

use App\Models\Kordes;
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
        $kordes = Kordes::paginate(4);
        return view('admin/kordes/kordes',['kordes'=>$kordes]);
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
        $kordes->nama_kordes = $request->nama_kordes;
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