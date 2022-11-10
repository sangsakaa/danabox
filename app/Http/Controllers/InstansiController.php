<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    public function index()
    {
        $instansi = Instansi::all();
        return view('admin.instansi.index', ['instansi' => $instansi]);
    }
}
