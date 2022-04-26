<?php

namespace App\Models;

use App\Models\Nasabah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penyetor extends Model
{
    use HasFactory;
    protected $table = "penyetor";
    public function Setor()
    {
        return $this->belongsTo( Nasabah::class,'nasabah_id','id');
    }
    public function kordes()
    {
        return $this->belongsTo(kordes::class,'kordes_id','id');
    }

}