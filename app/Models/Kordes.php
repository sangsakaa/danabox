<?php

namespace App\Models;

use App\Models\Penyetor;
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
}