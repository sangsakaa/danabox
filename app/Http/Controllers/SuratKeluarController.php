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
        $surat_keluar = SuratKeluar::query()->orderBy('perihal');
        if (request('cari')) {
            $surat_keluar->where('file', 'like', '%' . request('cari') . '%')
                ->orWhere('uraian', 'like', '%' . request('cari') . '%')
                ->orWhere('tujuan', 'like', '%' . request('cari') . '%');
        }
        return view('admin/suratkeluar/suratkeluar', ['listSurat' => $surat_keluar->get()]);
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
    public function edit(SuratKeluar $suratkeluar)
    {

        return view(
            'admin/suratkeluar/editsuratkeluar',
            [
                'suratkeluar' => $suratkeluar,
            ]
        );
        
    }
    public function download(Request $request, $file)
    {
        return response()->download(public_path('assets/' . $file));
    }
    public function update(Request $request, SuratKeluar $suratkeluar)
    {
        $file_name = $suratkeluar->file;
        if ($request->hasFile('file')) {
            $file = $request->file;
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $request->file->move('assets', $file_name);
            
        }
        SuratKeluar::where('id', $suratkeluar->id)
            ->update([
                
                'tanggal_keluar' => $request->tanggal_keluar,
                'nomor_surat' => $request->nomor_surat,
                'perihal' => $request->perihal,
                'uraian' => $request->uraian,
                'tujuan' => $request->tujuan,
            'file' => $file_name,
            ]);
        return redirect()->back();
    }

    
    
    public function destroy(SuratKeluar $suratkeluar)
    {
        SuratKeluar::destroy($suratkeluar->id);
        return redirect()->back();
    }
}
