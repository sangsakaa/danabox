<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;


class SuratKeluarController extends Controller
{
    public function index()
    {
        $surat_keluar = SuratKeluar::all();
        return view('admin/suratkeluar/suratkeluar', ['listSurat' => $surat_keluar]);
    }
    public function show(SuratKeluar $suratkeluar)
    {
        $surat_keluar = SuratKeluar::find($suratkeluar)->first();
        return view(
            'admin/suratkeluar/detailsuratkeluar',
            [
                'surat' => $surat_keluar,
                'suratkeluar' => $suratkeluar
            ]
        );
    }
    
    public function store(Request $request)
    {
        $data = new SuratKeluar();
        $file = $request->file;
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $request->file->move('assets', $file_name);
        $data->file = $file_name;
        $data->tanggal_keluar = $request->tanggal_keluar;
        $data->nomor_surat = $request->nomor_surat;
        $data->perihal = $request->perihal;
        $data->uraian = $request->uraian;
        $data->tujuan = $request->tujuan;
        $data->save();
        return redirect()->back();
    }
    public function download(Request $request, $file)
    {
        return response()->download(public_path('assets/' . $file));
    }
    
    
    public function destroy(SuratKeluar $suratkeluar)
    {
        SuratKeluar::destroy($suratkeluar->id);
        return redirect()->back();
    }
}
