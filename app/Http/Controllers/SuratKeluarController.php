<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    public function index()
    {
        $surat_keluar = SuratKeluar::all();
        return view('admin/suratkeluar/surat_keluar', ['listSurat' => $surat_keluar]);
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
}
