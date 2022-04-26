<?php

namespace App\Models;

use App\Models\Setor;
use App\Models\Kordes;
use App\Models\Penyetor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nasabah extends Model
{
    use HasFactory;
    protected $table = "nasabah";
    public function Setor()
    {
        return $this->hasMany( Setor::class,'nasabah_id','id');
    }
    public function Penyetor()
    {
        return $this->hasMany( Penyetor::class,'nasabah_id','id');
    }
    public function kordes()
    {
        return $this->hasMany(Kordes::class,'kordes_id','id');
    }
    public function Naskordes()
    {
        return $this->belongsTo(Kordes::class);
    }
}