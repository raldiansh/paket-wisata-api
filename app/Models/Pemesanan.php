<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'paket_wisata_id',
        'tanggal_pemesanan',
        'jumlah_orang',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function paketWisata() {
        return $this->belongsTo(PaketWisata::class);
    }
}

