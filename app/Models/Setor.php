<?php

namespace App\Models;

use App\Models\Nasabah;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setor extends Model
{
    use HasFactory;
    protected $table = "setor";

    public function nasabah()
    {
        return $this->belongsTo( Nasabah::class,'nasabah_id','id');
    }
}