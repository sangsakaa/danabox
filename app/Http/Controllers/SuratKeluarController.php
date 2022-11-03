<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $surat_keluar = SuratKeluar::all();
        return view('admin/suratkeluar/suratkeluar', ['listSurat' => $surat_keluar]);
    }
    public function show(SuratKeluar $suratkeluar)
    {
        return view('admin/suratkeluar/detailsuratkeluar');
    }
    public function store(Request $request)
    {
        $surat_keluar = new SuratKeluar();
        $surat_keluar->tanggal_keluar = $request->tanggal_keluar;
        $surat_keluar->nomor_surat = $request->nomor_surat;
        $surat_keluar->perihal = $request->perihal;
        $surat_keluar->uraian = $request->uraian;
        $surat_keluar->tujuan = $request->tujuan;
        $surat_keluar->save();

        return redirect()->back();
    }
    public function destroy(SuratKeluar $suratkeluar)
    {
        SuratKeluar::destroy($suratkeluar->id);
        return redirect()->back();
    }
}
