<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function index()
    {
        // hanya admin yang boleh
        return Pemesanan::with(['user', 'paketWisata'])->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'paket_wisata_id' => 'required|exists:paket_wisatas,id',
            'tanggal_pemesanan' => 'required|date',
            'jumlah_orang' => 'required|integer|min:1'
        ]);

        $pemesanan = Pemesanan::create([
            'user_id' => auth()->id(),
            'paket_wisata_id' => $request->paket_wisata_id,
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'jumlah_orang' => $request->jumlah_orang,
            'status' => 'menunggu'
        ]);

        return response()->json(['status' => 'success', 'data' => $pemesanan], 201);
    }

    public function show($id)
    {
        return Pemesanan::with(['user', 'paketWisata'])->findOrFail($id);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:menunggu,diproses,selesai,dibatalkan'
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->status = $request->status;
        $pemesanan->save();

        return response()->json(['status' => 'success', 'data' => $pemesanan]);
    }
}