<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Nasabah;
use App\Models\Setor;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $surat_keluar = SuratKeluar::count();
        $surat_masuk = SuratMasuk::count();
        return view(
            'dashboard',
            [

                'surat_keluar' => $surat_keluar,
                'surat_masuk' => $surat_masuk
            ]
        );
    }
}