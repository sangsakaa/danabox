<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;


class InstansiController extends Controller
{
    public function index()
    {
        $instansi = Instansi::all();
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
        $data->nip_kepala_instansi = $request->nip_kepala_instansi;
        $data->nama_kepala_instansi = $request->nama_kepala_instansi;
        $data->status_kepala_instansi = $request->status_kepala_instansi;
        $data->alamat_instansi = $request->alamat_instansi;
        $data->email_instansi = $request->email_instansi;
        $data->save();
        return redirect()->back();
    }
    public function destroy(Instansi $instansi)
    {
        Instansi::destroy($instansi->id);
        Storage::delete('public/' . $instansi->file);
        return redirect()->back();
    }
    public function edit(Instansi $instansi)
    {
        return view('admin.instansi.edit', ['instansi' => $instansi]);
    }
    public function update(Request $request, Instansi $instansi)
    {
        $file_name = $instansi->file;
        if ($request->hasFile('file')) {
            Storage::delete('public/' . $instansi->file);
            $file = $request->file;
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $request->file->storeAs('public', $file_name);
        }
        Instansi::where('id', $instansi->id)
            ->update([

                'nama_instansi' => $request->nama_instansi,
                'nip_kepala_instansi' => $request->nip_kepala_instansi,
                'nama_kepala_instansi' => $request->nama_kepala_instansi,
                'status_kepala_instansi' => $request->status_kepala_instansi,
                'alamat_instansi' => $request->alamat_instansi,
                'email_instansi' => $request->email_instansi,
                'file' => $file_name,
            ]);
        return redirect()->back();
    }
}
