<?php

namespace App\Models;

use App\Models\Spp;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembayaran extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function spp()
    {
        return $this->belongsTo(Spp::class);
    }
}
