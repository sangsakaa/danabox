<?php

namespace App\Models;

use App\Models\Nasabah;
use App\Models\Penyetor;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kordes extends Model
{
    use HasFactory;
    protected $table = "kordes";
    
    public function kordes()
    {
        return $this->hasMany(Penyetor::class,'kordes_id','id');
    }
    public function kordesNas()
    {
        return $this->hasMany(Nasabah::class);
    }
    public function getKhitmadAttribute()
    {
        $tanggal_masuk = new Carbon($this->awal_jabat);
        $tanggal_keluar = new Carbon($this->akhir_jabat);
        return  $tanggal_masuk->diff($tanggal_keluar)->y;
    }
    
}