<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surat_masuk = SuratMasuk::query()->orderBy('tanggal_surat');
        if (request('cari')) {
            $surat_masuk->where('file', 'like', '%' . request('cari') . '%')
                ->orWhere('ket', 'like', '%' . request('cari') . '%')
                ->orWhere('tujuan', 'like', '%' . request('cari') . '%');
        }
        return view(
            'admin/suratmasuk/suratmasuk',
            [
                'listSurat' => $surat_masuk->get(),
            ]
        );
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
        $data = new SuratMasuk();
        $file = $request->file;
        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $request->file->move('assets', $file_name);
        $data->file = $file_name;
        $data->tanggal_masuk = $request->tanggal_masuk;
        $data->tanggal_surat = $request->tanggal_surat;
        $data->nomor_surat = $request->nomor_surat;
        $data->perihal = $request->perihal;
        $data->pengirim = $request->pengirim;
        $data->ket = $request->ket;
        $data->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SuratMasuk $suratMasuk)
    {
        $surat_masuk = SuratMasuk::find($suratMasuk)->first();
        return view(
            'admin/suratmasuk/detailsuratmasuk',
            [
                'surat' => $surat_masuk,
                'suratmasuk' => $suratMasuk
            ]
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratMasuk $suratMasuk)
    {   
        return view(
            'admin/suratmasuk/editsuratmasuk',
            [
                'suratmasuk' => $suratMasuk,
            ]
        );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download(Request $request, $file)
    {
        return response()->download(public_path('storage/' . $file));
    }
    public function update(Request $request, SuratMasuk $suratMasuk)
    {
        $file_name = $suratMasuk->file;
        if ($request->hasFile('file')) {
            Storage::delete('public/' . $suratMasuk->file);
            $file = $request->file;
            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $request->file->storeAs('public', $file_name);
        }
        SuratMasuk::where('id', $suratMasuk->id)
            ->update([

                'tanggal_masuk' => $request->tanggal_masuk,
                'tanggal_surat' => $request->tanggal_surat,
                'nomor_surat' => $request->nomor_surat,
                'perihal' => $request->perihal,
                'pengirim' => $request->pengirim,
                'ket' => $request->ket,
                'file' => $file_name,
            ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratMasuk $suratMasuk)
    {
       SuratMasuk::destroy($suratMasuk->id);
        Storage::delete('public/' . $suratMasuk->file);
        return redirect()->back();  
    }
}
