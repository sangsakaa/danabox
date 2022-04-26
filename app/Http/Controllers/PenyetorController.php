<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use App\Models\Nasabah;
use App\Models\Penyetor;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PenyetorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setor = Setor::paginate(2);
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
        $penyetor = new Penyetor ;
        $penyetor->nasabah_id = $request->nasabah_id;
        $penyetor->nasabah_id = $request->nasabah_id;
        $penyetor->kordes_id = $request->kordes_id;
        $penyetor->tgl_setor = $request->tgl_setor;    
        $penyetor->save();
        return redirect()->back();
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penyetor  $penyetor
     * @return \Illuminate\Http\Response
     */
    public function show(Penyetor $penyetor)
    {
        $nasabah = Nasabah::all();
        $setor = Setor::where('penyetor_id',$penyetor->id)->get();
        $datapenyetor = Penyetor::all();
        return view('admin/setor/detailsetor',['penyetor'=>$penyetor,'nasabah'=>$nasabah,'setor'=>$setor,'datapenyetor'=>$datapenyetor]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penyetor  $penyetor
     * @return \Illuminate\Http\Response
     */
    public function edit(Penyetor $penyetor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Penyetor  $penyetor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penyetor $penyetor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penyetor  $penyetor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penyetor $penyetor)
    {
        Penyetor::destroy($penyetor->id);
        return redirect()->back();
    }
}