<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class InstansiController extends Controller
{
    public function index(Instansi $instansi)
    {
        // $instansi = Instansi::all();
        return view('admin.instansi.instansi', ['instansi' => $instansi]);
    }
    public function store(Request $request)
    {
        // dd($request);
        $data = new Instansi();
        $file = $request->file;
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $request->file->storeAs('public', $file_name);
        $data->file = $file_name;
        $data->nama_instansi = $request->nama_instansi;
        $data->nama_kepala_instansi = $request->nama_kepala_instansi;
        $data->status_kepala_instansi = $request->status_kepala_instansi;
        $data->alamat_instansi = $request->alamat_instansi;
        $data->email_instansi = $request->email_instansi;
        $data->save();
        return redirect()->back();
    }
}
