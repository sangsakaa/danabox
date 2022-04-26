<?php

namespace App\Http\Controllers;

use App\Models\Nasabah;
use App\Models\Penyetor;
use App\Models\Setor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SetorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $setor = Setor::all();
        $penyetor = Penyetor::all();
        $nasabah = Nasabah::all();
        return view('admin/setor/penyetor',['penyetor'=>$penyetor,'setor'=>$setor,'nasabah'=>$nasabah]);
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
        $setor = new Setor ;
        $setor->nasabah_id = $request->nasabah_id;
        $setor->penyetor_id = $request->penyetor_id;
        $setor->setor_box = $request->setor_box;
        $setor->setor_sp = $request->setor_sp;
        $setor->tgl_setor = $request->tgl_setor;
       
        $setor->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function show(Setor $setor)
    {
        // return view('admin/setor/penyetor',['setor'=>$setor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function edit(Setor $setor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setor $setor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setor  $setor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setor $setor)
    {
        Setor::destroy($setor->id);
        return redirect()->back();
    }
}